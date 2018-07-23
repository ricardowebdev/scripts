<?php

header("Access-Control-Allow-Origin: *");

require_once 'Models/Monitor.php';
use Models\Monitor as Monitor;

$monitor = new Monitor();
echo json_encode($monitor->getData());
