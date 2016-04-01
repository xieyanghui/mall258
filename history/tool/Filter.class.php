<?php

class Filter
{
    /*
     * 参数：$wailian 防止外链，默认不执行
     * 参数：$zhijie 直接访问，默认不执行
     * */
    public function __construct($wailian = false, $zhijie = false)
    {
        if ($wailian) {
            if (isset($_SERVER['HTTP_REFERER'])) {
                $url_array = explode('http://', $_SERVER['HTTP_REFERER']);
                $url = explode('/', $url_array[1]);
                if ($_SERVER['SERVER_NAME'] != $url[0]) {
                    header("Content-Type:text/html;charset=utf-8");
                    exit('您来错地方啦');
                }
            }
        }
        if ($zhijie) {
            header("Content-Type:text/html;charset=utf-8");
            if (!zhijie) {
                exit("哈哈");
            }
        }
    }
}

?>