<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>
<?php
if (!isset($_SESSION['user_id'])) {
   echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/index.php">';
}
if ($_GET['id']) {

   $id = $_GET['id'] ;
   $delete = $conn->query("DELETE FROM carts WHERE id = '$id'");
   $delete->execute();
   echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/shop.php">';
} 




?>