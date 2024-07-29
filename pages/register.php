<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/form.css?v=<?php echo time(); ?>">
    <script src="../valid/register.js?v=<?php echo time(); ?>" defer></script>
</head>
<body>

<form action="../logic/logic_register.php" method="post" id="form" enctype="multipart/form-data">

<h2>Registrarse</h2>

<div class="input-group">
<label for="name">Nombre</label>
<input type="text" name="name" id="name" placeholder="Nombre">
<p id="corregirName"></p>
<label for="contrasena">Contraseña</label>
<input type="password" name="password" id="password" placeholder="Contraseña">
<p id="corregirPassword"></p>
<label for="estado">Estado</label>
<input type="text" name="status" id="estado" placeholder="Estado">
<label for="estado">Informacion adicional</label>
<input type="text" name="extra-info" id="extra-info" placeholder="Informacion adicional">
<label for="picture">Foto</label>
<input type="file" name="picture" id="picture" placeholder="Foto">

<div class="form-txt">
<a href="../pages/login.php">Iniciar sesion</a>
</div>
<input class="btn" type="submit" value="Enviar">
</div>
</form>
    
</body>
</html>