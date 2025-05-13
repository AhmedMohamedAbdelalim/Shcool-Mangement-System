<?php

   class course
   {
     
       public $course_code;
       public $course_name;
      
     function __construct($course_code,$course_name)
     {
         $this->course_code=$course_code;
         $this->course_name=$course_name;
     }
  
     public static function Show_Course_Table($File_number)
     {
          $file_Name = array("Course_Table.txt", "course_level_2.txt");
           if(intval($File_number)<=count($file_Name))
             {
              $File_number=intval($File_number)-1;
             
               $File_open=$file_Name [intval($File_number)];
               echo "this".intval($File_number);
               $file=fopen($File_open,"r");
               while(!feof($file))
               {
                 $row=fgets($file);
                 echo $row;
               }
               fclose($file);
              }      
     }

 
   }

?>