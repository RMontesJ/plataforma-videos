<?php

$id = $_GET['id_user'];
$id_publisher = $_GET['id_user_publisher'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

 // catches the id of the video
$id_video = $DB->catchVideoId($id_publisher);

// catches the title of the video
$title_video = $DB->catchTitle($id_publisher);

// catches the content of the video
$content_video = $DB->catchContent($id_publisher);

// catches the thumbnail of the video
$thumbnail_video = $DB->catchThumbnail($id_publisher);

// catches the publisher's name of the video
$name_publisher = $DB->catchName($id_publisher);

$video = $DB->catchVideo($id_video, $title_video, $content_video, $thumbnail_video, $name_publisher, $id_publisher);

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

<video src="../video-files/<?php echo $video ?>" width="500px" height="400px" controls autoplay>

</video>

<div class="video-info">

<h1><?php echo $video ?></h1>
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