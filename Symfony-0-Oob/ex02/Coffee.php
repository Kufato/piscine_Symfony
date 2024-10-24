<?php
require_once 'HotBeverage.php';

class Coffee extends HotBeverage
{
    private $description;
    private $comment;

    // Constructor
    public function __construct($price, $resistance, $description, $comment) {
        parent::__construct("Coffee", $price, $resistance);
        $this->description = $description;
        $this->comment = $comment;
    }

    // Getters
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getComment()
    {
        return $this->comment;
    }
}
?>