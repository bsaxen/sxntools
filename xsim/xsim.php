<?php
//============================
// Version: 2017-01-24
//============================

$client = $_GET['client']; // From client Id
$msg    = $_GET['msg']; // Transaction Message type: 1 = any orders in mailbox
//============================
function savePolling($id)
{
  $now  = date("Y-m-d H:i:s");
  $file = $id.'.poll';
  $fh = fopen($file, 'w');
  fwrite($fh, $now);
  fclose($fh);
}
//============================
function anyOrder($id)
{
  $file = $id.'.order';
  $fh = fopen($file, 'r');
  $row = fgets($fh);
  $len = strlen($row);
  if($len >0)
  {
    echo("xsim:$row");
  }
  fclose($fh);
  unlink($file);
}
//============================
if ($msg == 1)  // check if any orders exists for this client id
{
  savePolling($client);
  $order = anyOrder($client);
}

?>
