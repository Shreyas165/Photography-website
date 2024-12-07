<?php
// config1.php

$serverName = "LAPTOP-2BTNGHRP\SQLEXPRESS01";
$connectionOptions = array(
    "Database" => "forgot_password",
    "Uid" => null,
    "PWD" => null,
    "Authentication" => SQLSRV_CONFIG_USER
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
