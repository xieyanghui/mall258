<?php

class Filter
{
    /**
     * 过滤类;
     *
     * @param boolean $wailian 防止外链，默认不执行
     *
     * @oaram boolean $zhijie 直接访问，默认不执行
     */
    public function __construct($wailian = false, $zhijie = false)
    {
        if ($wailian) {
            if (!empty($_SERVER['HTTP_REFERER'])) {
                if(!preg_match("/^http[s]?:\/\/{$_SERVER['HTTP_HOST']}/",$_SERVER['HTTP_REFERER'])){
                    header("Content-Type:text/html;charset=utf-8");
                    exit('请在本网站浏览本内容'.$_SERVER['HTTP_HOST']);
                }
            }
        }
        if ($zhijie) {
            if (!empty($_SERVER['HTTP_REFERER'])){
                exit("此文件不允许直接访问");
            }
        }
    }
}