<?php 

$id = $_GET['id_user'];

?>

<header>
    <img src="../img/imageMessage.png" alt="Logo message">
    <nav>
        <ul>
            <li><a href="../pages/main.php?id_user=<?php echo $id ?>">Inicio</a></li>
            <li><a href="../pages/post.php?id_user=<?php echo $id ?>">Crear publicación</a></li>
            <li><a href="../pages/myProfile.php?id_user=<?php echo $id ?>">Mi perfil</a></li>
        </ul>
    </nav>
    <a href="../logic/logic_logout.php"><button>Cerrar sesion</button></a>
</header>