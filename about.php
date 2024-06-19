<?php 

 require "includes/header.php";
 require "config/config.php"; 


    
    $products = $conn->query("SELECT * FROM products");
    $products->execute();
    $fetchproducts = $products->fetchAll(PDO::FETCH_OBJ);

?>

<!-- header section ends -->

<div class="heading">
    <h1>about us</h1>
    <p> <a href="http://localhost/fruits/index.php">home >></a> about </p>
</div>

<section class="about">

    <div class="image">
        <img src="image/about-img.jpg" alt="">
    </div>

    <div class="content">
        <span>welcome to our shop</span>
        <h3>fresh and organic groceries</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae vel sequi nostrum quae nobis non quaerat nisi voluptatibus recusandae reprehenderit tempore eligendi, eum quibusdam perferendis dicta, incidunt dolores nemo ex.</p>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quidem cumque molestiae blanditiis deleniti aspernatur, ab tempora quisquam sapiente commodi hic.</p>
        <a href="#" class="btn">read more</a>
    </div>

</section>

<section class="gallery">

    <h1 class="title"> our <span>gallery</span> <a href="http://localhost/fruits/shop.php">view all >></a> </h1>

    <div class="box-container">
        <?php foreach($fetchproducts as $fetchproduct): ?>
        <div class="box">
            <img src="image/<?php echo $fetchproduct->image; ?>" alt="">
            <div class="icons">
                <a href="#" class="fas fa-eye"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-share-alt"></a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</section>

<?php require "includes/footer.php"; ?>
