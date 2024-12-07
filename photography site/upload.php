<?php
require 'config.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($image['name']);
    $filename = basename($image['name']);
    error_log("Filename: $filename");
    if (file_exists($targetFile)) {
        echo json_encode(['status' => 'error', 'message' => 'File already exists']);
        exit();
    }
    if (move_uploaded_file($image['tmp_name'], $targetFile)) {
       
        $sql = "INSERT INTO images (filename, filepath) VALUES (?, ?)";
        $params = [$filename, $targetFile];
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt) {    
            error_log("Response data: " . json_encode(['status' => 'success', 'filepath' => $targetFile, 'filename' => $filename]));
            echo json_encode(['status' => 'success', 'filepath' => $targetFile, 'filename' => $filename]);
        } else {
            echo json_encode(['status' => 'error', 'message' => sqlsrv_errors()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to move uploaded file']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
?>