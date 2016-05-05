<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-28
 * Time: 上午5:45
 */
class Auth{
    /**
     *根据管理员ID,和模块权限参数判断该管理员是否有这个权限;
     *
     * @param $adminID int 管理员ID
     *
     * @param $alKey string 权限简称
     *
     * @return boolean 如果有返回TRUE,否则FALSE
     *
     */
    static public function inAdmin($aID,$alKey){
        $a = new Admin();
        $a =$a->query(new Where('a_id',$aID),'aa_id')->toArray()[0];
        if($a['aa_id'] === 1){return true;}//管理员权限ID为1的是超级管理员
        if($a['aa_id']  === 2){return false;}//管理员权限ID为2的是无权限管理员
        $al = new AuthList();
        $al->query(new Where('al_key',$alKey),'al_id',array('AdminAuthList'=>array('where'=>new Where('aa_id',$a['aa_id']))));
        if($al->get('AdminAuthList')->length() >0){
            return true;
        }else{
            return false;
        }
    }
}