<?php
if( $_FILES['file']['name'] != "" )
{
   copy( $_FILES['file']['tmp_name'], "/var/www/".$_FILES['file']['name'] ) or 
         die( "Could not copy file!");
   if(isset($_GET["t"]) && !empty($_GET["t"]))
     $result = exec('python parser.py -f '.$_FILES['file']['name'].' -l '.$_GET["t"]);
   else
     $result = exec('python parser.py -f '.$_FILES['file']['name']);
   $path_parts = pathinfo($_FILES['file']['name']);

   echo $path_parts['filename'].'o.mp4';

} else {
  if ( $_POST["url"] != "") {
   if(isset($_GET["t"]) && !empty($_GET["t"]))
     $result = exec('python parser.py -u '.$_POST["url"].' -l '.$_GET["t"], $filename);
   else
     $result = exec('python parser.py -u '.$_POST["url"], $filename);

   echo $filename[0];
   }

}
?>
