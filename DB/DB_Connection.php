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
        $consulta = $this->conexion->query("SELECT * FROM publicacion WHERE id LIKE '%$search%' OR titulo LIKE '%$search%' OR contenido LIKE '%$search%'");

        while ($row = $consulta->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class= 'tarjeta'>";
            echo "<a href='../pages/watch.php?id_user_publisher=" . $row['usuario_id'] . "&id_user=$my_id'><img src='../video-thumbnail/" . $row['miniatura'] . "' alt='Video thumbnail' style='width:100%;height:300px;'></a><br>";
            echo "Titulo: " . $row['titulo'] . "<br>";
            echo "Contenido: " . $row['contenido'] . "<br>";
            echo "<a href='../pages/viewProfile.php?id_user_publisher=" . $row['usuario_id'] . "&id_user=$my_id'><button>Ver perfil</button></a><br>";
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

    public function deletePosts($id){
        $borrar = "DELETE FROM publicacion WHERE id= '$id'";

        mysqli_query($this->conexion, $borrar);
    }
// catches your own name
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

    public function catchVideo($id){
        $query = mysqli_query($this->conexion, "SELECT * FROM publicacion where id = '$id'");
        $num = mysqli_num_rows($query);
        if ($num == 1) {
            $row = mysqli_fetch_assoc($query);
            $video = $row['video'];
            return $video;
        }
    }

    public function createPost($title, $description, $thumbnail, $video, $id){
        $insertar = "INSERT INTO publicacion (titulo, contenido, miniatura, video, usuario_id) VALUES ('$title', '$description', '$thumbnail', '$video', '$id')";

        if (mysqli_query($this->conexion, $insertar)) {
            header("Location: ../pages/main.php?id_user=$id");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }

    public function editProfile($name, $status, $info_extra, $foto, $id){
        $update = "UPDATE usuario SET nombre='$name', estado='$status', info_adicional='$info_extra', foto='$foto' WHERE id = '$id'";
        if (mysqli_query($this->conexion, $update)) {
            header("Location: ../pages/myProfile.php?id_user=$id");
            exit();
        } else {
            echo "Error: " .mysqli_error($this->conexion);
        }
    }

}

?>