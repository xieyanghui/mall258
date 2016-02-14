<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/util/autoload.php");

/*
 *   管理员信息
 * `a_id`   管理员ID
 * `a_name` 管理员账号
 * `a_pwd`  管理员密码
 * `a_reg`  添加日期
 * `a_img`  头像路径
 * `a_nick` 管理员姓名
 * */

class Admin
{

    public function isNumber($columnName,$type=false)
    {
        // TODO: Implement isNumber() method.
        $columnNames = array('a_id','aa_id');
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
     * 修改管理员密码
     *
     * @param $id int 管理员ID
     *
     * @param $oldPwd string 原密码
     *
     * @param $newPwd string 新密码,已加密过的
     *
     * @return bool 成功返回true,失败返回false
    */
    public function updateAdminPwd($id,$oldPwd,$newPwd){
        $sql = new Sql;
       // $row = $sql->queryLine("SELECT `a_id` from `admin` WHERE `a_id` =$id AND `a_pwd` ='$oldPwd'");
        $wh = new Where('a_id',$id,'int');
        $wh->setWhere('a_pwd',$oldPwd);
        $data = $sql->select('admin','a_id',$wh);
        print_r($data);
        if(!empty($data[0])){
            return $sql->update('admin',new Where('a_id',$id,'int'),array(array('columnName'=>'a_pwd','value'=>$newPwd,'type'=>'string')));
        }else{
           return  false;
        }

    }

    /**
     * 获取管理员列表
     *
     * @param $start int 从第几行开始
     *
     * @param $sum int 需要多少行
     *
     * @param $sortLine string 排序列名,默认a_id
     *
     * @param $sort string 排序方式,默认asc
     *
     * @return array 返回获取到的数据
     */
    public function getAdmin($start, $sum, $sortLine = "a_id", $sort = "asc")
    {
        $sql = new Sql;
        // $sqls = "SELECT ``,`a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin_info_v` WHERE admin_auth.aa_id = admin.aa_id ORDER BY `$sortLine` $sort   limit $start,$sum";
        $where = new Where();
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        return $sql->select('admin_info_v',array('a_id','a_name','a_reg','aa_nick','a_img','a_nick'),$where);

    }

    /**
     * 查询管理员列表
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
    public function searchAdmin($name,$start, $sum, $sortLine = "a_id", $sort = "asc")
    {
        $sql = new Sql;
        $where =new Where($name['searchLine'],$name['key'],'string','AND','LIKE');
        $count = $sql->select('admin_info_v',"COUNT(`a_id`) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->select('admin_info_v',array('a_id','a_name','a_reg','aa_nick','a_img','a_nick'),$where);
       // $count = $sql->queryLine("SELECT COUNT(`a_id`) as count FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id   AND  ".$name['searchLine']." LIKE  '%".$name['key']."%'");
      //  $data = $sql->queryData("SELECT `a_id`,`a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id   AND  ".$name['searchLine']." LIKE  '%".$name['key']."%'  ORDER BY `$sortLine` $sort   limit $start,$sum");
        return array('count'=>$count['count'],'data'=>$data);
    }

    /**
     * 查询单个管理员信息
     *
     * @param $id int ID
     *
     * @return array 返回管理员信息
     */
    public function queryAdmin($id)
    {
        $sql = new Sql;
        $where =new Where('a_id',$id,'int');
        //$sqls = "SELECT `a_id`, `a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin`,`admin_auth` WHERE admin_auth.aa_id =admin.aa_id AND  `a_id` = $id";
        return $sql->select('admin_info_v',array('a_id','a_name','a_reg','aa_nick','a_img','a_nick'),$where);
    }

    /**
     * 删除管理员
     *
     * @param $dId int 需要删除的用户ID
     *
     * @param $aId int 操作者ID
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function deleteAdmin($dId,$aId){
        $sql = new Sql;
        if($dId == 1){
            return false;
        }
        if($sql->delete('admin',new Where('a_id',$dId))){
            return $sql->insert('admin_log',array('a_id'=>'int','alog_key'=>'string','alog_content'=>'string'),array($aId,'删除管理员',$dId));
        }else{
            return false;
        }

    }

    /**
     * 管理员登陆
     *
     * @param $name string 用户名
     *
     * @param $pwd string 密码
     *
     * @param $ip string ip地址
     *
     * @return array|boolean 成功返回管理员信息,失败返回false
     */
    public function adminLogin($name, $pwd, $ip)
    {
        $sql = new Sql;
        //$row = $sql->queryLine("SELECT `a_id` ,`a_nick` ,`aa_id`,`a_img` FROM `admin` WHERE `a_name` = '$name' and `a_pwd` ='$pwd'");
        //$row['auth'] = array();
        $where = new Where('a_name',$name);
        $where->setWhere('a_pwd',$pwd);
        $row = $sql->select('admin','a_id',$where);
        if (count($row) > 1) {
            $sql->insert('admin_login_log',array('a_id'=>'int','ip'=>'string'),array($row['a_id'],$ip));
            //$sql->execute("INSERT INTO `adminLoginLog`(a_id,ip) VALUES (" . $row['a_id'] . ",'" . $ip . "')");
            return $this->queryAdmin($row['a_id']);
        } else {
            return false;
        }
    }

    /**
     * 增加管理员
     *
     * @param $admin array 管理员信息
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function addAdmin($admin)
    {
        $sql = new Sql;
        $columns =array();
        $values = array();
        foreach($admin as $key=>$value){
            if($this->isNumber($key)){
                $columns[$key] = 'int';
            }else{
                $columns[$key] = 'string';
            }
            array_push($values,$value);
        }
        return $sql->insert('admin',$columns,$values);
        //$sqls = "INSERT INTO admin" . $sql->addSqlState($arr, $this);
        //return $sql->execute($sqls);
    }

    /**
     * 超级管理员修改管理员
     *
     * @param $admin array 管理员信息
     *
     * @param $aId int 超级管理员ID
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function updateAdmins($admin,$aId)
    {
        $sql = new Sql;
        $values = array();
        foreach($admin as $key=>$value){
            if($key=='a_name' || $key=='a_nick'|| $key=='aa_id'){
                array_push($values,array('columnName'=>$key,'value'=>$value,'type'=>$this->isNumber($key,true)));
            }
        }
        if($sql->update('admin',new Where('a_id',$admin['a_id'],'int'),$values)){
           return $sql->insert('admin_log',array('a_id'=>'int','alog_key'=>'string','alog_content'=>'string'),array($aId,'修改管理员',$admin['a_id']));
        }else{
            return false;
        }

    }
//
//    //权限组总数
//    public function admin_authCounts(){
//        $sql = new Sql;
//        $row = $sql->queryLine("SELECT COUNT(aa_id) as count FROM `admin_auth`");
//        return $row['count'];
//    }
//    //搜索
//    public function searchadmin_auth($name,$start,$sum,$sortLine = "aa_id", $sort = "asc" ){
//        $sql = new Sql;
//        if(empty($sortLine)){$sortLine = "aa_id"; }
//        $ro = $sql->queryLine("SELECT COUNT(`aa_id`)as count FROM `admin_auth` WHERE `aa_nick` LIKE '%$name%' OR  `aa_remark` LIKE '%$name%';");
//         $data = $sql->queryData("SELECT `aa_id`, `aa_nick` ,`aa_remark` FROM `admin_auth` WHERE `aa_nick` LIKE '%$name%' OR  `aa_remark` LIKE '%$name%' ORDER BY `$sortLine` $sort LIMIT  $start ,$sum; ");
//        $data[0]['count'] = $ro['count'];
//        return $data;
//    }
//    //返回权限组表
//    public function getadmin_auth($start =0, $sum = 10 ,$sortLine = "aa_id", $sort = "asc"){
//        $sql = new Sql;
//        if(empty($sortLine)){$sortLine = "aa_id"; }
//        $sqls = "SELECT `aa_id`, `aa_nick` ,`aa_remark` FROM `admin_auth` ORDER BY `$sortLine` $sort LIMIT  $start ,$sum; ";
//        return $sql->queryData($sqls);
//}
//
//    //权限列表
//    public function getAuthList(){
//        $sql = new Sql;
//        $sqls = "SELECT `al_id`, `al_nick` ,`al_remark` FROM `authList` ";
//        return $sql->queryData($sqls);
//    }
//
//
//    //查询权限组详细
//    public function queryadmin_auth($aa_id){
//        $sql = new Sql;
//        $row = $sql->queryLine("SELECT `aa_id`, `aa_nick`,`aa_remark` FROM `admin_auth` WHERE `aa_id` = $aa_id");
//        $data = $sql->queryData("SELECT `al_id` FROM `admin_authList` WHERE `aa_id` = $aa_id;");
//        //$row = null;
//        foreach((array)$data as $value){
//            $row['auth'][] = $value['al_id'];
//        }
//        return $row;
//    }
//
//    //增加权限
//    public  function addadmin_auth($name,$remark,$auth){
//        $sql = new Sql;
//        $sqls = "INSERT INTO `admin_auth`(`aa_nick` ,`aa_remark`) VALUES ('$name','$remark') ;";
//        $aa_id = $sql->executeid($sqls);
//        //$row = $sql->queryLine("SELECT `aa_id` FROM admin_auth WHERE `aa_nick` = '$name';");
//        $str = "";
//        foreach((array)$auth as $value){
//            $str .= "(".$aa_id.",".$value.") ,";
//        }
//        if($sql->execute("INSERT INTO `admin_authList` (`aa_id`,`al_id`) VALUES".substr($str,0,strlen($str) -1))){
//            return true;
//        }
//        return false;
//    }
//    //更新权限
//    public function updateadmin_auth($id ,$name,$remark,$auth){
//        $sql = new Sql;
//        $id = $sql->sqlVerif($id);
//        $name = $sql->sqlVerif($name);
//        $remark = $sql->sqlVerif($remark);
//        $auth = $sql->arrSqlVerif($auth);
//        $b = false ;
//        if($sql->execute("UPDATE `admin_auth` SET `aa_nick` = '$name' ,`aa_remark` = '$remark' WHERE `aa_id` = $id;")){
//            if($sql->execute("DELETE  FROM `admin_authList` WHERE `aa_id` = $id;") && !empty($auth)){
//                $str = "";
//                foreach($auth as $value){
//                    $str .= "(".$id.",".$value.") ,";
//                }
//                $b = $sql->execute("INSERT INTO `admin_authList` (`aa_id`,`al_id`) VALUES".substr($str,0,strlen($str) -1));
//            }elseif(empty($auth)){
//                $b = true;
//            }
//        }
//
//        return $b;
//    }
//    //删除权限
//    public function deleteadminauth($id){
//        $sql = new Sql;
//        $id = $sql->sqlVerif($id);
//        $b = false;
//       if($sql->execute("DELETE FROM `admin_authList` WHERE `aa_id` = $id")){
//           if($sql->execute("UPDATE `admin` SET `aa_id` =0 WHERE `aa_id` =$id")){
//               $b = $sql->execute("DELETE FROM `admin_auth` WHERE  `aa_id` = $id");
//           }
//       }
//        return $b;
//    }
//    //更新管理员头像
//    public function updateAdminImg($id,$path){
//        $sql = new Sql;
//        $id = $sql->sqlVerif($id);
//        $path = $sql->sqlVerif($path);
//        return $sql->execute("UPDATE `admin` SET `a_img` = '$path' WHERE `a_id` = $id");
//    }

}

