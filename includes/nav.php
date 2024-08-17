<?php 

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();
$picture = $DB->catchPicture($id);

?>

<header>
    <img src="../img/play_logo.webp" alt="Logo message">
    <nav>
        <ul>
            <li><a href="../pages/main.php?id_user=<?php echo $id ?>">Inicio</a></li>
            <li><a href="../pages/post.php?id_user=<?php echo $id ?>">Crear video</a></li>
            <li><a href="../pages/profiles.php?id_user=<?php echo $id ?>">Descubrir gente</a></li>
            <li></li>
        </ul>
    </nav>
    <div class="profile-logout-box">
    <a href="../pages/myProfile.php?id_user=<?php echo $id ?>"><img src="../profile-pictures/<?php echo $picture; ?>" alt="My profile picture" style="width:40px;height:40px;"></a>
    <a href="../logic/logic_logout.php"><img src="../icons/logout_icon.svg" alt="Logout" style="width:40px;height:40px;"></a>
    </div>
    
</header>