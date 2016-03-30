<?php
$xx = array("aaaaaa","11","qqqq");
foreach ($xx as &$v){
    if($v == "11"){
        //array$v;
    }
}
echo count($xx).'~~~~~~~~';
foreach ($xx as $bv){
    echo $bv."------";
}
echo ',,,,'.count($xx);


