<?php
/**
 * Created by PhpStorm.
 * User: xiehui
 * Date: 16-4-8
 * Time: 上午2:54
 */
 abstract class Model implements Iterator{
    protected $model = array(); //数组


    abstract public function save();
    abstract public function set();
    abstract public function read();
    abstract public function remove();
    abstract public function get();

    public function rewind() { reset($this->model); }

    public function current() { return current($this->model); }

    public function key() { return key($this->model); }

    public function next() { return next($this->model); }

    public function valid() { return ( $this->current() !== false ); }
 }