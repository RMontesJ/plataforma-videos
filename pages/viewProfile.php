<?php 

$id = $_GET['id_user'];
$id_publisher = $_GET['id_user_publisher'];


require_once "../DB/DB_Connection.php";
$DB = new DB();

$name = $DB->catchName($id_publisher);
$status = $DB->catchStatus($id_publisher);
$extra_info = $DB->catchExtraInfo($id_publisher);
$picture = $DB->catchPicture($id_publisher);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View profile</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/viewProfile.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="page">

<?php include "../includes/nav.php" ?>

<div class="infoProfile">

<div class="picture">
    <img src="../profile-pictures/<?php echo $picture; ?>" alt="My profile picture" style="width:400px;height:300px;">
</div>

<div class="name">
    <p>Nombre de usuario: <?php echo $name ?></p>
</div>

<div class="status">
    <p>Estado: <?php echo $status ?></p>
</div>

<div class="extra_info">
    <p>Informacion adicional: <?php echo $extra_info ?></p>
</div>

</div>


<div class="morePost">
    <?php echo $DB->showMorePosts($id, $id_publisher) ?>
</div>

</div>
    
</body>
</html>