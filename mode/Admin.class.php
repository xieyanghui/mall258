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
        $columnNames = array('a_id','aa_id','aal_id','al_id','ais_id','alog_id','all_id');
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
        $data = $sql->selectData('admin','a_id',$wh);
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
     * @return array 关联数组count总行数,data查询到的数据
     */
    public function getAdmin($start, $sum, $sortLine = "a_id", $sort = "asc")
    {
        $sql = new Sql;
        $where = new Where('a_status',1);
        if(empty($sortLine)){$sortLine = "a_id";}
        if(empty($sort)){$sort = "asc";}
        $count = $sql->selectLine('admin_info_v',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('admin_info_v',array('a_id','a_name','a_reg','aa_nick','a_img','a_nick'),$where);
        return array('count'=>$count['count'],'data'=>$data);

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
        if(empty($sortLine)){$sortLine = "a_id";}
        if(empty($sort)){$sort = "asc";}
        $where->setWhere('a_status',1);
        $count = $sql->selectLine('admin_info_v',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('admin_info_v',array('a_id','a_name','a_reg','aa_nick','a_img','a_nick'),$where);
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
        return $sql->selectLine('admin_info_v',array('a_id','a_name','a_reg','aa_nick','a_img','a_nick'),$where);
    }

    /**
     * 删除管理员
     *
     * @param $dId int 需要删除的用户ID
     *
     * @param $aId int 操作者ID
     *
     * @param $meg string 系统日志详细
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function deleteAdmin($dId,$aId,$meg){
        $sql = new Sql;
        if($dId == 1){
            return false;
        }
        if($sql->update('admin',new Where('a_id',$dId),array('columnName'=>'a_status','value'=>2,'type'=>'int'))){
            return $sql->insert('admin_log',array('a_id'=>'int','alog_key'=>'string','alog_content'=>'string'),array($aId,'删除管理员',$meg));
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
        $where = new Where('a_name',$name);
        $where->setWhere('a_pwd',$pwd);
        $row = $sql->selectLine('admin','a_id',$where);
       // print_r($row);
        if (count($row) >= 1) {
            $sql->insert('admin_login_log',array('a_id'=>'int','ip'=>'string'),array($row['a_id'],$ip));
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
     * @param $aId int 操作者ID
     *
     * @param $meg string 系统日志详细
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function addAdmin($admin,$aId,$meg)
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
        $b = $sql->insert('admin',$columns,$values);
        if($b > 0){
            return $this->addAdminLog($aId,'增加管理员',$meg);
        }
        return false;
        //$sqls = "INSERT INTO admin" . $sql->addSqlState($arr, $this);
        //return $sql->execute($sqls);
    }

    /**
     * 管理员修改管理员
     *
     * @param $admin array 管理员信息
     *
     * @param $aId int 管理员ID
     *
     * @param $meg string 系统日志详细
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function updateAdmins($admin,$aId,$meg)
    {
        $sql = new Sql;
        $values = array();
        if($admin['a_id'] ==1){return false;}
        foreach($admin as $key=>$value){
            if($key=='a_name' || $key=='a_nick'|| $key=='aa_id'){
                array_push($values,array('columnName'=>$key,'value'=>$value,'type'=>$this->isNumber($key,true)));
            }
        }
        if($sql->update('admin',new Where('a_id',$admin['a_id'],'int'),$values)){
            return $this->addAdminLog($aId,'修改管理员',$meg);
        }else{
            return false;
        }

    }

    /**
     * 查询权限级别列表
     *
     * @param $name string 关键字
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
    public function searchAdminAuth($name,$start,$sum,$sortLine = "aa_id", $sort = "asc" ){
        $sql = new Sql;
        $where =new Where('aa_nick',$name,'string','AND','LIKE');
        $where->setWhere('aa_remark',$name,'string','OR','LIKE');
        $count = $sql->selectLine('admin_auth',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('admin_auth',array('aa_id','aa_nick','aa_remark'),$where);
        // $count = $sql->queryLine("SELECT COUNT(`a_id`) as count FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id   AND  ".$name['searchLine']." LIKE  '%".$name['key']."%'");
        //  $data = $sql->queryData("SELECT `a_id`,`a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin`,`admin_auth` WHERE admin_auth.aa_id = admin.aa_id   AND  ".$name['searchLine']." LIKE  '%".$name['key']."%'  ORDER BY `$sortLine` $sort   limit $start,$sum");
        return array('count'=>$count['count'],'data'=>$data);
//        $sql = new Sql;
//        if(empty($sortLine)){$sortLine = "aa_id"; }
//        $ro = $sql->queryLine("SELECT COUNT(`aa_id`)as count FROM `admin_auth` WHERE `aa_nick` LIKE '%$name%' OR  `aa_remark` LIKE '%$name%';");
//         $data = $sql->queryData("SELECT `aa_id`, `aa_nick` ,`aa_remark` FROM `admin_auth` WHERE `aa_nick` LIKE '%$name%' OR  `aa_remark` LIKE '%$name%' ORDER BY `$sortLine` $sort LIMIT  $start ,$sum; ");
//        $data[0]['count'] = $ro['count'];
//        return $data;
    }

    /**
     * 所有权限级别列表
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
    public function getAdminAuth($start =0, $sum = 10 ,$sortLine = "aa_id", $sort = "asc"){
        $sql = new Sql;
        // $sqls = "SELECT ``,`a_name`,`a_reg`,`aa_nick`,`a_img`,`a_nick` FROM `admin_info_v` WHERE admin_auth.aa_id = admin.aa_id ORDER BY `$sortLine` $sort   limit $start,$sum";
        $where = new Where();
        $count = $sql->selectLine('admin_auth',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('admin_auth',array('aa_id','aa_nick','aa_remark'),$where);
        return array('count'=>$count['count'],'data'=>$data);
//        $sql = new Sql;
//        if(empty($sortLine)){$sortLine = "aa_id"; }
//        $sqls = "SELECT `aa_id`, `aa_nick` ,`aa_remark` FROM `admin_auth` ORDER BY `$sortLine` $sort LIMIT  $start ,$sum; ";
//        return $sql->queryData($sqls);
}

    //权限列表
    public function getAuthList(){
        $sql = new Sql;
        $sqls = "SELECT `al_id`, `al_nick` ,`al_remark` FROM `auth_list` ";
        return $sql->queryData($sqls);
    }

    /**
     * 查询权限组详细
     *
     * @param $aaId int 操作者ID
     *
     * @return array
     */
    public function queryAdminAuth($aaId){
        $sql = new Sql;
        $where = new Where('aa_id',$aaId,'int');
        $row = $sql->selectLine('admin_auth',array('aa_id', 'aa_nick','aa_remark'),$where);
        $data = $sql->selectData('admin_auth_list','al_id',$where);
        //$row = $sql->queryLine("SELECT `aa_id`, `aa_nick`,`aa_remark` FROM `admin_auth` WHERE `aa_id` = $aa_id");
        //$data = $sql->queryData("SELECT `al_id` FROM `admin_authList` WHERE `aa_id` = $aa_id;");
        //$row = null;
        foreach((array)$data as $value){
            $row['auth'][] = $value['al_id'];
        }
        return $row;
    }

   //增加日志
    private function addAdminLog($aId,$key,$content){
        $sql = new Sql();
        return $sql->insert('admin_log',array('a_id'=>'int','alog_key','alog_content'),array($aId,$key,$content));
    }

    /**
     * 增加权限组
     *
     * @param $name string 权限组名
     *
     * @param $remark string 权限组备注
     *
     * @param $auth array 权限ID集合
     *
     * @param $aId int 操作者ID
     *
     * @param $meg string 系统日志详细
     *
     * @return boolean 成功返回true,失败返回false
     */
    public  function addAdminAuth($name,$remark,$auth,$aId,$meg){
        $sql = new Sql;
        $aaId = $sql->insert('admin_auth',array('aa_nick','aa_remark'),array($name,$remark));
        $data= array();
        foreach((array)$auth as $value){
            array_push($data,array($aaId,$value));
        }
        if($sql->insert('admin_auth_list',array('aa_id'=>'int','al_id'=>'int'),$data)){
            return $this->addAdminLog($aId,'增加权限组',$meg);
        }
        return false;
       // $sqls = "INSERT INTO `admin_auth`(`aa_nick` ,`aa_remark`) VALUES ('$name','$remark') ;";
        //$aa_id = $sql->executeid($sqls);
        //$row = $sql->queryLine("SELECT `aa_id` FROM admin_auth WHERE `aa_nick` = '$name';");
//        $str = "";
//        foreach((array)$auth as $value){
//            /$str .= "(".$aa_id.",".$value.") ,";
//        }
//        if($sql->execute("INSERT INTO `admin_authList` (`aa_id`,`al_id`) VALUES".substr($str,0,strlen($str) -1))){
//            return true;
//        }
//        return false;
    }

    /**
     * 更新权限组
     *
     * @param $aaId string 权限组ID
     *
     * @param $name string 权限组名
     *
     * @param $remark string 权限组备注
     *
     * @param $auth array 权限ID集合
     *
     * @param $aId int 操作者ID
     *
     * @param $meg string 系统日志详细
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function updateAdminAuth($aaId ,$name,$remark,$auth,$aId,$meg){
        $sql = new Sql;
        if($aaId ==1 || $aaId ==2){ return false; }
        $where = new Where('aa_id',$aaId);
        $values = array();
        $b = true;
        if($name !=null){
            array_push($values,array('columnName'=>'aa_nick','value'=>$name,'type'=>'string'));
        }
        if($remark !==null){
            array_push($values,array('columnName'=>'aa_remark','value'=>$remark,'type'=>'string'));
        }
        if(!empty($values)){
            $b = $sql->update('admin_auth',$where,$values);
        }
        if(is_array($auth)){
            if($sql->delete('admin_auth_list',$where) && !empty($auth)){
                $data = array();
                foreach((array)$auth as $value){
                    array_push($data,array($aaId,$value));
                }
                $b =  $sql->insert('admin_auth_list',array('aa_id'=>'int','al_id'=>'int'),$data);
            }
        }
        if($b){
            $this->addAdminLog($aId,'更新了权限',$meg);
        }
        return $b;
    }

    /**
     * 删除权限组
     *
     * @param $dId int 需要删除的权限组ID
     *
     * @param $aId int 操作者ID
     *
     * @param $meg string 系统日志详细
     *
     * @return boolean 成功返回true,失败返回false
    */
    public function deleteAdminAuth($dId,$aId,$meg){
        $sql = new Sql;
        if($dId ==1 || $dId ==2){ return false; }
        $where = new Where('aa_id',$dId);
        if($sql->delete('admin_auth_list',$where)){
            if($sql->update('admin',$where,array('columnName'=>'aa_id','type'=>'int','value'=>2))){
                if($sql->delete('admin_auth',$where)){
                    return $this->addAdminLog($aId,'删除权限组',$meg);
                }
            }
        }
        return false;
    }

    /**
     * 更新管理员头像
     *
     * @param $id int 管理员ID
     *
     * @param $path string 图片路径
     *
     * @return boolean 成功返回true,失败返回false
     */
    public function updateAdminImg($id,$path){
        $sql = new Sql;
        return $sql->update('admin',new Where('a_id',$id),array('columnName'=>'a_img','value'=>$path));
    }

}

