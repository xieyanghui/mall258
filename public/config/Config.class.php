<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2015/11/14
 * Time: 16:37
 */
class Config{



    //调试模式
    const DEBUG = true;
    const Debug = true;

    //管理员默认头像
    const ADMIN_HEAD_DEFAULT ="//7xsiy9.com2.z0.glb.clouddn.com/mall258_guest.png";

    //默认商品图片
    const GOODS_IMG_DEFAULT ="//7xsiy9.com2.z0.glb.clouddn.com/goods_default.jpg";

    //七牛配置
    const QINIU_SK = "Zao6vAyCTxM1QKAmVv3VSr1SoUdXi-4GQPFs5WCp";
    const QINIU_AK = "cn1tTSjMErVdNipl38zvmL9ZrAFqzBzU2qNoQxz6";
    const QINIU_SCOPE = "mall258";
    const QINIU_URL = "//7xsiy4.com1.z0.glb.clouddn.com";

    //后台主目录
    const ADMIN_DIR = "/admin";
//    后台目录树
    static $tree = array(
        'control'=>array(
            'menuSystem'=>array(
                'adminInfo',
                'adminAU',
                'adminAuthAU',
                'systemLog',
                'adminAuth',
                'adminPwdImg',
                'adminImgSpace'
            ),
            'menuService',
            'menuReport',
            'menuOrder',
            'menuGoods'=>array(
                'goodsType',
                'goodsInfo',
                'goodsRecommend',
                'goodsAU',
                'goodsPriceAU',
                'goodsTextAU',
                'goodsTypeAU',
                'indexModel'
            )
        )
    );

    static $model_filter=array(
        'Admin.a_img'=>array(
            'null'=>'//7xsiy9.com2.z0.glb.clouddn.com/mall258_guest.png'
        )
    );
}