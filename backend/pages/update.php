<?php
include "../../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $menu = $_POST['menu'];
    $status = $_POST['status'];
    $database->update('pages', ['title' => $title, 'is_menu' => $menu, 'status' => $status, 'description' => $description, 'content' => $content], "id='$id'");
    if ($database == true) {
        header('Location:http://localhost/blog2/backend/index.php?route=pages');
    }
}
