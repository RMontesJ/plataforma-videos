<?php

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

$title = $_POST['title'];
$description = $_POST['description'];
$name = $_POST['name'];

if(isset($_FILES['thumbnail'])){

 // Ruta donde se guardará la foto (puedes ajustarla según tu estructura de archivos)
 $ruta_destino = '../video-thumbnail/';

 // Nombre del archivo original
 $nombre_archivo = $_FILES['thumbnail']['name'];

 // Mover el archivo desde el directorio temporal al directorio destino
 if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $ruta_destino . $nombre_archivo)) {
     // Aquí puedes guardar $nombre_archivo en la base de datos o realizar otras operaciones
     $thumbnail = $nombre_archivo;
 }

}

if(isset($_FILES['video'])){

    // Ruta donde se guardará la foto (puedes ajustarla según tu estructura de archivos)
    $ruta_destino = '../video-files/';
   
    // Nombre del archivo original
    $nombre_archivo = $_FILES['video']['name'];
   
    // Mover el archivo desde el directorio temporal al directorio destino
    if (move_uploaded_file($_FILES['video']['tmp_name'], $ruta_destino . $nombre_archivo)) {
        // Aquí puedes guardar $nombre_archivo en la base de datos o realizar otras operaciones
        $video = $nombre_archivo;
    }
   
   }


// requires title, description and video to post video
if(isset($title) && isset($description) && isset($video)){

$DB->createPost($title, $description, $thumbnail, $video, $id, $name);
}


?>