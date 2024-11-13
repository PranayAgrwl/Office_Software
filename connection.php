<?php

$serverName = "LAPTOP-OF-PRANA";
$database = "DPKTEX2425";
$uid = "";
$pass = "";


$connection = [ 
"Database" => $database, 
"Uid" => $uid,
"PWD" => $pass
];

$conn = sqlsrv_connect($serverName, $connection);
if(!$conn)
die (print_r(sqlsrv_errors(), true)); 
else
// echo 'connection established';

?>