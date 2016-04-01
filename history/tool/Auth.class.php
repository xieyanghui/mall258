<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/12/30
 * Time: 21:39
 */
require_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');

//权限辨认类
class Auth{

    /**
     *根据管理员ID,和模块权限参数判断该管理员是否有这个权限;
     *
     * @param $adminID int 管理员ID
     *
     * @param $alKey string 权限简称
     *
     * @return 如果有返回TRUE,否则FALSE
     *
     */
    static public function inAdmin($adminID,$alKey){
        $sql = new Sql;
        $aaID = $sql->queryLine("SELECT `aa_id` FROM `adminInfo` WHERE `a_id` =$adminID");
        $aaID = $aaID['aa_id'] ;
        if($aaID == 1){return true;}
        $row = $sql->queryLine("SELECT `aal_id` FROM `adminAuthList` WHERE `aa_id` =$aaID AND `al_id` =(SELECT `al_id` FROM `authList` WHERE `al_key` = $alKey)");
        if(!empty($row['aal_id'])){
            return true;
        }else{
            return false;
        }

    }

    /**
     *根据管理员权限ID,和模块权限参数判断该管理员是否有这个权限;
     *
     * @param $aaID int 管理员权限ID
     *
     * @param $alKey string 权限简称
     *
     * @return 如果有返回TRUE,否则FALSE
     *
     */
    static public function inAdminAuth($aaID,$alKey){
        $sql = new Sql;
        if($aaID == 1){return true;}
        $row = $sql->queryLine("SELECT `aal_id` FROM `adminAuthList` WHERE `aa_id` =$aaID AND `al_id` =(SELECT `al_id` FROM `authList` WHERE `al_key` = $alKey)");
        if(!empty($row['aal_id'])){
            return true;
        }else{
            return false;
        }
    }
}