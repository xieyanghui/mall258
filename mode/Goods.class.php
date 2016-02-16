<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');

/*
 * 商品
 * `g_id` ID
 * `g_number` 商品编号
 * `g_name` 商品名
 * `gt_id` 商品类型ID
 * `g_keywoeds` SEO关键字
 * `g_description` SEO描述
 * `g_sum` 商品数量
 * `g_img` 商品图片路径
 * `g_reg` 商品添加时间
 * `g_status` 商品状态
 * `g_text` 商品描述
 * */

class Goods
{
    /**
     * 判断是否是数字
     *
     * @param $columnName string 列名
     *
     * @param $type boolean 返回字符串型还是boolean型
     *
     * @return string|bool 成功返回int或true,失败返回string或false
     */
    public function isNumber($columnName,$type=false)
    {
        $columnNames = array('g_id','g_price','gt_id','gp_id','gta_id','gtap_id');
        if (in_array($columnName , $columnNames)){
            if($type){
                return 'int';
            }
            return true;
        }
        if($type){
            return 'string';
        }
        return FALSE;

    }

    /**
     * 获取商品列表
     *
     * @param $start int 从第几行开始
     *
     * @param $sum int 需要多少行
     *
     * @param $sortLine string 排序列名,默认g_id
     *
     * @param $sort string 排序方式,默认asc
     *
     * @return array 关联数组count总行数,data查询到的数据
     */
    public function getGoods($start, $sum ,$sortLine ='g_id', $sort = "asc"){
        $sql = new Sql;
        $where = new Where();
        $count = $sql->select('goods_info_v',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->select('goods_info_v',array('g_id','g_number','g_name','gt_name','g_price','g_reg','g_status'),$where);
        return array('count'=>$count['count'],'data'=>$data);
    }

    /**
     * 查询商品列表
     *
     * @param $name array 关联数组,searchLine需要搜索的列名,key关键字
     *
     * @param $start int 从第几行开始
     *
     * @param $sum int 需要多少行
     *
     * @param $sortLine string 排序列名,默认a_id
     *
     * @param $sort string 排序方式,默认asc
     *
     * @return array 关联数组count总行数,data查询到的数据
     */
    public function searchGoods($name,$start,$sum,$sortLine , $sort = "asc" ){
        $sql = new Sql;
        $where =new Where($name['searchLine'],$name['key'],'string','AND','LIKE');
        $count = $sql->select('goods_info_v',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->select('goods_info_v',array('g_id','g_number','g_name','gt_name','g_price','g_reg','g_status'),$where);
        return array('count'=>$count['count'],'data'=>$data);
//        $sql = new Sql;
//        if(empty($sortLine)){$sortLine = "g_id"; }
//        $searchLine = $search['searchLine'];
//        $key = $search['key'];
//        $ro = $sql->queryLine("SELECT COUNT(`g_id`)as `sum` FROM `goods`,`goodsType` WHERE  goods.gt_id = goodsType.gt_id  AND  `$searchLine` LIKE '%$key%' ;");
//        $data = $sql->queryData("SELECT `g_id`, `g_number` ,`g_name` , `gt_name`,`g_price` , `g_reg`,`g_status` FROM `goods` ,`goodsType` WHERE goods.gt_id = goodsType.gt_id  AND `$searchLine` LIKE '%$key%' ORDER BY `$sortLine` $sort LIMIT  $start ,$sum; ");
//        $data[0]['count'] = $ro['sum'];
//        return $data;
    }

    public function updateGoods(){

    }

    public function queryGoods($gId){
        $sql = new Sql;
        $where = new Where('g_id',$gId);
        $goods = $sql->select('goods_info_v',array('g_id','g_number','g_name','gt_name','g_price','g_reg','g_status','gt_id'),$where);
        $attr = $sql->select('g_attr_v',array('ga_id','ga_value','gta_name'),$where);
        $price = $sql->select('g_price',array('gp_id','gp_name','gtp_name'),$where);
        $goods['attr'] =$attr;
        $goods['price'] = $price;
        return $goods;
//        $row = $sql->queryLine("SELECT `g_id`, `g_number` ,`g_name` ,goods.gt_id AS `gt_id`, `gt_name` ,`g_price` , `g_reg`,`g_img`   FROM `goods` ,`goodsType` WHERE goods.gt_id = goodsType.gt_id  AND `g_id`= $g_id");
//        $gAttrValue = $sql->queryData("SELECT `gav_id`,`gta_name`,`gav_value` FROM `gtAttr`,`gAttrValue` WHERE gtAttr.gta_id= gAttrValue.gta_id  AND `gt_id`=".$row['gt_id']." AND `g_id` =$g_id");
//        $gtAttrPrice = $sql->queryData("SELECT `gtap_name`,`gtap_id` FROM `gtAttrPrice` WHERE `gt_id`=".$row['gt_id']);
//        $gPriceAttr =array();
//        foreach((array)$gtAttrPrice as $value){
//            $gPriceAttr[$gtAttrPrice['gtap_name']] =$sql->queryData("SELECT `gpa_id` ,`gpa_name` FROM gPriceAttr WHERE `gtap_id` =".$value['gtap_id'] ."AND `g_id`= $g_id ");
//            $gPriceAttr[$gtAttrPrice['gtap_name']]['gtap_id'] = $value['gtap_id'];
//        }
//        $gPriceValue['gPriceAttr'] =$gPriceAttr;
//        $gPriceValue['gPrices'] = $sql->queryData("SELECT `gps_id` ,`gps_img`,`gps_price` `gps_sum` FROM `gPrices` WHERE `g_id` = $g_id");
//        $gPriceValue['gPricesLink'] = $sql->queryData("SELECT `gpsl_id`,`gps_id` ,`gpa_id` FROM `gPricesLink` WHERE `g_id`=$g_id");
//        $row['gAttrValue'] = $gAttrValue;
//        $row['gPriceValue'] = $gPriceValue;
//        return $row;
    }

    public function addGoods($goods,$aId,$meg){
        $sql = new Sql;
        $columns = array();
        $values = array();
        foreach($goods as $key=>$value){
            if(is_array($value)){break;}
            $columns[$key] = $this->isNumber($key,true);
            array_push($values,$value);
        }
        if($g_id = $sql->insert('goods',$columns,$values)){

        }

        $gAttrValue= "INSERT INTO `gAttrValue` (`g_id`,`gta_id`,`gav_value`) VALUES ";
        foreach((array)$goods['gAttrValue'] as $key=>$value){
            $gAttrValue .=" ( $g_id,$key,'$value') ,";
        }
        if($sql->execute(substr($gAttrValue,0,strlen($gAttrValue)-1))){

            foreach((array)$goods['gPriceAttr'] as $key=>$value){
                $sqls = "INSERT INTO `gPriceAttr` (`g_id`,`gtap_id`,`gpa_name`) VALUES ";
                foreach((array)$value as $val){
                    $sqls .=" ($g_id , ) ";
                }

            }
           return $sql->execute(substr($gAttrValue,0,strlen($gAttrValue)-1));
        }
    }


    public function addGoodsAttrs($gAttr,$gId){
        $sql = new Sql();
        if(!empty($gAttr) && is_array($gAttr)){
            $data = array();
            foreach($gAttr as $key=>$value) {
                array_push($data, array($gId, $value, $key));
            }
            return $sql->insert('g_attr',array('g_id'=>'int','gta_id'=>'int','ga_value'),$data);
        }
        return true;
    }
    public function addGoodsPrices($gAttr,$gId){
        $sql = new Sql();
        if(!empty($gAttr) && is_array($gAttr)){
            $data = array();
            foreach($gAttr as $key=>$value) {
                array_push($data, array($gId, $value, $key));
            }
            return $sql->insert('g_attr',array('g_id'=>'int','gta_id'=>'int','ga_value'),$data);
        }
        return true;
    }
    //返回商品类型列表
    public function getGoodsType($start, $sum  ,$sortLine , $sort = "asc"){
        $sql = new Sql;
        if(empty($sortLine)){$sortLine = "gt_id"; }
        $count = $sql->queryLine("SELECT COUNT(`gt_id`) AS `sum` FROM `goodsType`");
        $data =  $sql->queryData("SELECT `gt_id`, `gt_name` ,`gt_remark`,`gt_number` FROM `goodsType` ORDER BY `$sortLine` $sort LIMIT  $start ,$sum; ");
        $data[0]['count'] = $count['sum'];
        return $data;
    }
    //返回全部商品类型列表
    public function getGoodsTypeAll(){
        $sql = new Sql;
        $data =  $sql->queryData("SELECT `gt_id`, `gt_name` ,`gt_remark`,`gt_number` FROM `goodsType` ");
        return $data;
    }

    //搜索商品类型
    public function searchGoodsType($name,$start,$sum,$sortLine , $sort = "asc" ){
        $sql = new Sql;
        if(empty($sortLine)){$sortLine = "gt_id"; }
        $ro = $sql->queryLine("SELECT COUNT(`gt_id`)as count FROM `goodsType` WHERE `gt_name` LIKE '%$name%' OR  `gt_remark` LIKE '%$name%' OR `gt_number` LIKE '%$name%';");
        $data = $sql->queryData("SELECT `gt_id`, `gt_name` ,`gt_remark`,`gt_number` FROM `goodsType` WHERE `gt_name` LIKE '%$name%' OR  `gt_remark` LIKE '%$name%' OR `gt_number` LIKE '%$name%' ORDER BY `$sortLine` $sort LIMIT  $start ,$sum; ");
        $data[0]['count'] = $ro['count'];
        return $data;
    }
    //增加商品类型
    public function addGoodsType($goodsType ,$gtAttr,$gtAttrPrice){
        $sql = new Sql;
        $goodsType = $sql->arrSqlVerif($goodsType);
        $gtAttr = $sql->arrSqlVerif($gtAttr);
        $gtAttrPrice = $sql->arrSqlVerif($gtAttrPrice);
        $gt_id = $sql->executeid("INSERT INTO `goodsType` ".$sql->addSqlState($goodsType,$this)." ;");
        return $this->addGtAttrPrice($gt_id,$gtAttr,$gtAttrPrice);

    }
    //增加商品类型属性
    private function addGtAttrPrice($gt_id,$gtAttr,$gtAttrPrice){
        $sql = new Sql;
        $gtab = true;
        $gtapb = true;
        if(!empty($gtAttr)){
            $b = false;
            $gtattrstr = "";
            foreach($gtAttr as $value){
                if(empty($value)){continue;}
                $gtattrstr .= "(".$gt_id.",'".$value."') ,";
                $b = true;
            }
            if($b){
                $gtattrstr =  substr($gtattrstr, 0, strlen($gtattrstr) - 1);
                $gtab = $sql->execute("INSERT INTO `gtAttr` (`gt_id` ,`gta_name`) VALUES $gtattrstr");
            }

        }
        if(!empty($gtAttrPrice)){
            $gtAttrPricestr = "";
            $count = $sql->queryLine("SELECT COUNT(`gtap_id`) AS `sum` FROM `gtAttrPrice` WHERE `gt_id` = $gt_id");
            //echo $count['sum'];
            if((int)$count['sum']+count($gtAttrPrice) <=4 ){
                $b = false;
                foreach($gtAttrPrice as $key=>$value){
                    if(empty($value)){continue;}
                    if($key >=4){ break; }
                    $gtAttrPricestr .= "(".$gt_id.",'".$value."') ,";
                    $b = true;
                }
                if($b){
                    $gtAttrPricestr = substr($gtAttrPricestr, 0, strlen($gtAttrPricestr) - 1);
                    $gtapb = $sql->execute("INSERT INTO `gtAttrPrice` (`gt_id` ,`gtap_name`) VALUES $gtAttrPricestr");
                }
            }
        }
        if($gtab && $gtapb){
            return true;
        }else{
            return false;
        }
    }

    //返回商品类型详细信息
    public function queryGoodsType($gt_id){
        $sql = new Sql;
        $gt_id =  $sql->sqlVerif($gt_id);
        $row = $sql->queryLine("SELECT `gt_id`, `gt_name` ,`gt_remark`,`gt_number` FROM `goodsType` WHERE `gt_id` =$gt_id;");
        $gt_attr =  $sql->queryData("SELECT `gta_id`, `gta_name` FROM `gtAttr` WHERE `gt_id` =$gt_id;");
        $gt_attrPrice = $sql->queryData("SELECT `gtap_id`, `gtap_name` FROM `gtAttrPrice` WHERE `gt_id` =$gt_id;");
        $row['gt_attr'] = $gt_attr ;
        $row['gt_attrPrice'] = $gt_attrPrice;
        return $row;
    }
    //返回商品类型详细属性
    public function queryGoodsTypeAttr($gt_id){
        $sql = new Sql;
        $gt_id =  $sql->sqlVerif($gt_id);
        $row =null;
        $gt_attr =  $sql->queryData("SELECT `gta_id`, `gta_name` FROM `gtAttr` WHERE `gt_id` =$gt_id;");
        $gt_attrPrice = $sql->queryData("SELECT `gtap_id`, `gtap_name` FROM `gtAttrPrice` WHERE `gt_id` =$gt_id;");
        $row['gt_attr'] = $gt_attr ;
        $row['gt_attrPrice'] = $gt_attrPrice;
        return $row;
    }

    //更新商品类型
    public function updateGoodsType($arr){
        $sql = new Sql;
        $gt = $sql->arrSqlVerif($arr);
        if(!empty($gt['goodsType']['gt_name']) || !empty($gt['goodsType']['gt_remark'])){
            //echo "UPDATE `goodsType` SET ".$sql->updateSqlState($gt['goodsType'],$this)."WHERE `gt_id`= ".$gt['gt_id'];
            if(!$sql->execute("UPDATE `goodsType` SET ".$sql->updateSqlState($gt['goodsType'],$this)." WHERE `gt_id`= ".$gt['gt_id'])){
                return false;
            }

        }
        if(!$this->addGtAttrPrice($gt['gt_id'],$gt['agtAttr'],$gt['agtAttrPrice'])){
            return false;
        }

        if(!empty($gt['ugtAttr'])){
            foreach($gt['ugtAttr'] as $key =>$value){
                if(empty($value)){continue;}
                if(!$sql->execute("UPDATE `gtAttr` SET `gta_name` ='".$value."' WHERE `gta_id` = ".$key)){
                    return false;
                }
            }
        }
        if(!empty($gt['ugtAttrPrice'])){
            foreach($gt['ugtAttrPrice'] as $key=> $value){
                if(empty($value)){continue;}
                if(!$sql->execute("UPDATE `gtAttrPrice` SET `gtap_name` = '".$value."' WHERE `gtap_id` = ".$key)){
                    return false;
                }
            }
        }
        return true;
    }

}

