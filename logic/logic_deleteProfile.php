<?php 

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

$DB->deletePosts($id);
$DB->deleteUser($id);