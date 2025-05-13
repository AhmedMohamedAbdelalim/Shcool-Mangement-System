<?php
       
        include_once 'Class_login.php';
        $Val=log_In::returning_Student_level();
         if(intval($Val)==1)
          {
              $the_file="student_level_1_login.txt"; echo $Val; echo $the_file ;
          }
          if(intval($Val)==2)
          {
              $the_file="student_level_2_login.txt"; echo $Val; echo $the_file ;
                          
          }
         
          if(intval($Val)!=0 && $the_file!="")
          {
          session_start();
          $_SESSION["id"];
        //  echo $_SESSION["id"];
         // echo  $_SESSION["password"];
         // echo $_POST["newPassword"];
          log_In::Change_password($the_file,$_SESSION["password"], $_SESSION["id"],$_POST["newPassword"]);
         }  

?>