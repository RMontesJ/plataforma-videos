<?php 

error_reporting(0);

$id = $_GET['id_user'];
$id_publisher = $_GET['id_user_publisher'];

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
    <title>Discover people</title>
    <link rel="stylesheet" href="../css/nav.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/profiles.css?v=<?php echo time(); ?>">
</head>
<body>

<div class="page">

<?php include "../includes/nav.php" ?>

<?php include "../includes/searchBar.php" ?>

<div class="posts">
    <?php $posts = $DB->showProfiles($value, $id); ?>
</div>
    
</div>

</body>
</html>