<?php

$id = $_GET['id_user'];
$id_publisher = $_GET['id_user_publisher'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

// buscar una forma de hacer funcion que coga el video teniendo en cuenta el id de publicacion
// y el id del usuario que la publica

// coge el nombre del que publica
$name = $DB->catchName($id_publisher);

// coge la foto del que publica
$picture = $DB->catchPicture($id_publisher);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/watch.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="page">

<?php include "../includes/nav.php" ?>

<div class="video-box">

<video src="../video-files/<?php echo $video ?>" width="500px" height="400px" controls autoplay>

</video>

<div class="video-info">

<h1><?php echo $video ?></h1>
</div>

<div class="publisher-info">
    <div class="publisher-picture">
    <img src="../profile-pictures/<?php echo $picture ?>" width="80px" height="80px" alt="Publisher picture">
    </div>
<h1><?php echo $name ?></h1>
</div>

</div>

</div>
    
</body>
</html>