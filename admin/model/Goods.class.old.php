<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/public/autoload.php');

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
    private $sql =null;
    private function getSql(){
        if(empty($this->sql)){
            $this->sql = new Sql();
        }
        return $this->sql;
    }
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
        $columnInt = array('g_id','gt_id','gp_id','gta_id','gtap_id','gpi_id','gpi_sum','ir_id');
        $columnFloat = array('g_price','gpi_price');
        $columnBlob = array('g_text');
        if (in_array($columnName , $columnInt)){
            if($type){
                return 'int';
            }
            return true;
        }

//        if (in_array($columnName , $columnBlob)){
//            if($type){
//                return 'int';
//            }
//            return true;
//        }

        if (in_array($columnName , $columnFloat)){
            if($type){
                return 'double';
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
        $sql = $this->getSql(); 
        $where = new Where('g_status','0','int','AND','<>');
        if(empty($sortLine)){$sortLine = "g_id";}
        if(empty($sort)){$sort = "asc";}
        $count = $sql->selectLine('goods_info_v',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('goods_info_v',array('g_id','g_number','g_name','gt_name','g_price','g_reg','g_status'),$where);
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
    public function searchGoods($name,$start,$sum,$sortLine ='g_id' , $sort = "asc" ){
        $sql = $this->getSql(); 
        if(empty($sortLine)){$sortLine = "g_id";}
        if(empty($sort)){$sort = "asc";}
        $where =new Where($name['searchLine'],$name['key'],'string','AND','LIKE');
        $where->setWhere('g_status','0','int','AND','<>');
        $count = $sql->selectLine('goods_info_v',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('goods_info_v',array('g_id','g_number','g_name','gt_name','g_price','g_reg','g_status'),$where);
        return array('count'=>$count['count'],'data'=>$data);
    }

    /**
     * 查询商品的详细信息
     *
     * @param $gId int 商品ID
     *
     * @return array 商品详细资料
    */
    public function queryGoods($gId){
        $sql = $this->getSql();
        $where = new Where('g_id',$gId,'int');
        $goods = $sql->selectLine('goods_info_v',array('g_id','g_number','g_name','g_keywords','g_description','gt_name','g_img','g_price','g_reg','g_status','gt_id'),$where);
        $g_id = $goods['g_id'];
        $sqls = "SELECT gta_id ,gta_name,(SELECT ga_value FROM g_attr WHERE g_attr.gta_id = gt_attr.gta_id AND g_id={$g_id}) AS ga_value,(SELECT ga_id FROM g_attr WHERE g_attr.gta_id = gt_attr.gta_id AND g_id={$g_id}) AS ga_id FROM gt_attr WHERE gt_id =".$goods['gt_id'];
        $attr = $sql->queryData($sqls);

        $price = $sql->selectData('gt_price',array('gtp_id','gtp_name'),new Where('gt_id',$goods['gt_id'],'int'));
        foreach ($price as &$value){
            $where = new Where('gtp_id',$value['gtp_id'],'int');
            $where->setWhere('g_id',$gId,'int');
            $value['val'] = $sql->selectData('g_price',array('gp_id','gp_name'),$where);
        }   
        $goods['attr'] =$attr;
        $goods['price'] = $price;
        return $goods;
    }

 /**
 * 查询商品价格的详细信息
 *
 * @param $gId int 商品ID
 *
 * @return array 商品价格详细资料
 */
    public function queryGoodsPrice($gId){
        $sql = $this->getSql();
        $where = new Where('g_id',$gId);
        $goods = $sql->selectLine('goods',array('g_text','g_img','g_price'),$where);
        $price =  $sql->selectData('g_price_v',array('gp_id','gp_name','gtp_name','gtp_id'),$where);
        $price_info =  $sql->selectData('g_price_info',array('gpi_id','gpi_img','gpi_sum','gpi_price'),$where);
        foreach ($price_info as &$value){
            $ppl =  $sql->selectData('g_price_list',array('gp_id'),new Where('gpi_id',$value['gpi_id'],'int'));
            foreach ($ppl as $v){
                foreach ($price as $v1){
                    if($v['gp_id'] == $v1['gp_id']){
                        $value['gpl'][$v['gp_id']] =$v1;
                    }
                }
            }
        }
        $data =array();
        foreach ($price as &$value){
            $va = $value['gtp_id'];
            if(empty($data[$va])){
                $data[$va]['gp_value'] = array();
                $data[$va]['gtp_id'] = $value['gtp_id'];
                $data[$va]['gtp_name'] = $value['gtp_name'];
            };
            unset($value['gtp_name']);
            unset($value['gtp_id']);
            array_push($data[$va]['gp_value'],$value);
        }
        $goods['data'] = $data;
        $goods['price_info'] = $price_info;
        return $goods;

    }



    /**
     * 增加商品
     *
     * @param $goods array 商品详情
     *
     * @param $aId int 管理员ID
     *
     * @param $meg string 日志消息
     *
     * @return boolean 成功返回true,失败返回false
    */
    public function addGoods($goods,$aId,$meg){
        $sql = $this->getSql(); 
        $columns = array();
        $values = array();
        foreach($goods as $key=>$value){
            if(is_array($value) || empty($value)){continue;}
            $columns[$key] = $this->isNumber($key,true);
            array_push($values,$value);
        }
        if($gId = $sql->insert('goods',$columns,$values)){
            $this->aUAttrPrice($goods['attr'],$goods['a_price'],$goods['u_price'],$gId);
            SystemLog::addSystemLog($aId,'增加商品',$meg);
            return $gId;
        }
        return false;
    }


    /**
     * 修改商品
     *
     * @param $goods array 商品详情
     *
     * @param $aId int 管理员ID
     *
     * @param $meg string 日志消息
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function updateGoods($goods,$aId,$meg){
        $sql = $this->getSql(); 
        $data = array();
        $b = true;
        foreach($goods as $key=>$value){
            if(is_array($value) || $key =='g_id'){continue;}
            array_push($data,array('columnName'=>$key,'value'=>$value,'type'=>$this->isNumber($key,true)));
        }
        if(!empty($data)){
            if(!$sql->update('goods',new Where('g_id',$goods['g_id']),$data)){
                $b = false;
            }
        }
        $attr = !empty($goods['attr'])?$goods['attr']:null;
        $a_price = !empty($goods['a_price'])?$goods['a_price']:null;
        $u_price = !empty($goods['u_price'])?$goods['u_price']:null;
        if(!$this->aUAttrPrice($attr ,$a_price,$u_price,$goods['g_id'])){
            $b = false;
        }
        SystemLog::addSystemLog($aId,'更新商品',$meg);
        return $b;
    }


    public function deleteGoods($gId){
        $sql = $this->getSql();
        return $sql->update('goods',new Where('g_id',$gId,'int'),array('columnName'=>'g_status','type'=>'int','value'=>'0'));
    }
    
    /**
     * 增加或修改商品属性,价格
     *
     * @param $attr array 商品属性 关联数组 key为属性值,value为类型属性ID
     *
     * @param $aPrice array 商品价格属性 关联数组 key为属性值,value为类型属性ID
     * @param $uPrice array 需要修改商品价格属性 关联数组 key为属性值,value为类型属性ID
     *
     * @param $gId int 商品ID
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function aUAttrPrice($attr,$aPrice,$uPrice,$gId){
        $sql = $this->getSql();
        $b = true;
        if(!empty($attr) && is_array($attr)){
            $data = array();
            foreach($attr as $key=>$value) {
                array_push($data, array($gId,$key ,$value ));
            }
            $sql->delete('g_attr',new Where('g_id',$gId,'int'));
           if(!$sql->insert('g_attr',array('g_id'=>'int','gta_id'=>'int','ga_value'),$data)){
               $b = false;
           }
        }
        if(!empty($aPrice) && is_array($aPrice)){
            $data = array();
            foreach($aPrice as $key=>$value) {
                foreach ($value as $v){
                    if(empty($v)){continue;}
                    array_push($data, array($gId, $key, $v));
                }
            }
            if(!$sql->insert('g_price',array('g_id'=>'int','gtp_id'=>'int','gp_name'),$data)){
                $b = false;
            }
        }
        if(!empty($uPrice) && is_array($uPrice)){
            $data = array();
            foreach($uPrice as $key=>$value) {
                $sql->update('g_price',new Where('gp_id',$key,'int'),array($value=>'gp_name'));
            }
        }

        return $b;
    }




    /**
     * 获取商品类型
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
    public function getGoodsType($start, $sum  ,$sortLine ='gt_id' , $sort = "asc"){
        $sql = $this->getSql(); 
        $where = new Where('gt_status','1','int');
        if(empty($sortLine)){$sortLine = "gt_id";}
        if(empty($sort)){$sort = "asc";}
        $count = $sql->selectLine('goods_type',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('goods_type',array('gt_id','gt_number','gt_name','gt_remark'),$where);
        return array('count'=>$count['count'],'data'=>$data);
    }

    /**
     * 搜索商品类型
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
    public function searchGoodsType($name,$start,$sum,$sortLine ='gt_id' , $sort = "asc" ){
        $sql = $this->getSql(); 
        if(empty($sortLine)){$sortLine = "gt_id";}
        if(empty($sort)){$sort = "asc";}
        $where =new Where('gt_number',$name['key'],'string','OR','LIKE');
        $where->setWhere('gt_name',$name['key'],'string','OR','LIKE');
        $where->setWhere('gt_remark',$name['key'],'string','OR','LIKE');
        $where->setWhere('gt_status','1','int');
        $count = $sql->selectLine('goods_type',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('goods_type',array('gt_id','gt_name','gt_remark','gt_number'),$where);
        return array('count'=>$count['count'],'data'=>$data);
    }

    /**
     * 查询商品类型的详细信息
     *
     * @param $gtId int 商品类型ID
     *
     * @return array 商品类型详细资料
     */
    public function queryGoodsType($gtId){
        $sql = $this->getSql(); 
        $where = new Where('gt_id',$gtId);
        $row = $sql->selectLine('goods_type',array('gt_id','gt_number','gt_name','gt_remark'),$where);
        $row['price'] = $sql->selectData('gt_price',array('gtp_id','gtp_name'),$where);
        $row['attr'] = $sql->selectData('gt_attr',array('gta_id','gta_name'),$where);
        return $row;
    }

    public function queryGoodsTypeInfo($gtId){
        $sql = $this->getSql(); 
        $where = new Where('gt_id',$gtId);

        $price = $sql->selectData('gt_price',array('gtp_id','gtp_name'),$where);
        $attr = $sql->selectData('gt_attr',array('gta_id','gta_name'),$where);
        $row= array('price'=>array(),'attr'=>array());
        $row['gt_number'] = $sql->selectLine('goods_type',array('gt_number'),$where)['gt_number'];
        foreach($price as $value){
            $row['price'][$value['gtp_id']] = $value['gtp_name'];
        }
        foreach($attr as $value){
            $row['attr'][$value['gta_id']] = $value['gta_name'];
        }
        return $row;
    }
    /**
     * 增加商品类型
     *
     * @param $goodsType array 商品类型详情
     *
     * @param $aId int 管理员ID
     *
     * @param $meg string 日志消息
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function addGoodsType($goodsType,$aId,$meg){
        $sql = $this->getSql(); 
        $columns = array();
        $values = array();
        foreach($goodsType as $key=>$value){
            if(is_array($value) || empty($value)){break;}
            $columns[$key] = $this->isNumber($key,true);
            array_push($values,$value);
        }
        if($gtId = $sql->insert('goods_type',$columns,$values)){
            $this->addGtAttrPrice($goodsType['attr'],$goodsType['price'],$gtId);
            SystemLog::addSystemLog($aId,'增加商品类型',$meg);
            return true;
        }
        return false;
    }

    /**
     * 修改商品类型
     *
     * @param $goodsType array 商品类型详情
     *
     * @param $aId int 管理员ID
     *
     * @param $meg string 日志消息
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function updateGoodsType($goodsType,$aId,$meg){
        $sql = $this->getSql(); 
        $data = array();
        $b = true;
        $column = array('gt_name','gt_remark');
        foreach($goodsType as $key=>$value){
            if(in_array($key,$column)&& !empty($value)){
                array_push($data,array('columnName'=>$key,'value'=>$value,'type'=>$this->isNumber($key,true)));
            }
        }
        if(!empty($data)){
            if(!$sql->update('goods_type',new Where('gt_id',$goodsType['gt_id']),$data)){
                $b = false;
            }
        }
        if(!empty($goodsType['attr']) ||!empty($goodsType['price'])){
            if(!$this->addGtAttrPrice($goodsType['attr'],$goodsType['price'],$goodsType['gt_id'])){
                $b = false;
            }
        }
        if(!empty($goodsType['uAttr']) ||!empty($goodsType['uPrice'])){
            if(!$this->updateGtAttrPrice($goodsType['uAttr'],$goodsType['uPrice'])){
                $b = false;
            }
        }
        SystemLog::addSystemLog($aId,'更新商品类型',$meg);
        return $b;
    }

    /**
     * 增加商品类型属性,价格
     *
     * @param $gtAttr array 商品属性
     *
     * @param $gtPrice array 商品价格属性
     *
     * @param $gtId int 商品ID
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function addGtAttrPrice($gtAttr,$gtPrice,$gtId){
        $sql = $this->getSql(); 
        $b = true;
        if(!empty($gtAttr) && is_array($gtAttr)){
            $data = array();
            foreach($gtAttr as $value) {
                if(empty($value)){continue;}
                array_push($data, array($gtId, $value));
            }
            if(!empty($data)){
                if(!$sql->insert('gt_attr',array('gt_id'=>'int','gta_name'),$data)){
                    $b = false;
                }
            }
        }
        if(!empty($gtPrice) && is_array($gtPrice)){
            $data = array();
            foreach($gtPrice as $value) {
                if(empty($value)){continue;}
                array_push($data, array($gtId, $value));
            }
            if(!empty($data)){
                if(!$sql->insert('gt_price',array('gt_id'=>'int','gtp_name'),$data)){
                    $b = false;
                }
            }
        }
        return $b;
    }
    /**
     * 修改商品类型属性,价格
     *
     * @param $gtAttr array 商品属性 关联数组 key为属性ID,value为属性值
     *
     * @param $gtPrice array 商品价格属性 关联数组 key为价格属性ID,value为价格属性值
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function updateGtAttrPrice($gtAttr,$gtPrice){
        $sql = $this->getSql(); 
        $b = true;

        if(!empty($gtAttr) && is_array($gtAttr)){
            foreach($gtAttr as $key=>$value) {
                if(!$sql->update('gt_attr',new Where('gta_id',$key),array($value=>'gta_name'))){
                    $b = false;
                }
            }
        }
        if(!empty($gtPrice) && is_array($gtPrice)){
            foreach($gtPrice as $key=>$value) {
                if(!$sql->update('gt_price',new Where('gtp_id',$key),array($value=>'gtp_name'))){
                    $b = false;
                }
            }
        }
        return $b;
    }

    /**
     * 删除商品类型
     *
     * @param $gtId int 商品类型ID
     *
     * @param $aId int 管理员ID
     *
     * @param $meg string 日志消息
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function deleteGoodsType($gtId,$aId,$meg){
        $sql = $this->getSql(); 
        if($sql->update('goods_type',new Where('gt_id',$gtId,'int'),array('columnName'=>'gt_status','value'=>'2','type'=>'int'))){
            return SystemLog::addSystemLog($aId,"删除商品类型",$meg);
        }
    }

    public function addGoodsPrice($gpi,$gp_ids){
        $sql = $this->getSql();
        $columns = array();
        $values = array();
        $gpi_id = 0;
        foreach($gpi as $key=>$value){
            if(is_array($value) || empty($value)){continue;}
            $columns[$key] = $this->isNumber($key,true);
            array_push($values,$value);
        }
       if($gpi_id = $sql->insert('g_price_info',$columns,$values)){
           $data = array();
           foreach ($gp_ids as $val){
               array_push($data,array($gpi_id,$val));
           }
           if(!empty($data)){
                if(!$sql->insert('g_price_list',array('gpi_id'=>'int','gp_id'=>'int'),$data)){
                    return false;
                }
           }
            return $gpi_id;
       }
        return false;
    }
    public function updateGoodsPrice($gpi,$gp_ids){
        $sql = $this->getSql();
        $where = new Where('gpi_id',$gpi['gpi_id']);
        $data = array();
        foreach($gpi as $key=>$value){
            if(is_array($value) || empty($value) || $value == 'gpi_id'){continue;}
            array_push($data,array('columnName'=>$key,'value'=>$value,'type'=>$this->isNumber($key,true)));
        }
        if(!empty($data) && $sql->update('g_price_info',$where,$data) && !empty($gp_ids) && $sql->delete('g_price_list',$where)){
            $data = array();
            foreach ($gp_ids as $val){
                array_push($data,array($gpi['gpi_id'],$val));
            }
            if(!empty($data)){
                return $sql->insert('g_price_list',array('gpi_id'=>'int','gp_id'=>'int'),$data);
            }
            return true;
        }
        return false;
    }
    public function deleteGoodsPrice($gpi_id){
        $sql = $this->getSql();
        $where = new Where('gpi_id',$gpi_id);
        if($sql->delete('g_price_list',$where)){
            return $sql->delete('g_price_info',$where);
        }
        return false;
    }


    public function queryIndexRoll($ir_id){
        $sql = $this->getSql();
        return $sql->selectLine("SELECT ir_id,ir_name,ir_img,ir_start_time,ir_end_time ,g_name ,index_roll.g_id as g_id FROM index_roll,goods WHERE index_roll.g_id = goods.g_id AND ir_id=".$ir_id);

    }
    public function getIndexRoll(){
        $sql = $this->getSql();
        return $sql->queryData("SELECT ir_id,ir_name,ir_img,ir_start_time,ir_end_time ,g_name ,index_roll.g_id as g_id FROM index_roll,goods WHERE index_roll.g_id = goods.g_id");

    }
    public function updateIndexRoll($ir){
        $sql = $this->getSql();
        $where = new Where('ir_id',$ir['ir_id'],'int');
        $data = array();
        foreach($ir as $key=>$value){
            if($value =='ir_id'){continue;}
            if($value != null){
                array_push($data,array('columnName'=>$key,'value'=>$value,'type'=>$this->isNumber($key,true)));
            }
        }
        return $sql->update('index_roll',$where,$data);
    }
    public function addIndexRoll($ir){
        $sql = $this->getSql();
        $column = array();
        $values = array();
        foreach($ir as $key=>$value){
            if($value != null){
                $column[$key] = $this->isNumber($key,true);
                array_push($values,$value);
            }
        }
       return $sql->insert('index_roll',$column,$values);

    }
    public function deleteIndexRoll($ir_id){
        $sql = $this->getSql();
        $where = new Where('ir_id',$ir_id,'int');
        return $sql->delete('index_roll',$where);

    }

}

