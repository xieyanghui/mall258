<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/12/30
 * Time: 21:39
 */
//权限辨认类
class AdminAuth{
    /**
     *根据管理员权限ID,和模块权限参数判断该管理员是否有这个权限;
     *
     * @param $aaID int 管理员权限ID
     *
     * @param $alKey string 权限简称
     *
     * @return boolean 如果有返回TRUE,否则FALSE
     *
     */
    static public function inAdminAuth($aaID,$alKey){
        $sql = new Sql;
        if($aaID == 1){return true;}
        if($aaID == 2){return false;}
        $where = new Where('aa_id',$aaID,'int');
        $where->setWhere('al_key',$alKey);
        $row = $sql->selectLine('admin_auth_v',"al_key",$where);
        if(!empty($row['al_key'])){
            return true;
        }else{
            return false;
        }
    }

}