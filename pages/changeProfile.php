<?php

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

$name = $DB->catchName($id);
$status = $DB->catchStatus($id);
$extra_info = $DB->catchExtraInfo($id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/changeProfile.css?v=<?php echo time(); ?>">
    <script src="../valid/changeProfile.js?v=<?php echo time(); ?>" defer></script>
</head>
<body>


<div class="page">

<?php include "../includes/nav.php" ?>

<div class="createPost">

<form action="../logic/logic_changeProfile.php?id_user=<?php echo $id ?>" method="post" id="form" enctype="multipart/form-data">

<h2>Actualizar perfil</h2>

<div class="input-group">
<label for="name">Nombre</label>
<input type="text" name="name" id="name" value="<?php echo $name ?>" placeholder="Nombre nuevo">
<p id="corregirName"></p>
<label for="status">Estado</label>
<input type="text" name="status" id="status" value="<?php echo $status ?>" placeholder="Estado nuevo">
<label for="name">Informacion extra</label>
<input type="text" name="extra-info" id="extra-info" value="<?php echo $extra_info ?>" placeholder="Informacion extra">
<div class="form-txt">
<a href="../pages/myProfile.php?id_user=<?php echo $id ?>">Volver a mi perfil</a>
</div>
<input class="btn" type="submit" value="Enviar">
</div>
</form>
    
</div>

</div>
    
</body>
</html>