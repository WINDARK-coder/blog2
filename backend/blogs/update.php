<?php
include "../../config/config.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database->uploadFile('image', '../../', 'uploads/');
    $id = $_GET['id'];
    $title = addslashes($_POST['title']);
    $description = $_POST['description'];
    $video = $_POST['video'];
    $image = $database->newname;
    $cat_id = $_POST['cat_id'];
    $content = $_POST['content'];
    $is_monset = $_POST['is_monset'];
    $status = $_POST['status'];
    $database->select("blog", "*", "id='$id'");
    $result = $database->sql;
    $blogs = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $old_link = $blogs['image'];

    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
        $database->update('blog', ['title' => $title, 'description' => $description, 'image' => $image, 'video' => $video, 'cat_id' => $cat_id, 'content' => $content, 'is_monset' => $is_monset, 'status' => $status], "id='$id'");
        if (file_exists('../../uploads/' . $old_link)) {
            unlink('../../uploads/' . $old_link);
        }
    } else {
        $database->update('blog', ['title' => $title, 'description' => $description, 'image' => $old_link, 'video' => $video, 'cat_id' => $cat_id, 'content' => $content, 'is_monset' => $is_monset, 'status' => $status], "id='$id'");
    }
    $result = $database->sql;

    if ($result == true) {
        header('Location:http://localhost/blog2/backend/index.php?route=blogs');
    }
    exit();
}
