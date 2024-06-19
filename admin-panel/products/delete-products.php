<?php

    require "../../config/config.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $delete = $conn->query("DELETE FROM products WHERE id = '$id'");
        $delete->execute();
        echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/products/show-products.php">';

    }
?>