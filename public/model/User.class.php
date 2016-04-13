<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-12
 * Time: 上午12:23
 */

require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class User extends Model{
    public function __construct()
    {
        $this->columnName = array('u_id','u_name','u_pwd','u_phone','u_nick','u_email','u_address','u_img','u_reg','u_status'=>'int');

    }
    public function save()
    {
        $u_id = 0;
        $sql = new Sql();
        foreach ($this->model as $user){
            if(!empty($user['u_id'])){//修改
                $data = array();
                foreach($user as $key=>$value){
                    if($key==='u_id')continue;
                    array_push($data,array('columnName'=>$key,'value'=>$value,'type'=>$this->columnType($key)));
                }
                $sql->update('user',new Where('u_id',$user['u_id'],'int'),$data);
            }else{//增加
                $column = array();
                $data = array();
                foreach($user as $key=>$value){
                    $column[$key] =$this->columnType($key);
                    array_push($data,$value);
                }
                //print_r($column);
               // print_r($data);
                $u_id =$sql->insert('user',$column,$data);
            }
        }
        return $u_id;
    }
    
    public function read($arr)
    {
        $row = array();
        foreach($arr as $key=>$value){
            if(empty($value))continue;
            $value =Xss::RemoveXSS($value);
            if($key ==='u_id'){
                $row['u_id'] = intval($value);
            }
            if($key ==='u_name'){
                $row['u_name'] = $value;
            }
            if($key ==='u_pwd'){
                $row['u_pwd'] = md5($value);
            }
            if($key ==='u_nick'){
                $row['u_nick'] =$value;
            }
            if($key ==='u_phone'){
                $row['u_phone'] = $value;
            }
            if($key ==='u_email'){
                $row['u_email'] = $value;
            }
            if($key ==='u_address'){
                $row['u_address'] = $value;
            }
            if($key ==='u_status'){
                $row['u_status'] = intval($value);
            }
            if($key ==='u_img'){
                $row['u_img'] = $value;
            }
        }
        $this->model[] = $row;
    }

    public function remove()
    {
        $sql = $this->getSql();
        foreach ($this->model as $user){
            if(!empty($user['u_id'])){
                $sql->delete('user',new Where('u_id',$user['u_id'],'int'));
            }
        }
    }

    public function query(Where $where,$columnName = '*')
    {
        $sql = $this->getSql();
       $this->model =$sql->selectData('user',$columnName,$where) ;

    }
}