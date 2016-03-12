<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/3/7
 * Time: 19:13
 */
class ImgSpace{
    private $sql =null;
    private function getSql(){
        if(empty($this->sql)){
            $this->sql = new Sql();
        }
        return $this->sql;
    }

    public function getImgSpace($a_id){
        $sql = $this->getSql();
        $where = new Where('a_id',$a_id,'int');
        $where->setWhere('a_id',0,'int','OR');
        $where->setWhereEnd("ORDER BY `ait_id`  ");
        $data = $sql->selectData('admin_img_type',array('ait_id','ait_name'),$where);
        foreach($data as $key=>$value){
            $where = new Where('a_id',$a_id,'int');
            $where->setWhere('ait_id',$value['ait_id'],'int');
            $data[$key]['value'] = $sql->selectData('admin_img_space',array('ais_id','ais_name','ais_img_url','ais_time'),$where);
        }
        return $data;
    }
    public function getImgType($a_id){
        $sql = $this->getSql();
        $where = new Where('a_id',$a_id,'int');
        $where->setWhere('a_id',0,'int','OR');
        return $sql->selectData('admin_img_type',array('ait_id','ait_name'),$where);
    }
    public function deleteImgSpace($ais_id,$a_id){
        $sql = $this->getSql();
        $where = new Where('a_id',$a_id,'int');
        if(is_array($ais_id)){
            foreach($ais_id as $id){
                $where->setWheres('img','ais_id',$id,'int','OR');
                $row = $sql->selectLine('admin_img_space','ais_img_url',new Where('ais_id',$id,'int'));
                $res = Qiniu::deleteImg($row['ais_img_url']);
                if(!empty($res)){

                };
            }

            $where->setWheresLogic('img','AND');
        }else{
            $where ->setWhere('ais_id',$ais_id,'int');
        }

        return $sql->delete('admin_img_space',$where);
    }
    public function deleteImgType($ait_id,$a_id){
        $sql = $this->getSql();
        $where = new Where('ait_id',$ait_id,'int');
        $where->setWhere('a_id',0,'int');
        if($sql->selectLine('admin_img_type','ait_id',$where)){return false;}
        $where = new Where('ait_id',$ait_id,'int');
        $where ->setWhere('a_id',$a_id,'int');
        if($sql->update('admin_img_space',$where,array('columnName'=>'ait_id','type'=>'int','value'=>'1'))){
            return $sql->delete('admin_img_type',$where);
        }
        return false;

    }

    public function addImgType($ait_name,$a_id){
        if(empty($ait_name)){return false;}
        $sql = $this->getSql();
        $where = new Where('a_id',$a_id,'int');
        $where->setWhere('ait_name',$ait_name);
        if(empty($sql->selectLine('admin_img_type','ait_id',$where))){
            return $sql->insert('admin_img_type',array('ait_name','a_id'=>'int'),array($ait_name,$a_id));
        }
        return false;
    }
    public function addImgSpace($ais_name,$a_id,$ais_img_url,$ait_id){
        $sql = $this->getSql();
        return $sql->insert('admin_img_space',array('ais_name','a_id'=>'int','ais_img_url','ait_id'=>'int'),array($ais_name,$a_id,$ais_img_url,$ait_id));
    }
    public function moveImgSpace($ais_id,$ait_id){
        $sql = $this->getSql();
        $where = new Where();
        if(is_array($ais_id)){
            foreach($ais_id as $id){
                $where->setWhere('ais_id',$id,'int','OR');
            }
        }else{
            $where ->setWhere('ais_id',$ais_id,'int');
        }
        return $sql->update('admin_img_space',$where,array($ait_id =>'ait_id',date("Y-m-d H:i:s")=>'ais_time'));
    }
    public function updateImgSpace($ais_id,$ais_name,$ais_img_url,$ait_id){
        $data =array();
        if(!empty($ais_id) && is_array($ais_id)){
           return $this->moveImgSpace($ais_id,$ait_id);
        }
        if(!empty($ais_name)){
            $data[$ais_name] ='ais_name';
        }
        if(!empty($ais_img_url)){
            $data[$ais_img_url] ='ais_img_url';
        }
        if(!empty($ait_id)){
            array_push($data,array('columnName'=>'ait_id','type'=>'int','value'=>$ait_id));
        }
        $sql = $this->getSql();
        if(empty($data)){return false;}
        return $sql->update('admin_img_space',new Where('ais_id',$ais_id,'int'),$data);
    }

    public function updateImgType($ait_name,$ait_id){
        $sql = $this->getSql();
        $where = new Where('ait_id',$ait_id,'int');
        $where->setWhere('a_id',0,'int');
        if($sql->selectLine('admin_img_type','ait_id',$where)){return false;}
        return $sql->update('admin_img_type',new Where('ait_id',$ait_id,'int'),array($ait_name=>'ait_name'));
    }
}