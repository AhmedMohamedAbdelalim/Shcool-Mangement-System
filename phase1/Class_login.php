<?php

    abstract class log_In
   {
     
        public static function login()
        {
            $file=fopen("loginadmin.txt","r");
            $x=0;
            while(!feof($file))
            {
                $cheek=fgets($file);
                $arr=explode("~",$cheek);
                     
                 $arr[1]=intval($arr[1]);
                 $_POST["id"]=intval($_POST["id"]);
                if($arr[0]==$_POST["password"])
                {
                 
                 if($arr[1]==$_POST["id"])
                 {
                    //if it admin
                    session_start();
                    $_SESSION["id"]=$arr[1];
                    $_SESSION["password"]=$arr[0];
                    header('location:Admin_Gui_interface.html');
                  //header('location:Main.php');
                   $x=1;
                 }
              }
            }
            fclose($file);
            if($x==0)
            {
              $file=fopen("loginuser.txt","r");
              $x=0;
              while(!feof($file))
              {
                  $cheek=fgets($file);
                  $arr=explode("~",$cheek);
                       
                   $arr[1]=intval($arr[1]);
                   $_POST["id"]=intval($_POST["id"]);
                  if($arr[0]==$_POST["password"])
                  {
                   
                   if($arr[1]==$_POST["id"])
                   {
                      //if it student
                      session_start();
                      $_SESSION["id"]=$arr[1];
                      $_SESSION["password"]=$arr[0];
                     header('location:student_view.html');
                     $x=1;
                   }
                }
              }
              fclose($file);
            }
            if($x==0)
            {
      
              echo"Invalid login";
            }
        }

        public static function returning_Student_level()
        {
          $z=0;
          session_start();
            $file=fopen("student_level_1_login.txt","r");
            while(!feof($file))
            {
              
              $cheek=fgets($file);
              $ar=explode("~",$cheek);
              if($ar[0]== $_SESSION["password"])
              {
                  if(intval($ar[1]==$_SESSION["id"]))
                  { 
                      return 1;
                    $z=1;
                  }
              }

            }
            fclose($file);
            if($z==0)
            {
              $file=fopen("student_level_2_login.txt","r");
              while(!feof($file))
              {
                
                $cheek=fgets($file);
                $ar=explode("~",$cheek);
                if($ar[0]== $_SESSION["password"])
                {
                    if(intval($ar[1]==$_SESSION["id"]))
                    {
                     
                     return 2;
                      $z=1;
                    }
                }
               
              }
              fclose($file);
             if($z==0)
              {
                return "not Found";
              }
             
            }
        }
    
        public static function Change_password($the_file_Name,$the_Id,$the_password,$the_NEW_Password)
        {
           $fii=fopen($the_file_Name,"a+");
          while(!feof($fii))
          {
            $cheek=fgets($fii);
            $arr=explode("~",$cheek); 
           
            if($arr[0]==$the_Id&&$arr[1]==$the_password)
            {
                $rep=file_get_contents("C://xampp//htdocs//scool2//student_level_1_login.txt");
                $rep=str_replace($arr[1],"$the_NEW_Password\r\n",$rep);
                file_put_contents("C://xampp//htdocs//scool2//student_level_1_login.txt",$rep);
            }

          }
          fclose($fii);
          //
          $fii=fopen($the_file_Name,"a+");
          while(!feof($fii))
          {
            $cheek=fgets($fii);
            $arr=explode("~",$cheek); 
           
            if($arr[0]==$the_Id&&$arr[1]==$the_password)
            {
                $rep=file_get_contents("C://xampp//htdocs//scool2//student_level_2_login.txt");
                $rep=str_replace($arr[1],"$the_NEW_Password\r\n",$rep);
                file_put_contents("C://xampp//htdocs//scool2//student_level_2_login.txt",$rep);
            }

          }
          fclose($fii);
          //
          $fii=fopen("loginuser.txt","a+");
          while(!feof($fii))
          {
            $cheek=fgets($fii);
            $arr=explode("~",$cheek); 
           
            if($arr[0]==$the_Id&&$arr[1]==$the_password)
            {
                $rep=file_get_contents("C://xampp//htdocs//scool2//loginuser.txt");
                $rep=str_replace($arr[1],"$the_NEW_Password\r\n",$rep);
                file_put_contents("C://xampp//htdocs//scool2//loginuser.txt",$rep);
            }

          }
          fclose($fii);

        }
        
        public static function logout()
        {
          
          // remove all session variables
          session_unset();
          
          // destroy the session
          session_destroy();
          
        }
       
   }

?>