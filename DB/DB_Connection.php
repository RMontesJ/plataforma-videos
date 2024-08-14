<?php 

class DB
{
    private $dbhost = 'localhost';
    private $dbuser = 'Rafa';
    private $dbpasswd = "1234";
    private $dbname = "plataforma_videos";

    private $conexion;

    public function __construct()
    {
        $this->conexion = new mysqli($this->dbhost, $this->dbuser, $this->dbpasswd, $this->dbname);
        $this->conexion->select_db($this->dbname);
        $this->conexion->query("SET NAMES 'utf8'");
        if (!$this->conexion) {
            die("Error de conexion: " . mysqli_connect_error());
        }

    }

    public function showPosts($search, $my_id){
        $consulta = $this->conexion->query("SELECT * FROM publicacion WHERE id LIKE '%$search%' OR titulo LIKE '%$search%' OR descripcion LIKE '%$search%' OR usuario_nombre LIKE '%$search%'");

        while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class= 'tarjeta'>";
            echo "<a href='../pages/watch.php?id_user_publisher=" . $row['usuario_id'] . "&id_user=$my_id&id_video=" . $row['id'] . "'><img src='../video-thumbnail/" . $row['miniatura'] . "' alt='Video thumbnail' style='width:100%;height:300px;'></a><br>";
            echo "<h1>" . $row['titulo'] . "</h1>" . "<br>";
            echo "Creador: " . $row['usuario_nombre'] . "<br>";
            echo "Descripción: " . $row['descripcion'] . "<br>";
            echo "</div>";
        }
    }

    public function showMorePosts($my_id, $id_publisher){
        $consulta = $this->conexion->query("SELECT * FROM publicacion WHERE usuario_id = '$id_publisher'");

        while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class= 'tarjeta'>";
            echo "<a href='../pages/watch.php?id_user_publisher=" . $row['usuario_id'] . "&id_user=$my_id&id_video=" . $row['id'] . "'><img src='../video-thumbnail/" . $row['miniatura'] . "' alt='Video thumbnail' style='width:100%;height:300px;'></a><br>";
            echo "<h1>" . $row['titulo'] . "</h1>" . "<br>";
            echo "Creador: " . $row['usuario_nombre'] . "<br>";
            echo "Descripción: " . $row['descripcion'] . "<br>";
            echo "</div>";
        }
    }

    public function showMyPosts($my_id){
        $consulta = $this->conexion->query("SELECT * FROM publicacion WHERE usuario_id = '$my_id'");

        while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class= 'tarjeta'>";
            echo "<a href='../pages/watch.php?id_user_publisher=" . $row['usuario_id'] . "&id_user=$my_id&id_video=" . $row['id'] . "'><img src='../video-thumbnail/" . $row['miniatura'] . "' alt='Video thumbnail' style='width:100%;height:300px;'></a><br>";
            echo "<h1>" . $row['titulo'] . "</h1>" . "<br>";
            echo "Creador: " . $row['usuario_nombre'] . "<br>";
            echo "Descripción: " . $row['descripcion'] . "<br>";
            echo "<div class= 'botones'>";
            echo "<a href='../logic/logic_delete_post.php?id_user=$my_id&id_post=" . $row['id'] . "'><img src='../icons/trashCan_Icon.svg' alt='Trash icon'></a>";
            echo "</div>";
            echo "</div>";
        }
    }

    public function showProfiles($search, $my_id){
        $consulta = $this->conexion->query("SELECT * FROM usuario WHERE nombre LIKE '%$search%'");

        while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class= 'tarjeta'>";
            echo "<a href='../pages/viewProfile.php?id_user=$my_id&id_user_publisher=" . $row['id'] . "'><img src='../profile-pictures/" . $row['foto'] . "' alt='Profile picture' style='width:100%;height:300px;'></a><br>";
            echo "Nombre: " . $row['nombre'] . "<br>";
            echo "Estado: " . $row['estado'] . "<br>";
            echo "Informacion adicional: " . $row['info_adicional'] . "<br>";
            echo "</div>";
        }
    }

    public function login($user, $passwd)
    {
        $query = mysqli_query($this->conexion, "SELECT * FROM usuario where nombre = '$user' and contrasena = '$passwd'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $id = $row['id'];
            return $id;
        } else {
            header("Location: ../pages/login.php");
        }
    }

    public function createUser($user, $password, $status, $extra_info, $foto){
        $insertar = "INSERT INTO usuario (nombre, contrasena, estado, info_adicional, foto) VALUES ('$user', '$password', '$status', '$extra_info', '$foto')";

        if (mysqli_query($this->conexion, $insertar)) {
            header("Location: ../pages/login.php");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }
//metodo borrar
    public function deleteUser($id){
        $borrar = "DELETE FROM usuario WHERE id= '$id'";

        if (mysqli_query($this->conexion, $borrar)) {
            header("Location: ../logic/logic_logout.php");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }

    public function createPost($title, $description, $thumbnail, $video, $id, $name){
        $insertar = "INSERT INTO publicacion (titulo, descripcion, miniatura, video, usuario_id, usuario_nombre) VALUES ('$title', '$description', '$thumbnail', '$video', '$id', '$name')";

        if (mysqli_query($this->conexion, $insertar)) {
            header("Location: ../pages/main.php?id_user=$id");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }

    public function deletePost($id_post, $id_user){
        $delete = "DELETE FROM publicacion WHERE id= '$id_post'";

        if (mysqli_query($this->conexion, $delete)) {
            header("Location: ../pages/myProfile.php?id_user=$id_user");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }

    public function catchVideoId($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM publicacion where usuario_id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $id_video = $row['id'];
            return $id_video;
        }
    }

    public function catchTitle($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM publicacion where id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $titulo = $row['titulo'];
            return $titulo;
        }
    }

    public function catchContent($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM publicacion where id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $contenido = $row['descripcion'];
            return $contenido;
        }
    }

    public function catchThumbnail($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM publicacion where usuario_id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $miniatura = $row['miniatura'];
            return $miniatura;
        }
    }

    public function catchVideo($id_video, $id_publisher){
        $query = mysqli_query($this->conexion, "SELECT * FROM publicacion where id = '$id_video' and usuario_id = '$id_publisher'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $video = $row['video'];
            return $video;
        }
    }

    public function catchName($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM usuario where id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $nombre = $row['nombre'];
            return $nombre;
        }
    }

    public function catchStatus($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM usuario where id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $estado = $row['estado'];
            return $estado;
        }
    }

    public function catchExtraInfo($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM usuario where id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $info_adicional = $row['info_adicional'];
            return $info_adicional;
        }
    }

    public function catchPicture($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM usuario where id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $foto = $row['foto'];
            return $foto;
        }
    }

    public function editProfile($name, $status, $info_extra, $id){
        $update = "UPDATE usuario SET nombre='$name', estado='$status', info_adicional='$info_extra' WHERE id = '$id'";
        if (mysqli_query($this->conexion, $update)) {
            header("Location: ../pages/myProfile.php?id_user=$id");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }

    public function changePicture($id, $foto){
        $update = "UPDATE usuario SET foto='$foto' WHERE id = '$id'";
        if (mysqli_query($this->conexion, $update)) {
            header("Location: ../pages/myProfile.php?id_user=$id");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }

}

?>