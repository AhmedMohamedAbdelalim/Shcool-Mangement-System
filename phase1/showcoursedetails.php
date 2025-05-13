<?php
              
         include_once 'coursedetail.php';
    if($_POST["name"]!="")
    {
       if(intval($_POST["numberofyear"])==1)
       {
                  $Fil_Na="course.txt";
                  $fil_deta="coursedetails.txt";
       }
       if(intval($_POST["numberofyear"])==2)
       {
        $Fil_Na="Course_2.txt";
        $fil_deta="Course_2_detalis.txt";
       }
       if( $Fil_Na!="")
       {
        $retur= coursedetails::open_for_reading_course($_POST["name"],$Fil_Na, $fil_deta);
         echo $retur;
       }
         
    }
        
?>