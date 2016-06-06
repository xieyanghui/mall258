<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-5-9
 * Time: 上午11:51
 */
include_once($_SERVER['DOCUMENT_ROOT'].'/public/autoload.php');
if (!isset($_SESSION)) {session_start();}
header("Content-type:text/html;charset=utf-8");

function ends($gpi_s){
    $ks= array();
    foreach ($gpi_s as $k=>$v){
        array_push ($ks,$k );
    }
    $gpi = new GPriceInfo();
    $gpi = $gpi->query (new Where('gpi_id',$ks),'*',array(
        'Goods'=>array(
            'noSub'=>'g_id',
            'columnName'=>'g_name,g_number',
            'sibling'=>true
        ),
        'GPriceList'=>array(
            'columnName'=>'gp_id',
            'subModel'=>array(
                'GPrice'=>array(
                    'noSub'=>'gp_id',
                    'columnName'=>'gtp_id,gp_name',
                    'sibling'=>true,
                    'subModel'=>array(
                        'GTPrice'=>array(
                            'noSub'=>'gtp_id',
                            'columnName'=>'gtp_id,gtp_name',
                            'sibling'=>true,
                        )
                    )

                )
            )
        )
    ))->toArray ();

    foreach ($gpi as &$v){
        $sum  = (int)$gpi_s[$v['gpi_id']];
        if($sum === 0){
            unset($v);
            continue;
        }elseif($sum >$v['gpi_sum']){
            $sum =$v['gpi_sum'];
        }
        unset($v['gpi_sum']);
        $v['sum'] = $sum;
    }
    exit(json_encode(array('status'=>true,'megs'=>'添加成功','gpi'=>$gpi)));
}



if(!empty($_GET['gpi'])){
    if(!empty($_SESSION['user'])){
        $c = array();
        foreach ($_GET['gpi'] as $k=>$v){
            $cart = new Cart();
            $where = new Where('gpi_id',$k);
            $where->setWhere ('u_id', $_SESSION['user']['u_id']);
            $cart->query ($where,'c_id,c_sum');
            if($cart->length () <1){
                array_push ($c, array('u_id'=>$_SESSION['user']['u_id'],'gpi_id'=>$k,'c_sum'=>$v));
            }else{
                $cart->set('c_sum',(int)$cart->get('c_sum')+(int)$v);
                $cart->save ();
            }
        }
        $cart = new Cart();
        $cart->readArr ($c);
        if($cart->save () !==false && !empty($_GET['login'])){
            $cart = new Cart();
            $where= new Where ('u_id', $_SESSION['user']['u_id']);
            $cart->query ($where,'gpi_id,c_sum');
            $spi_ids = array();
            foreach ($cart as $cc){
                $spi_ids[$cc['gpi_id']]=$cc['c_sum'];
            }
            ends($spi_ids);
        }else{
            ends($_GET['gpi']);
        }
    }else{
        ends($_GET['gpi']);
    }

}elseif(!empty($_SESSION['user']) && !empty($_GET['login'])){
    $cart = new Cart();
    $where= new Where ('u_id', $_SESSION['user']['u_id']);
    $cart->query ($where,'gpi_id,c_sum');
    $spi_ids = array();
    foreach ($cart as $cc){
        $spi_ids[$cc['gpi_id']]=$cc['c_sum'];
    }
    ends($spi_ids);
}