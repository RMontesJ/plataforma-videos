<?php

require_once "../DB/DB_Connection.php";
$DB = new DB();

$name = $_POST['name'];
$password = $_POST['password'];
$status = $_POST['status'];
$extra_info = $_POST['extra-info'];
$fotoPredeterminada = "../profile-pictures/user-photo-default.webp";
$foto = $fotoPredeterminada;

// if picture is set
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

   // only name and password is required
   if(isset($name) && isset($password)){
    $DB->createUser($name, $password, $status, $extra_info, $foto);
   }

?>