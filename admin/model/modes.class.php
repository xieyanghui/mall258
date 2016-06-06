<?php

/**
 * Created by PhpStorm.
 * User: 谢扬辉
 * Date: 2016/1/26
 * Time: 0:59
 */
interface Modes
{
    /**
     * 判断该字段是否为数字类型
     *
     * @param String $columnName 前来判断的字段名
     *
     * @return boolean 是数字返回true，否则false
     */
    function isNumber($columnName);

    /**
     * 判断该字段是否为数字类型
     *
     * @param String $columnName 前来判断的字段名
     *
     * @return boolean 是数字返回true，否则false
     */
    function modify();
    /**
     * 判断该字段是否为数字类型
     *
     * @param String $columnName 前来判断的字段名
     *
     * @return boolean 是数字返回true，否则false
     */
    function delete();

    /**
     * 判断该字段是否为数字类型
     *
     * @param String $columnName 前来判断的字段名
     *
     * @return boolean 是数字返回true，否则false
     */
    function save();

    function query();

    function toJson();
}