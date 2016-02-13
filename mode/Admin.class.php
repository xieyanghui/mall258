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

    public function isNumber($columnName)
    {
        // TODO: Implement isNumber() method.
        $columnNames = array('a_id','aa_id');
        if (in_array($columnName , $columnNames)){
            return true;
        }
        return FALSE;

    }
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
//    //返回总行数
//    public function adminCounts()
//    {
//        $sql = new Sql;
//        $sqls = "SELECT COUNT(a_id) as count FROM `admin`";
//        $row = $sql->queryLine($sqls);
//        return $row['count'];
//    }
//
    /*
     * 查询管理员信息
     * $start 开始行
     * $sum  去多少行
     * $sortline 排序列
     * $sort 排序方法
     * */
    public function getAdmin($start, $sum, $sortLine = "a_id", $sort = "asc")
    {
       empty($sortLine)?$sortLine = "a_id":null;
        $sql = new Sql;
        $sqls = "SELECT `a_id`,`a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id ORDER BY `$sortLine` $sort   limit $start,$sum";
        return $sql->queryData($sqls);
    }

    public function searchAdmin($name,$start, $sum, $sortLine = "a_id", $sort = "asc")
    {
        if(empty($sortLine)){$sortLine = "a_id"; }
        $sql = new Sql;
        $cou = $sql->queryLine("SELECT COUNT(`a_id`) as count FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id   AND  ".$name['searchLine']." LIKE  '%".$name['key']."%'");
        $data = $sql->queryData("SELECT `a_id`,`a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id   AND  ".$name['searchLine']." LIKE  '%".$name['key']."%'  ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data[0]['count'] = $cou['count'];
        return $data;
    }
//
//    //查询单个管理员信息
//    public function queryAdmin($id)
//    {
//        $sql = new Sql;
//        $id = $sql->sqlVerif($id);
//        $sqls = "SELECT `a_id`, `a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin`,`admin_auth` WHERE admin_auth.aa_id =admin.aa_id AND  `a_id` = $id";
//        return $sql->queryLine($sqls);
//    }
//
//    //判断是否是数字，以便值是否加‘’;
//    public function isInt($column)
//    {
//        if ($column == "a_id") {
//            return true;
//        }
//        return FALSE;
//    }
//    //删除管理员
//    public function deleteAdmin($id){
//        $sql = new Sql;
//        return $sql->execute("DELETE FROM `admin` WHERE `a_id` = $id ");
//    }
//    //管理员登陆
//    public function login($name, $pwd, $aip)
//    {
//        $sql = new Sql;
//        $name = $sql->sqlVerif($name);
//        $pwd = $sql->sqlVerif($pwd);
//        $row = $sql->queryLine("SELECT `a_id` ,`a_nick` ,`aa_id`,`a_img` FROM `admin` WHERE `a_name` = '$name' and `a_pwd` ='$pwd'");
//        //$row['auth'] = array();
//        if (count($row) > 1) {
//            $sql->execute("INSERT INTO `adminLoginLog`(a_id,ip) VALUES (" . $row['a_id'] . ",'" . $aip . "')");
//            return $row;
//        } else {
//            return null;
//        }
//    }
//
//    //增加管理员
//    public function addAdmin($arr)
//    {
//        $sql = new Sql;
//        $arr = $sql->arrSqlVerif($arr);
//        $sqls = "INSERT INTO admin" . $sql->addSqlState($arr, $this);
//        return $sql->execute($sqls);
//    }
//    //自己修改管理员
//    public function updateAdmin($arr, $id)
//    {
//        $sql = new Sql;
//        $arr = $sql->arrSqlVerif($arr);
//        $sqls = "UPDATE `admin` SET " . $sql->updateSqlState($arr, $this) . " WHERE a_id = $id;";
//        return $sql->execute($sqls);
//    }
//
//    //超级管理员修改管理员信息
//    public function updateAdmins($id,$nick,$aa_id)
//    {
//        $sql = new Sql;
//        $id = $sql->sqlVerif($id);
//        $nick = $sql->sqlVerif($nick);
//        $aa_id =$sql->sqlVerif($aa_id);
//        $sqls = "UPDATE `admin` SET `a_nick` = '$nick' ,`aa_id` ='$aa_id' WHERE a_id = $id;";
//        return $sql->execute($sqls);
//    }
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
//
//    }
//    //更新管理员密码
//    public function updateAdminPwd($id,$oldPwd,$newPwd){
//        $sql = new Sql;
//        $id = $sql->sqlVerif($id);
//        $row = $sql->queryLine("SELECT `a_id` from `admin` WHERE `a_id` =$id AND `a_pwd` ='$oldPwd'");
//        //print_r($row);
//        if(!empty($row)){
//            return $sql->execute("UPDATE `admin` SET `a_pwd` = '$newPwd' WHERE `a_id` = $id");
//        }else{
//           return  false;
//        }
//
//    }
}

