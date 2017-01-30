<?php
function lib_display($order)
{
  //echo("lib_display:$order<br>");
  $file = $order.'.xsim';
  if(file_exists($file))
  {
    //echo("open file [$file]");
    $fh = fopen($file, 'r');
    $ix = 0;
    while(!feof($fh))
    {
      $ix++;
      //$dis[$ix] = fgets($fh);
      //echo("$row<br>");
      $dis = $dis.'<br>'.$ix.' '.fgets($fh);
    }
    fclose($fh);
    //$dis[0] = $ix;
    return($dis);
  }
  //$dis[0] = $ix;
  return("No content");
}

function lib_do_action($action,$p1,$p2,$p3)
{
  echo("do_action:$action<br>");
}
?>
