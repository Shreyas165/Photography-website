<?php
session_start();
function get_admin_password() {
}

$password = $_POST['password'];
if ($password === get_admin_password()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
