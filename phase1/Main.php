

<?php
include 'employee.php';
include 'coursedetail.php';

   if(($_POST["name"]!="")&&$_POST["id"]!="")
   {
          if(intval($_POST["yearn"])==1)
          {
                $File_Na="course.txt";
          }   
          if(intval($_POST["yearn"])==2)
          {
                $File_Na="Course_2.txt";
          }
            if($File_Na!="")
            {
            coursedetails::open_for_write_course($File_Na,$_POST["name"],$_POST["id"],$_POST["Price"]);
            }
   }
     header('location:view.html');
?>

