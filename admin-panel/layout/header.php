<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Admin Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
     <link href="http://localhost/fruits/admin-panel/styles/style.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
      <div class="container">
        <?php if(isset($_SESSION['username'])): ?>
      <a class="navbar-brand" href="#">LOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav side-nav" >
            
          <li class="nav-item">
            <a class="nav-link text-white" style="margin-left: 20px;" href="http://localhost/fruits/admin-panel/admins/admins.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/fruits/admin-panel/admins/admins.php" style="margin-left: 20px;">Admins</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/fruits/admin-panel/categories-admins/show-categories.php" style="margin-left: 20px;">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/fruits/admin-panel/products/show-products.php" style="margin-left: 20px;">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="http://localhost/fruits/admin-panel/orders/orders-list" style="margin-left: 20px;">Orders</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-md-auto d-md-flex">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
    
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo $_SESSION['username']; ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="http://localhost/fruits/admin-panel/admins/logout-admins.php">Logout</a>
              
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link  fs-32" href="admins/login-admins.php" style="font-size: larger;">LOGIN
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <?php endif;?>
                          
          
        </ul>
      </div>
    </div>
    </nav>
    <div class="container-fluid">
    </div>