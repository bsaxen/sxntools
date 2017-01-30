<?php
include('lib.php');
$dis = lib_display("UNIT_LIST");
$x = $_GET['action'];
echo json_encode($dis);
//echo("$x ");
//echo date("H:i:s");
//echo("<br>");
?>
