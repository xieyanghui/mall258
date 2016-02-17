<?php
/**
 * Created by PhpStorm.
 * User: PC-SHITING
 * Date: 2016/2/17
 * Time: 23:02
 */
class SearchPage{
    private $columnName =array();
    private $get = array();
    private $page = 0;   //当前第几页
    private $pageRow = 10; //每页几行
    private $search = "";  //搜索关键字
    private $sort = null;  //排序方法
    private $sortLine = null;//排序的列
    private $searchLine = null;//搜索关键列
    public function __construct($columnName,$get)
    {
        $this->columnName = $columnName;
        $this->get = $get;
        if(!empty($get['page'])){
            $this->page = (int)$_GET['page'];
        }
        if(!empty($get['sort'])){
            $this->sort = $get['sort'];
            $this->sortLine = $this->tropeKey($get['sortLine']);
        }
        if(!empty($get['pageRow'])){
            $this->pageRow = (int)$get['pageRow'];
        }
        if(!empty($get['search'])){
            $this->search = $get['search'];
            $this->searchLine = $this->tropeKey($get['searchLine']);
        }
    }
    private function tropeKey($column){
        foreach($this->columnName as $key=>$value){
            if($column == $value){
                return $key;
            }
        }
    }
    public function isSearch(){
        if($this->search != null){
            return true;
        }else{
            return false;
        }

    }
    public function getParam(){
        $params = array();
        if($this->search != null){
            $aa = array('searchLine'=>$this->searchLine,'key'=>$this->search);
            $params[]=&$aa;
        }
        $p = $this->page*$this->pageRow;
        $params[] = &$p;
        $params[] = &$this->pageRow;
        $params[] = &$this->sortLine;
        $params[] = &$this->sort;
        return $params;
    }
    public function getPages($count){
        $pages['page'] = $this->page;//当前第几页
        $pages['pageRow'] = $this->pageRow;  //每页几行
        $pages['count'] = (int)$count;  //总行数
        $pages['pages'] =  5; //需要显示的页数
        $pages['start'] = 0; //开始显示的页数
        if($this->search != null){
            $pages['search']  = array('searchLine'=>$this->searchLine,'key'=>$this->search);
        }else{
            $pages['search'] = "";
        }
        $pages['countPages'] = ceil($count/$this->pageRow);
        if($pages['countPages'] < $pages['pages']){  //当总页数小于显示的页数
            $pages['pages'] = $pages['countPages'];
        }elseif($pages['countPages'] -$this->page < ceil($pages['pages']/2) ){
            $pages['start'] = $pages['countPages'] -$pages['pages'];
        }elseif(($this->page+1) >= ceil($pages['pages']/2) ) {
            $pages['start'] = ($this->page+1) - ceil($pages['pages']/2);
        }
        return $pages;
    }
}


