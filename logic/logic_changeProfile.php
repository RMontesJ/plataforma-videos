<?php

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

$name = $_POST['name'];
$password = $_POST['password'];
$status = $_POST['status'];
$extra_info = $_POST['extra-info'];
$fotoPredeterminada = "../profile-pictures/user-photo-default.webp";
$foto = $fotoPredeterminada;

if(isset($_FILES['picture'])){

 // Ruta donde se guardará la foto (puedes ajustarla según tu estructura de archivos)
 $ruta_destino = '../profile-pictures/';

 // Nombre del archivo original
 $nombre_archivo = $_FILES['picture']['name'];

 // Mover el archivo desde el directorio temporal al directorio destino
 if (move_uploaded_file($_FILES['picture']['tmp_name'], $ruta_destino . $nombre_archivo)) {
     // Aquí puedes guardar $nombre_archivo en la base de datos o realizar otras operaciones
     $foto = $nombre_archivo;
 }

}

// requires one field to update info
if(isset($name) || isset($password) || isset($status) || isset($extra_info)){
    $DB->editProfile($name, $status, $extra_info, $foto, $id);
}


?>