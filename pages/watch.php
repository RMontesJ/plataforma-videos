<?php

$id = $_GET['id_user'];
$id_publisher = $_GET['id_user_publisher'];
$id_video = $_GET['id_video'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

// catches the publisher's name of the video
$name_publisher = $DB->catchName($id_publisher);

$video = $DB->catchVideo($id_video, $id_publisher);

$title = $DB->catchTitle($id_video);

$description = $DB->catchContent($id_video);

// catches the publisher's picture
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
<!-- The playing video -->
<video src="../video-files/<?php echo $video ?>" width="500px" height="400px" controls autoplay>

</video>

<div class="video-info">
<!-- Title of the video -->
<h1><?php echo $title; ?></h1>
<p><?php echo $description ?></p>
</div>

<div class="publisher-info">
    <div class="publisher-picture">
    <a href="../pages/viewProfile.php?id_user=<?php echo $id ?>&id_user_publisher=<?php echo $id_publisher ?>"><img src="../profile-pictures/<?php echo $picture ?>" width="80px" height="80px" style="border-radius:100%;" alt="Publisher picture"></a>
    </div>
<h1><?php echo $name_publisher ?></h1>
</div>

</div>

</div>
    
</body>
</html>