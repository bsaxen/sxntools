<?php
 $file = "benny.res";
  $fh = fopen($file, 'r') or die("no poll list");
  while(!feof($fh)) 
  {
     $row = fgets($fh);
     $row = trim($row);
     $len = strlen($row);
     if($len >0)
     {
      echo(" $row<br>");
     }
  }
  fclose($fh);
?>
