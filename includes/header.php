<?php

session_start();
require dirname(dirname(__FILE__))."/config/config.php";

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $select_cart = $conn->query("SELECT * FROM carts WHERE user_id ='$user_id'");
    $select_cart->execute();
    $allSelectCart = $select_cart->fetchAll(PDO::FETCH_OBJ);

    //calculate
    $stmt = $conn->query("SELECT * FROM carts where user_id = '$user_id'");
    $cartItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $totalPrice = 0;

    foreach ($cartItems as $cartItem) {
        $itemTotalPrice = $cartItem['quantity'] * $cartItem['product_price'];

        $totalPrice += $itemTotalPrice;
    }
    //amount of item in the cart
    $countCart = $conn->query("SELECT COUNT(*) as noOfCarts FROM carts WHERE user_id ='$user_id'");
    $countCart->execute();
    $allCountCart = $countCart->fetch(PDO::FETCH_OBJ);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>about</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="http://localhost/fruits/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Homeland &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="http://localhost/fruits/fonts/icomoon/style.css">

    <link rel="stylesheet" href="http://localhost/fruits/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/magnific-popup.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/jquery-ui.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/owl.carousel.min.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/mediaelementplayer.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/animate.css">
    <link rel="stylesheet" href="http://localhost/fruitsfonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="http://localhost/fruits/css/fl-bigmug-line.css">


    <link rel="stylesheet" href="http://localhost/fruits/css/aos.css">

    <link rel="stylesheet" href="http://localhost/fruits/css/style.css">


    <link rel="stylesheet" href="http://localhost/fruits/css/aos.css">

    <link rel="stylesheet" href="http://localhost/fruits/css/style.css">

</head>
<style>
    /* body {
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    } */

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        display: block;
        padding: 12px 16px;
        text-decoration: none;
        color: black;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .show {
        display: block;
    }

    /* Responsive Styles */

    /* For small screens */
    @media screen and (max-width: 768px) {
        .dropdown {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }

        .dropdown-content {
            position: static;
            display: none;
        }

        .dropdown-btn {
            width: 100%;
        }

        .show {
            display: block;
        }
    }
</style>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="http://localhost/fruits/index.php" class="logo"> <i class="fas fa-shopping-basket"></i> groco </a>

        <nav class="navbar site-navigation text-right text-md-right" role="navigation">
            <a href="http://localhost/fruits/index.php">Home</a>
            <a href="http://localhost/fruits/shop.php">shop</a>
            <a href="http://localhost/fruits/about.php  ">about</a>
    
    
            <a href="http://localhost/fruits/contact.php">contact</a>
            <div class="dropdown">
                <?php if (isset($_SESSION['username'])) : ?>

                    <button class="dropdown-btn" onclick="toggleDropdown()"><?php echo $_SESSION['username']; ?></button>
                    <div class="dropdown-content" id="dropdownContent">
                        <a href="http://localhost/fruits/auth/logout.php">Logout</a>
                      
                    <?php else : ?>
                    </div>
                    <a href="http://localhost/fruits/auth/login.php">Login</a>
                    <a href="http://localhost/fruits/auth/register.php">Register</a>
                <?php endif; ?>


            </div>


        </nav>

        </div>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <?php if(isset($_SESSION['username'])): ?>
            <div id="cart-btn" class="fas fa-shopping-cart"><?php echo $allCountCart->noOfCarts; ?></div>
            <?php endif; ?>
            <div id="login-btn" class="fas fa-ser"></div>
        </div>

        <form action="search.php" class="search-form" method="get">
            <input type="search" name="search" placeholder="search here..." id="search-box">

            <label for="search-box" class="fas fa-search"></label>
        </form>

        <div class="shopping-cart">
            <?php foreach ($allSelectCart as $carts) : ?>
                <div class="box">
                    <a href="delete-cart.php?id=<?php echo $carts->id; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a>
                    <img src="image/<?php echo $carts->product_image; ?>" alt="">
                    <div class="content">
                        <h3><?php echo $carts->product_name; ?></h3>
                        <span class="quantity"><?php echo $carts->quantity; ?></span>
                        <span class="multiply">x</span>
                        <span class="price">#<?php echo $carts->product_price; ?></span>
                    </div>

                </div>

            <?php endforeach; ?>
            <a href="delete-cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a>
            <h3 class="total"> total : <span><?php echo  $totalPrice; ?></span> </h3>
            <a href="#" class="btn">checkout cart</a>
        </div>

    

        <!-- <form action="" class="login-form">
        <h3>login form</h3>
        <input type="email" placeholder="enter your email" class="box">
        <input type="password" placeholder="enter your password" class="box">
        <div class="remember">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" value="login now" class="btn">
        <p>forget password? <a href="#">click here</a></p>
        <p>don't have an account? <a href="#">create one</a></p>
    </form> -->
    </header>

    <!-- header section ends -->