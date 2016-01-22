<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/12/30
 * Time: 21:39
 */
include_once($_SERVER['DOCUMENT_ROOT'] . '/tool/autoload.php');
class Auth{
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