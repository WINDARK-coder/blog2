<?php
require_once "../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $menu = $_POST['menu'];
    $status = $_POST['status'];
    $database->insert('pages', ['title' => $title, 'is_menu' => $menu, 'status' => $status, 'description' => $description, 'content' => $content]);
    if ($database == true) {
        header('Location:index.php?route=pages');
    }
}
