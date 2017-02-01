<?php
$now = date("Y-m-d H:i:s");
//===========================================
function lib_display($file)
//===========================================
{
  if(file_exists($file))
  {
    $fh = fopen($file, 'r');
    $ix = 0;
    while(!feof($fh))
    {
      $row = fgets($fh);
      $row = trim($row);
      $len = strlen($row);

      if($len > 0)
      {
        $temp = explode(".",$row);
        $id = $temp[0];
        $ix++;
        $dis = $dis.'<br>'.$ix.' <a href=index.php?unit='.$id.'>'.$id.'</a>';
      }
    }
    fclose($fh);
    return($dis);
  }
  return("No content $order");
}

//===========================================
function lib_saveOrder($id,$order)
//===========================================
{
  $file = $id.'.order';
  $fh = fopen($file, 'w');
  fwrite($fh, $order);
  fclose($fh);

  $file = $id.'.hist';
  $fh = fopen($file, 'a+');
  $row = $order.'\n';
  fwrite($fh, $row);
  fclose($fh);
}
?>
