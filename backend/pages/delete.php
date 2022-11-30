<?php
require_once "../config/config.php";
$id = $_GET['id'];
$database->delete('pages', "id='$id'");
if ($database == true) {
    header('Location:index.php?route=pages');
}
