<?php
require 'config.php';

header('Content-Type: application/json');

$sql = "SELECT filename, filepath FROM images";
$stmt = sqlsrv_query($conn, $sql);

if ($stmt === false) {
    echo json_encode(array("status" => "error", "message" => sqlsrv_errors()));
    exit;
}

$images = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $images[] = array('filename' => $row['filename'], 'filepath' => $row['filepath']);
}

$json = json_encode($images);
if (json_last_error() !== JSON_ERROR_NONE) {
    die('JSON encoding error: ' . json_last_error_msg());
}

echo $json;

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
