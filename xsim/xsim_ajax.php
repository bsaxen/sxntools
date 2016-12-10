<?php
$client = $_GET['client'];
 $file = $client.'.res';
  $fh = fopen($file, 'r') or die("$client no data");
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
