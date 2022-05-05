<?php

$redis = new Redis();
/*
$redis ->connect('redis', 6379);
$redis ->auth('123456');
echo "The connection is successful!";
echo "Server is running: ". $redis->ping();
*/
$sentinel = array(
    array(
        'host' => '192.16.0.6',
        'port' => 6379,
        'role' => 'master'
    ),
    array(
        'host' => '192.16.0.7',
        'port' => 6379,
        'role' => 'slave1'
    ),
    array(
        'host' => '192.16.0.8',
        'port' => 6379,
        'role' => 'slave2'
    ),
);

foreach ($sentinel as $value) {
    try {
        $redis->connect($value['host'], $value['port']);
        $redis->set('foo', 'bar');
        echo "連線成功 " . $value['host'] . "<br>目前 master：" . $value['role'] . "<br>";
    } catch (\Exception $e) {
        continue;
    }
}