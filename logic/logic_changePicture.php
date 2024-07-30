<?php

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();
$picture_type = $_FILES['picture']['type'];


if (isset($_FILES['picture'])) {

    if(strpos($picture_type, 'png') || strpos($picture_type, 'jpeg') || strpos($picture_type, 'jpg')){
   
    // Ruta donde se guardará la foto
    $ruta_destino = '../profile-pictures/';

    // Nombre del archivo original
    $nombre_archivo = $_FILES['picture']['name'];

    // Mover el archivo desde el directorio temporal al directorio destino
    if (move_uploaded_file($_FILES['picture']['tmp_name'], $ruta_destino . $nombre_archivo)) {
        // Aquí puedes guardar $nombre_archivo en la base de datos o realizar otras operaciones
        $foto = $nombre_archivo;
        $DB->changePicture($id, $foto);
    }

}

else if($_FILES['picture']['name'] == ""){
    $fotoPredeterminada = '../profile-pictures/user-photo-default.webp';
    $foto = $fotoPredeterminada;
    $DB->changePicture($id, $foto);
}

}



?>