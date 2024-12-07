<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = $_POST['filename'];
    $filepath = __DIR__ . '/uploads/' . $filename;

    error_log("Filename: $filename");
    error_log("Filepath: $filepath");

    if (file_exists($filepath)) {
        if (unlink($filepath)) {
            $sql = "DELETE FROM images WHERE filename = ?";
            $params = array($filename);
            $stmt = sqlsrv_query($conn, $sql, $params);

            if ($stmt === false) {
                error_log(print_r(sqlsrv_errors(), true)); 
                die(json_encode(['status' => 'error', 'message' => 'Database deletion failed']));
            }

            echo json_encode(['status' => 'success']);
        } else {
            error_log("Error: Could not delete the file at $filepath");
            echo json_encode(['status' => 'error', 'message' => 'File could not be deleted']);
        }
    } else {
        error_log("Error: File not found at $filepath");
        echo json_encode(['status' => 'error', 'message' => 'File not found']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

sqlsrv_close($conn);
?>
