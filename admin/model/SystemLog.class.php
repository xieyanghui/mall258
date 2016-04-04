<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/27
 * Time: 21:31
 */
include_once($_SERVER['DOCUMENT_ROOT'] . "/public/autoload.php");
class SystemLog{
    public static function addSystemLog($aId,$key,$content){
        $sql = new Sql();
        return $sql->insert('system_log',array('a_id'=>'int','sl_key','sl_content'),array($aId,$key,$content));
    }
    /**
     * 查询系统日志
     *
     * @param $name array 数组关键字 searchLine列名,key关键字
     *
     * @param $start int 从第几行开始
     *
     * @param $sum int 需要多少行
     *
     * @param $sortLine string 排序列名,默认date
     *
     * @param $sort string 排序方式,默认asc
     *
     * @return array 关联数组count总行数,data查询到的数据
     */
    public function searchSystemLog($name,$start,$sum,$sortLine = "sl_date", $sort = "asc" ){
        $sql = new Sql;
        $where =new Where($name['searchLine'],$name['key'],'string','AND','LIKE');
        if(empty($sortLine)){$sortLine = "sl_date";}
        if(empty($sort)){$sort = "asc";}
        $count = $sql->selectLine('system_log_v',"COUNT(*) as count ",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('system_log_v',array('sl_key','sl_content','a_nick','sl_date'),$where);
        return array('count'=>$count['count'],'data'=>$data);

    }

    /**
     * 所有系统日志
     *
     * @param $start int 从第几行开始
     *
     * @param $sum int 需要多少行
     *
     * @param $sortLine string 排序列名,默认a_id
     *
     * @param $sort string 排序方式,默认asc
     *
     * @return array 关联数组count总行数,data查询到的数据
     */
    public function getSystemLog($start =0, $sum = 10 ,$sortLine = "sl_date", $sort = "asc"){
        $sql = new Sql;
        $where = new Where();
        if(empty($sortLine)){$sortLine = "sl_date";}
        if(empty($sort)){$sort = "asc";}
        $count = $sql->selectLine('system_log_v',"COUNT(*) as count",$where);
        $where->setWhereEnd("ORDER BY `$sortLine` $sort   limit $start,$sum");
        $data = $sql->selectData('system_log_v',array('sl_key','sl_content','a_nick','sl_date'),$where);
        return array('count'=>$count['count'],'data'=>$data);
    }
}