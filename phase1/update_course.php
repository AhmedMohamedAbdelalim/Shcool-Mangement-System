<?php
   include_once 'coursedetail.php';
  
if($_POST["name1"]!="")
{
   
     echo  $_POST["name1"];
    coursedetails::change_price($_POST["name1"],$_POST["name2"],$_POST["id1"],$_POST["price1"],$_POST["year"]);
}

?>