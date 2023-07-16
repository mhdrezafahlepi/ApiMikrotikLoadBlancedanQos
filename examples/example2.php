<?php

require('../routeros_api.class.php');

$API = new RouterosAPI();



if ($API->connect('20.20.1.1', 'admin', 'admin')) {

   $userhotspot = $API->comm('/ip/hotspot/user/print');
   $result = json_encode($userhotspot);
   echo $result;

   $API->disconnect();
}
