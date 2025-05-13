<?php

include 'course.php';
   class coursedetails extends course
  {

     public $price;
     public $num_of_student;
     public $num_of_teacher;
     public $star_teaching;
         
     function __construct($price,$num_of_student,$num_of_teacher,$star_teaching)
     {
         $this->price=$price;
         $this->num_of_student=$num_of_student;
         $this->num_of_teacher=$num_of_teacher;
         $this->star_teaching=$star_teaching;
     }
   
     public static function change_price($Name_course,$New_Name_course,$New_Id,$New_price,$year_Nunmber)
      {
            if(intval($year_Nunmber)==1)
            {
              $re=coursedetails::open_for_reading_course($Name_course,"course.txt","Course_Table.txt");
              if($re!="")
              {
               coursedetails::Deleate("course.txt",$Name_course);
               if($New_Name_course!="")
               {
               coursedetails::open_for_write_course("course.txt",$New_Name_course,$New_Id,$New_price);
               }
               header('location:change_Coursedetails.html'); 
              }
              else
              {
              
                echo "NOT Found Course";
               
              }
            }
           else
           {
            if(intval($year_Nunmber)==2)
            {
              $re=coursedetails::open_for_reading_course($Name_course,"Course_2.txt","Course_2_detalis.txt");
             //
             if($re!="")
            {
             $fii=fopen("Course_2.txt","a+");
             while(!feof($fii))
             {
               $cheek=fgets($fii);
               $arr=explode("~",$cheek); 
               echo $arr[0];
               if($arr[0]==$Name_course)
               {
                   $rep=file_get_contents("C://xampp//htdocs//scool2//Course_2.txt");
                   $rep=str_replace($cheek,"",$rep);
                   file_put_contents("C://xampp//htdocs//scool2//Course_2.txt",$rep);
               }

               
             
             }
             fclose($fii);
            }
            else
            {
              echo "NOT Found Course";
               
            }
          }
        }
             //
             if($New_Name_course!="")
             {
              coursedetails::open_for_write_course("Course_2.txt",$New_Name_course,$New_Id,$New_price);
             }
             header('location:change_Coursedetails.html'); 
            
             
            

               
      }
      function change_number_teacher($x)
      {
                if($x>=0)
                {
                   $this->num_of_teacher=$x;
                }
      }
      function change_numeber_student($x)
      {
        if($x>=0)
        {
           $this->star_teaching=$star_teaching=$x;
        }
      }
     function see_coursedetails()
     {
             
       header('location:viewcourse1.html'); 
        
     }

    public static function open_for_write_course($course_Name,$writing,$writing2,$writing3)
     {
                
      $file=fopen($course_Name,"a+");
      $txt=$writing;
      fwrite($file,$txt);
      $txt=$writing2;
      fwrite($file,"~".$txt);
      $txt=$writing3;
      fwrite($file,"~".$txt."\r\n");
      fclose( $file);
     }
     public static function Deleate($File_Name,$the_course_Name)
     {
                  $fii=fopen($File_Name,"a+");
                  while(!feof($fii))
                  {
                    $cheek=fgets($fii);
                    $arr=explode("~",$cheek); 
                    if($arr[0]==$the_course_Name)
                    {
                        $rep=file_get_contents("C://xampp//htdocs//scool2//course.txt");
                        $rep=str_replace($cheek,"",$rep);
                        file_put_contents("C://xampp//htdocs//scool2//course.txt",$rep);
                    }
                  
                  }
                  fclose($fii);
                  
     }

     public static function open_for_reading_course($course_Name,$filename,$filename2)
     {
                  
      $val=$course_Name;
            
      $file=fopen($filename,"a+");
      while(!feof($file))
      {
         
             $cheek=fgets($file);
             $arr=explode("~",$cheek);
              
             if($arr[0]==$val)
             {
             
                  $fi=fopen($filename2,"a+");
                 while(!feof($fi))
                {
                  $cheek1=fgets($fi);
                  $arr1=explode("~",$cheek1);
                  if($arr1[0]==$val)
                  {
                    return $cheek1;
                    
                  }
               }
                  fclose($fi);
             }
               
             
      }
      
      fclose($file);

     }

    
  }
   
?>