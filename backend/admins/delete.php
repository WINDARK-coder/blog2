<?php
require_once "../config/config.php";
$id = $_GET['id'];
$database->select("admin", "*", "id='$id'");
$result = $database->sql;
$row = mysqli_fetch_array($result);
$old_link =  $row['image'];
if (file_exists('./../uploads/' . $old_link)) {
    unlink('./../uploads/' . $old_link);
}
$database->delete('admin', "id='$id'");
if ($database == true) {
    header('Location:index.php?route=admins');
}
