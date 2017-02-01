<?php
include('lib.php');

$action = $_GET['action'];
$unit = $_GET['unit'];
//if($action == 'UNIT_LIST')
//{
//  $file = $action.'.xsim';
//  $dis = lib_display_list($file);
//}
if($action == 'UNIT_RESPONSE')
{
  $file = $unit.'.res';
  $dis = lib_display_res($file);
}
//if($action == 'UNIT_HISTORY')
//{
//  $file = $unit.'.hist';
//  $dis = lib_display_hist($file);
//}
echo json_encode($dis);
//echo("$x ");
//echo date("H:i:s");
//echo("<br>");
?>
