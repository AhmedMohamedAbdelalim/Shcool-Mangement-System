<?php
class user
{
    public $name;
    public $phone;
    public $nationality;
    public $adrees;

    function __construct($name,$phone,$nationality,$adrees)
    {
         $this->name=$name;
         $this->phone=$phone;
         $this->nationality=$nationality;
         $this->adrees=$adrees;
    }
    public static function know_The_Level()
    {
        
        session_start();
        echo $_SESSION["id"]; 
        echo $_SESSION["password"];
        
    }
}

 

?>
