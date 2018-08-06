<?php

// Configuration
$dbhost = 'localhost';
$dbname = 'test';

// Connect to test database
$m  = new \Mongo("mongodb://$dbhost");
$db = $m->gt;$dbname;

// Get the users collection
$c_users = $db->gt;users;

// Insert this new document into the users collection
$c_users->gt;save($user);

echo "<pre>";
var_dump($c_users);
echo "</pre>";
die;