<?php
$serverName = "LAPTOP-2BTNGHRP\\SQLEXPRESS01";
$connectionOptions = array(
    "Database" => "portraits",
    "TrustServerCertificate" => true
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
?>
