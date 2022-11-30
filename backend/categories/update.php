<?php
include "../../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $menu = $_POST['menu'];
    $status = $_POST['status'];
    $database->update('categories', ['title' => $title, 'is_menu' => $menu, 'status' => $status], "id='$id'");
    if ($database == true) {
        header("Location:http://localhost/blog2/backend/index.php?route=categories");
    }
}
