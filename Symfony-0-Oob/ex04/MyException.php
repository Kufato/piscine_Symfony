<?php
class MyException
{
    public function __construct($message)
    {
        throw new Exception($message);
    }
}
?>