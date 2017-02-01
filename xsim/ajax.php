<?php
include('lib.php');
system("ls *.poll > UNIT_LIST.xsim");
$action = $_GET['action'];
$unit = $_GET['unit'];
if($action == 'UNIT_LIST')
{
  $file = $action.'.xsim';
  $dis = lib_display($file);
}
if($action == 'UNIT_RESPONSE')
{
  $file = $unit.'.res';
  $dis = lib_display($file);
}
if($action == 'UNIT_HISTORY')
{
  $file = $unit.'.hist';
  $dis = lib_display($file);
}
echo json_encode($dis);
//echo("$x ");
//echo date("H:i:s");
//echo("<br>");
?>
