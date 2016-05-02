<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/4/26
 * Time: 18:26
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");

class ModelException extends Exception{
    public function __construct($message, $code = 0)
    {
        parent::__construct($message, $code);
    }
    public function __toString()
    {
        $arr = $this->getTrace()[0];
        return __CLASS__ . ": [{$this->code}]: {$this->message}  文件 :{$arr['file']}  {$arr['line']}行\n";
    }
}