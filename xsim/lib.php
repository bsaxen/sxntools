<?php
$now = date("Y-m-d H:i:s");
//===========================================
function lib_display_list($file)
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
        $dis = '<br>'.$ix.' <a href=index.php?unit='.$id.'>'.$id.'</a>';
        echo("$dis");
      }
    }
    fclose($fh);
    return($dis);
  }
  return("No content $order");
}
//===========================================
function lib_display_res($file)
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
        //$temp = explode(".",$row);
        //$id = $temp[0];
        $id = $row;
        $ix++;
        $dis = $dis.'<br>'.sprintf("%'-3d", $ix).' '.$id;
      }
    }
    fclose($fh);
    return($dis);
  }
  return("No content $order");
}
//===========================================
function lib_display_hist($file)
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
        $dis = $dis.'<br>'.$ix.' '.$id;
      }
    }
    fclose($fh);
    return($dis);
  }
  return("No content $order");
}

//===========================================
function lib_saveOrder($id,$order,$delay)
//===========================================
{
  echo("SaveOrder id=$id order=$order<br>");
  $file = $id.'.order';
  $fh = fopen($file, 'w');
  $tot = 'xsim:'.$order.':'.$delay;
  fwrite($fh, $tot);
  fclose($fh);

  $file = $id.'.hist';
  $fh = fopen($file, 'a+');
  $row = $order."\n";
  fwrite($fh, $row);
  fclose($fh);
}
?>
