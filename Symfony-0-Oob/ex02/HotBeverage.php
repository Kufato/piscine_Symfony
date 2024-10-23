<?php
class HotBeverage
{
    protected $name;
    protected $price;
    protected $resistence;

    protected function __construct($name, $price, $resistence)
    {
        $this->name = $name;
        $this->price = $price;
        $this->resistence = $resistence;
    };


}
?>