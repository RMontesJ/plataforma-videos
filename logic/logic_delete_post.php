<?php

$id = $_GET['id_user'];
$id_post = $_GET['id_post'];


require_once "../DB/DB_Connection.php";
$DB = new DB();

$DB->deletePost($id_post, $id);

?>