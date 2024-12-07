<?php
require_once('config1.php');
function get_admin_password($conn) {
    $sql = "SELECT password FROM passwords WHERE is_current = 1"; 
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        die(json_encode(['status' => 'error', 'message' => 'Query failed: ' . print_r(sqlsrv_errors(), true)]));
    }

    $result = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    if ($result) {
        return $result['password'];
    } else {
        die(json_encode(['status' => 'error', 'message' => 'Password not found']));
    }
}
$adminPassword = get_admin_password($conn);
echo json_encode(['status' => 'success', 'password' => $adminPassword]);
sqlsrv_close($conn);
?>
