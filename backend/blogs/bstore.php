<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new database();
    $database->uploadFile('image', './../', 'uploads/');
    $title = addslashes($_POST['title']);
    $description = $_POST['description'];
    $content = $_POST['content'];
    $category = $_POST['cat_id'];
    $status = $_POST['status'];
    $main = $_POST['main'];
    $video = $_POST['video'];
    $image = $database->newname;
    $database->insert('blog', ['title' => $title, 'description' => $description, 'image' => $image, 'video' => $video, 'cat_id' => $category, 'content' => $content, 'is_monset' => $main, 'status' => $status]);
    if ($database == true) {
        header('Location:index.php?route=blogs');
    }
}
