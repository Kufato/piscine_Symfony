<?php
class HotBeverage
{
    protected   $nom;
    protected   $price;
    protected   $resistance;

    // Constructor
    protected function __construct($nom, $price, $resistance)
    {
        $this->nom = $nom;
        $this->price = $price;
        $this->resistance = $resistance;
    }

    // Getters
    public function getNom()
    {
        return $this->nom;
    }
    
    public function getPrice()
    {
        return $this->price;
    }
    
    public function getResistance()
    {
        return $this->resistance;
    }
}
?>