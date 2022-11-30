<?php

require_once "../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database->uploadFile('image', './../', 'uploads/');
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $status = $_POST['status'];
    $image = $database->newname;
    $database->insert('admin', ['name' => $name, 'surname' => $surname, 'username' => $username, 'email' => $email, 'password' => $password, 'status' => $status, 'image' => $image]);
    $result = $database->sql;
    if ($database == true) {
        header('Location:index.php?route=admins');
    }
}
