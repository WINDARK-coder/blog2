<?php
session_start();

include "../../config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new database();
    $id = $_GET['id'];
    $database->select("admin", "*", "id='$id'");
    $result = $database->sql;
    $admins = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $old_link = $admins['image'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($password) && isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        if (file_exists('../../uploads/' . $old_link)) {
            unlink('../../uploads/' . $old_link);
        }
        $database->uploadFile('image', '../../', 'uploads/');
        $image = $database->newname;
        $password = md5($password);
        $database->update('admin', ['name' => $name, 'surname' => $surname, 'username' => $username, 'email' => $email, 'password' => $password, 'image' => $image], "id='$id'");
    } else if (empty($password) && isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        if (file_exists('../../uploads/' . $old_link)) {
            unlink('../../uploads/' . $old_link);
            echo "$old_link";
        }
        $database->uploadFile('image', '../../', 'uploads/');
        $image = $database->newname;
        $database->update('admin', ['name' => $name, 'surname' => $surname, 'username' => $username, 'email' => $email, 'image' => $image], "id='$id'");
    } else if (!empty($password) && !isset($_FILES['image']) && $_FILES['image']['size'] = 0) {
        $password = md5($password);
        $database->update('admin', ['name' => $name, 'surname' => $surname, 'username' => $username, 'email' => $email, 'password' => $password], "id='$id'");
    } else {
        $database->update('admin', ['name' => $name, 'surname' => $surname, 'username' => $username, 'email' => $email], "id='$id'");
    }
    $result = $database->sql;
    if ($result) {
        $userid = $_SESSION['user']['id'];
        if ($id == $userid) {
            $database->select("admin", "*", "id='$userid'");
            $result = $database->sql;
            $admin = mysqli_fetch_array($result);
            $_SESSION['user'] = $admin;
        }
        header("Location:../index.php?route=admins");
    }
}
