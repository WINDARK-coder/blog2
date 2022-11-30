<?php
require_once "../config/config.php";
$id = $_GET['id'];
$database->select("blog", "*", "id='$id'");
$result = $database->sql;
$row = mysqli_fetch_array($result);
$old_link =  $row['image'];
if (file_exists('./../uploads/' . $old_link)) {
    unlink('./../uploads/' . $old_link);
}
$database->delete('blog', "id='$id'");
if ($database == true) {
    header('Location:index.php?route=blogs');
}
