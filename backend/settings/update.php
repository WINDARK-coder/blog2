<?php
include "../../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $key = $_POST['key'];
    $value = $_POST['value'];
    $status = $_POST['status'];
    $database->update('settings', ['_key' => $key, 'value' => $value, 'status' => $status], "id='$id'");
    if ($database == true) {
        header('Location:http://localhost/blog2/backend/index.php?route=settings');
    }
}
