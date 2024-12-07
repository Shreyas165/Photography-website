<?php
require 'config1.php';
$sql = "SELECT password FROM passwords WHERE is_current = 1";
$stmt = sqlsrv_query($conn, $sql);
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

$result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
if ($result) {
    echo json_encode(['status' => 'success', 'password' => $result['password']]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Password not found']);
}
?>
