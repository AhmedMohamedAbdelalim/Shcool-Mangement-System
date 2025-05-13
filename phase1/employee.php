<?php
include 'user.php';
class employee extends user
{
    public $password;
    public $salary;
    public $data_of_br;
    public $work_of_hours;
    
    function __construct($name,$phone,$nationality,$adrees,$password,$salary,$data_of_br,$work_of_hours)
    {
        
        $this->name=$name;
        $this->phone=$phone;
        $this->nationality=$nationality;
        $this->adrees=$adrees;
       
         $this->password=$password;
         $this->salary=$salary;
         $this->data_of_br=$data_of_br;
         $this->$work_of_hours=$work_of_hours;
    }
    
}
 

?>