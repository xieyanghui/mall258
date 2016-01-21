<?php

class c1
{
    public function c11($a)
    {
        echo $a . "c111";
    }

    public function c12()
    {

        $c2 = new c2;
        $c2->c21('c11', $this);


    }
}


class c2
{
    public function c21($a, $obj)
    {
        $obj->c11($a);
    }
}

$c1 = new c1;
$c1->c12();

?>