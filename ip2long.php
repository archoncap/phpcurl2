<?php

$ip = '192.168.101.100';
$ip_long = sprintf('%u',ip2long($ip));
echo $ip_long.PHP_EOL;  // 3232261476 
echo long2ip($ip_long); // 192.168.101.100
