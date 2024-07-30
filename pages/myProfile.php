<?php 

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

$name = $DB->catchName($id);
$status = $DB->catchStatus($id);
$extra_info = $DB->catchExtraInfo($id);
$picture = $DB->catchPicture($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My profile</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/myProfile.css?v=<?php echo time(); ?>">
</head>
<body>
    
<div class="page">

<?php include "../includes/nav.php" ?>

<div class="infoProfile">

<div class="picture">
    <img src="../profile-pictures/<?php echo $picture; ?>" alt="My profile picture" style="width:400px;height:300px;">
    <a href="../pages/changePicture.php?id_user=<?php echo $id ?>"><img src="../icons/edit_Profile_Icon.svg" alt="Edit picture"></a>
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

<div class="profileConfig">

<div class="changeInfo">
<a href="../pages/changeProfile.php?id_user=<?php echo $id ?>"><img src="../icons/edit_Profile_Icon.svg" alt="Edit profile"></a>
</div>

<div class="deleteUser">
<a href="../logic/logic_deleteProfile.php?id_user=<?php echo $id ?>"><img src="../icons/trashCan_Icon.svg" alt="Delete profile"></a>
</div>

</div>

</div>

</div>

</body>
</html>