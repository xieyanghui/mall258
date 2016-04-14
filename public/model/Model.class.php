<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-8
 * Time: 上午2:54
 */
require_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
abstract class Model implements Iterator{
    protected $model = array(); //数组
    protected $columnName = array();
    private $sql = null;
    abstract public function save();
    abstract public function read($arr);
    abstract public function remove();
    abstract public function query(Where $where,$columnName ='*');

    //数据库类连接
    protected function getSql(){
        if($this->sql === null){
            $this->sql = new Sql;
        }
        return $this->sql;
    }

    protected function columnType($columnName){
        if(preg_match("/_id$/",$columnName)){
        return 'int';
        }
        foreach ($this->columnName as $key=>$value){
            if(is_int($key) && $columnName === $value){
                return 'string';
            }elseif($columnName ===$key){
                return $value;
            }
        }
    }

    public function length(){
        return count($this->model);
    }

    public function set($key,$value){
        $this->model[key($this->model)][$key] = $value;
    }

    public function get($key){
        $arr = current($this->model);
        return $arr[$key];
    }

    public function rewind() { reset($this->model); }

    public function current() { return current($this->model); }

    public function key() { return key($this->model); }

    public function next() { return next($this->model); }

    public function valid() { return ( $this->current() !== false ); }
}