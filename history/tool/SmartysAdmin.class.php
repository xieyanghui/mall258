<?
require_once($_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/Smarty.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] . "/plugin/Mobile_Detect.php");
date_default_timezone_set("Asia/Shanghai");

//$local为设置自己的模板路径
class SmartysAdmin extends Smarty
{
    function __construct($local = "")
    {
        parent::__construct();
        $this->config_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/configs/';

        //判断设备模板
        if (empty($_SESSION['device'])) {
            $detect = new Mobile_Detect;
            $_SESSION['device'] = $detect->isMobile() ? "mobile" : "pc";
        }
        if ($_SESSION['device'] == 'pc') {
            $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/admin/htmPc/';
        } elseif ($_SESSION['device'] == 'mobile') {
            $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . '/admin/htmMobile/';
        }

        //是sea云端 ，还是本地
        if (strstr($_SERVER['HTTP_HOST'], "sinaapp")) {
            $this->compile_dir = 'saemc://smarty/templates_c/';
            $this->cache_dir = 'saemc://smarty/cache/';
        } else {
            $this->compile_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/templates_c/';
            $this->cache_dir = $_SERVER['DOCUMENT_ROOT'] . '/plugin/smarty/cache/';
        }


        if ($local != "") {
            $this->template_dir = $_SERVER['DOCUMENT_ROOT'] . $local;
        }
        $this->compile_locking = false;
        $this->left_delimiter = '<{';
        $this->right_delimiter = '}>';
        $this->assign("DOCUMENT_ROOT", $_SERVER['DOCUMENT_ROOT']);
        $this->assign("HTTP_HOST", 'http://' . $_SERVER['HTTP_HOST']);
    }
}

?>