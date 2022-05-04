<?php

$redis = new Redis();
$redis->connect('192.16.0.20', 16380);
$r = $redis->info();

echo  $r['run_id'] . '<br>' . $r['role'] . '<br><br>';

echo '<pre>', print_r($r), '</pre>';