<?php 

error_reporting(0);

$id = $_GET['id_user'];

require_once "../DB/DB_Connection.php";
$DB = new DB();

if(isset($_POST['send'])){
$value = $_POST['search'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="page">

<?php include "../includes/nav.php" ?>

<?php include "../includes/searchBar.php" ?>

<div class="posts">
    <?php $posts = $DB->showPosts($value, $id); ?>
</div>
    
</div>

</body>
</html>