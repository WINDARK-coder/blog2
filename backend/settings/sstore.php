<?php
require_once "../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $key = $_POST['key'];
    $value = $_POST['value'];
    $status = $_POST['status'];
    $database->insert('settings', ['_key' => $key, 'value' => $value, 'status' => $status]);
    if ($database == true) {
        header('Location:index.php?route=settings');
    }
}
