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
    private $sort = "";  //排序方法
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
            $this->searchLine = $get['searchLine'];
        }
    }
    private function tropeKey($column){
        foreach($this->columnName as $key=>$value){
            if($column == $value){
                return $key;
            }
        }
        return '';
    }
    private function tropeColumn($Line){
        foreach($this->columnName as $key=>$value){
            if($Line == $key){
                return $value;
            }
        }
        return "";
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
        $page['page'] = $this->page;//当前第几页
        $page['pageRow'] = $this->pageRow;  //每页几行
        $page['count'] = (int)$count;  //总行数
        $page['pages'] =  5; //需要显示的页数
        $page['start'] = 0; //开始显示的页数
        $page['countPages'] = ceil($count/$this->pageRow);//总页面数
        $page['search'] = array('searchLine'=>"",'key'=>"");// 搜索
        $page['sort'] = array('sortLine'=>"",'key'=>""); //排序
        if($this->search != null){
            $page['search']  = array('searchLine'=>$this->searchLine,'key'=>$this->search);
        }
        if($this->sort != null){
            $page['sort']  = array('sortLine'=>$this->tropeColumn($this->sortLine),'key'=>$this->sort);
        }
        if($page['countPages'] < $page['pages']){  //当总页数小于显示的页数
            $page['pages'] = $page['countPages'];
        }elseif($page['countPages'] -$this->page < ceil($page['pages']/2) ){
            $page['start'] = $page['countPages'] -$page['pages'];
        }elseif(($this->page+1) >= ceil($page['pages']/2) ) {
            $page['start'] = ($this->page+1) - ceil($page['pages']/2);
        }
        return $page;
    }
    public function getSearchLine(){
        if(!empty($this->searchLine)){
            return $this->searchLine;
        }else{
            $v = "";
            foreach($this->columnName as $key =>$value){
                $v =  $key;
                break;
            }
            return $v;
        }
    }
}


