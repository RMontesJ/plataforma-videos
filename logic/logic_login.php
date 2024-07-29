<?php

require_once "../DB/DB_Connection.php";
$DB = new DB();

$name = $_POST['name'];
$password = $_POST['password'];

if(isset($name) && isset($password)){
// catch the id of the user if exist in the database
$id = $DB->login($name, $password);

if(isset($id)){
    header("Location: ../pages/main.php?id_user=$id");
}

}

?>