<?php 
    require "config/config.php";

    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];
        $quantity = 1;

        $cart_insert = $conn->prepare("INSERT INTO carts (product_name, product_price, product_image, product_id, user_id, quantity)
        VALUES (:product_name, :product_price, :product_image,:product_id, :user_id, :quantity)");

        $cart_insert->execute([
            ":product_name"=> $product_name,
            ":product_price"=>$product_price,
            ":product_image"=>$product_image,
            ":product_id"=>$product_id,
            ":user_id"=>$user_id,
            ":quantity"=>$quantity
        ]);
        echo "<script>alert('Product added to cart successfully'); </script>";
        echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/shop.php">';

  
        
    }

?>