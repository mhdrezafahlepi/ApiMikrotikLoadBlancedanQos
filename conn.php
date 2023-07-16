<?php

require('routeros_api.class.php');

$API = new RouterosAPI();

// $API->debug = true;

if ($API->connect('10.10.10.1', 'admin', 'admin')) {
}