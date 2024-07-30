<?php

$id = $_GET['id_user'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit profile</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/changeProfile.css?v=<?php echo time(); ?>">
    
</head>
<body>


<div class="page">

<?php include "../includes/nav.php" ?>

<div class="createPost">

<form action="../logic/logic_changePicture.php?id_user=<?php echo $id ?>" method="post" id="form" enctype="multipart/form-data">

<h2>Actualizar foto de perfil</h2>


<div class="input-group">

<label for="picture">Foto</label>
<input type="file" name="picture" id="picture" placeholder="Foto">

<div class="form-txt">

</div>
<input class="btn" type="submit" value="Enviar">
</div>
</form>
    
</div>

</div>
    
</body>
</html>

