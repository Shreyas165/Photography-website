<?php
// update_password.php

// Include your SQL Server connection configuration
require_once('config1.php');

// Function to update the admin password in the database
function updateAdminPassword($conn, $newPassword) {
    $sql = "UPDATE passwords SET password = ? WHERE is_current = 1"; // Update 'passwords' with your actual table name
    $params = array($newPassword);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        return false; // Return false on failure
    } else {
        return true; // Return true on success
    }
}
$newPassword = $_POST['newPassword'];
if (updateAdminPassword($conn, $newPassword)) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update password']);
}
sqlsrv_close($conn);
$response = array();

if ($password_updated_successfully) {
    $response['status'] = 'success';
} else {
    $response['status'] = 'error';
    $response['message'] = 'Failed to update password';
}
header('Content-Type: application/json');
echo json_encode($response);
?>
