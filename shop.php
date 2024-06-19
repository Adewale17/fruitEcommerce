<?php
require  "includes/header.php";
require "config/config.php";

$categories = $conn->query("SELECT * FROM categories");
$categories->execute();
$allcategories = $categories->fetchAll(PDO::FETCH_OBJ);

$products = $conn->query("SELECT * FROM products");
$products->execute();
$fetchproducts = $products->fetchAll(PDO::FETCH_OBJ);

$product = $conn->query("SELECT * FROM products");
$product->execute();
$fetchproduct = $product->fetch(PDO::FETCH_OBJ);


?>



<!-- header section ends -->

<div class="heading">
    <h1>our shop</h1>
    <p> <a href="http://localhost/fruits/">home >></a> shop </p>
</div>

<section class="category">


    <div class="box-container">
        <?php foreach ($allcategories as $allcategory) : ?>
            <a href="#" class="box">
                <img src="image/<?php echo $allcategory->image; ?>" alt="">
                <h3><?php echo $allcategory->name; ?></h3>
            </a>
        <?php endforeach; ?>
    </div>


</section>

<section class="products">

    <h1 class="title"> our <span>products</span> <a href="http://localhost/fruits/view-all.php">view all >></a> </h1>

    <div class="box-container">
        <?php foreach ($fetchproducts as $fetchproduct) : ?>
            <div class="box">
                <div class="icns">
                    <a href="#" class="fas fa-shoping-cart"></a>
                    <a href="#" class="fas fa-hart"></a>
                    <a href="#" class="fas fa-e
                    e"></a>
                </div>
                <div class="image">
                    <img src="image/<?php echo $fetchproduct->image; ?>" alt="">
                </div>
                <div class="content">
                    <h3><?php echo $fetchproduct->name; ?></h3>
                    <div class="price">#<?php echo $fetchproduct->price; ?></div>
                    <div class="stars">
                        <i class="fas fa-star <input type=" submit" name="submit" value="login" class="btn "></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <?php if(!isset($_SESSION['username'])): ?>
                        <a href="http://localhost/fruits/auth/login.php" class="btn">Login to Add product to cart</a>
                    <?php else : ?>
                    <form action="cart.php" method="post">
                        <div class="box">
                            <input type="hidden" name="product_name" value="<?php echo $fetchproduct->name; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetchproduct->price; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetchproduct->image;  ?>">
                            <input type="hidden" name="product_id" value="<?php echo $fetchproduct->id;  ?>">
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];  ?>">
                            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
                        </div>
                    </form>
                    <?php endif; ?>
                  
                </div>

            </div>
        <?php endforeach; ?>

        <!-- <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product-2.jpg" alt="">
            </div>
            <div class="content">
                <h3>organic food</h3>
                <div class="price">$18.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product-3.jpg" alt="">
            </div>
            <div class="content">
                <h3>organic food</h3>
                <div class="price">$18.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product-4.jpg" alt="">
            </div>
            <div class="content">
                <h3>organic food</h3>
                <div class="price">$18.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product-5.jpg" alt="">
            </div>
            <div class="content">
                <h3>organic food</h3>
                <div class="price">$18.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product-6.jpg" alt="">
            </div>
            <div class="content">
                <h3>organic food</h3>
                <div class="price">$18.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product-7.jpg" alt="">
            </div>
            <div class="content">
                <h3>organic food</h3>
                <div class="price">$18.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/product-8.jpg" alt="">
            </div>
            <div class="content">
                <h3>organic food</h3>
                <div class="price">$18.99</div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
            </div>
        </div> -->

    </div>

</section>

<?php require "includes/footer.php"; ?>