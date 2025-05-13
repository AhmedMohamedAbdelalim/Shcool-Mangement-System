<?php

      $file= fopen("amir.txt","a+");
        
         $txt=$_POST["id"];
       fwrite($file,$txt);
        fclose($file);


?>