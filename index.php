<?php
require  "includes/header.php";
require "config/config.php";

//grapping carousel image

$carousel = $conn->query("SELECT * FROM products WHERE id = 1");
$carousel->execute();
$carousels = $carousel->fetch(PDO::FETCH_OBJ);

$carousel1 = $conn->query("SELECT * FROM products WHERE id = 2");
$carousel1->execute();
$carousels1 = $carousel1->fetch(PDO::FETCH_OBJ);

$carousel2 = $conn->query("SELECT * FROM products WHERE id = 3");
$carousel2->execute();
$carousels2 = $carousel2->fetch(PDO::FETCH_OBJ);

//fetch products
$products = $conn->query("SELECT * FROM products");
$products->execute();
$fetchproducts = $products->fetchAll(PDO::FETCH_OBJ);



?>


<!-- header section ends -->

<section class="home">

    <div class="slides-container">

        <div class="slide active">
            <div class="content">
                <span><?php echo $carousels->name; ?></span>
                <h3><?php echo $carousels->description; ?></h3>
                <a href="http://localhost/fruits/shop.php"" class="btn">shop now</a>
            </div>
            <div class="image">
                <img src="image/<?php echo $carousels->image; ?>" alt="">
            </div>
        </div>

        <div class="slide">
        <div class="content">
                <span><?php echo $carousels1->name; ?></span>
                <h3><?php echo $carousels1->description; ?></h3>
                <a href="http://localhost/fruits/shop.php"" class="btn">shop now</a>
            </div>
            <div class="image">
                <img src="image/<?php echo $carousels1->image; ?>" alt="">
            </div>
        </div>
        <div class="slide">
        <div class="content">
                <span><?php echo $carousels2->name; ?></span>
                <h3><?php echo $carousels2->description; ?></h3>
                <a href="http://localhost/fruits/shop.php"" class="btn">shop now</a>
            </div>
            <div class="image">
                <img src="image/<?php echo $carousels2->image; ?>" alt="">
            </div>
        </div>
        </div>




    </div>

    <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
    <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

</section>

<section class="banner-container">
    <?php foreach($fetchproducts as $fetchproduct): ?>
    <div class="banner">
        <img src="image/<?php echo $fetchproduct->image; ?>" alt="">
        <div class="content">
            <span><?php echo $fetchproduct->name; ?></span>
            <h3><?php echo $fetchproduct->description; ?></h3>
            
            <a href="http://localhost/fruits/shop.php" class="btn">shop now</a>
        </div>
    </div>

   <?php endforeach; ?>

</section>

<?php require  "includes/footer.php"; ?>