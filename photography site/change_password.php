<?php

function connectToDatabase() {
    $serverName = "LAPTOP-2BTNGHRP\\SQLEXPRESS01"; 
    $databaseName = "forgot_password";
    $connectionOptions = array(
        "Database" => $databaseName,
        "Authentication" => "Windows",
        "TrustServerCertificate" => true
    );

    $conn = sqlsrv_connect($serverName, $connectionOptions);

    if ($conn === false) {
        die(json_encode(array("status" => "error", "message" => "Connection failed: " . print_r(sqlsrv_errors(), true))));
    }

    return $conn;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPassword = $_POST['newPassword']; 

    if (!empty($newPassword)) {
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $conn = connectToDatabase();
        $sql = "UPDATE admins SET password=? WHERE username='admin';";

        $params = array($hashedNewPassword);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(json_encode(array("status" => "error", "message" => "Error updating password: " . print_r(sqlsrv_errors(), true))));
        } else {
            $updatedPassword = $newPassword;

            echo json_encode(array("status" => "success", "message" => "Password updated successfully.", "newPassword" => $updatedPassword));
        }

        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);
    } else {
        echo json_encode(array("status" => "error", "message" => "New password cannot be empty."));
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>
