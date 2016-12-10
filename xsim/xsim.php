<?php
// houseRpi.response
// houseRpi.order

$client = $_GET['client']; // From client Id
$msg    = $_GET['msg']; // Transaction Message type: 1 = any orders for me?, 2 = answer on latest order

function savePolling($id)
{
  $now  = date("Y-m-d H:i:s");
  $file = $id.'.poll';
  $fh = fopen($file, 'w');
  fwrite($fh, $now);
  fclose($fh);
}

function saveResult($id,$result)
{
  $file = $id.'.response';
  $fh = fopen($file, 'w');
  fwrite($fh, $result);
  fclose($fh);
}

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

if ($msg == 1)  // check if any orders exists for this client id
{
  savePolling($client);
  $order = anyOrder($client);
}
if ($msg == 2)
{
  $result = $_GET['result'];
  saveAnswer($client,$result);
  //clientLog($client,$result);
}

?>