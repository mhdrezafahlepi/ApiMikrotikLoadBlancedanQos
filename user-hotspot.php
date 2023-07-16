<?php

require('conn.php');
$userhotspot = $API->comm('/ip/hotspot/user/print');
$json = json_encode($userhotspot);

echo $json;

// foreach ($userhotspot as $data) {
//     echo 'Username = ' . $data['name'] . ' Password =' . $data['password'] . '<br>';
// }

$API->disconnect();
