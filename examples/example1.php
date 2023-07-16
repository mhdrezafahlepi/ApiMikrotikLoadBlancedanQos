<?php

require('../routeros_api.class.php');

$API = new RouterosAPI();

// $API->debug = true;

if ($API->connect('20.20.1.1', 'admin', 'admin')) {

   $interface = $API->comm('/interface/print');
   $result = json_encode($interface);
   echo $result;

   $API->disconnect();
}
