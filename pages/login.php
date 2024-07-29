<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/form.css?v=<?php echo time(); ?>">
    <script src="../valid/login.js?v=<?php echo time(); ?>" defer></script>
</head>
<body>

<form action="../logic/logic_login.php" id="form" method="post">

<h2>Inicio de sesion</h2>

<div class="input-group">
<label for="name">Nombre</label>
<input type="text" name="name" id="name" placeholder="Nombre">
<p id="corregirName"></p>
<label for="contrasena">Contraseña</label>
<input type="password" name="password" id="password" placeholder="Contraseña">
<p id="corregirPassword"></p>

<div class="form-txt">
<a href="../pages/register.php">Registrarse</a>
</div>
<input class="btn" type="submit" value="Enviar">
</div>
</form>
    
</body>
</html>