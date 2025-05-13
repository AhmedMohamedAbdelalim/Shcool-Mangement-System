<?php
  
    include_once 'Class_login.php';
    include_once 'course.php';

    
        $return=log_In::returning_Student_level();
        intval($return);
        echo $return;
       
          course::Show_Course_Table( intval($return));
        
      
?>