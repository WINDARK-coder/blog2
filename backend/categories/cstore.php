<?php
require_once "../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $menu = $_POST['menu'];
    $status = $_POST['status'];
    $database->insert('categories', ['title' => $title, 'is_menu' => $menu, 'status' => $status]);
    if ($database == true) {
        header('Location:index.php?route=categories');
    }
}
