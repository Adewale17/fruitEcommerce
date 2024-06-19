<?php
    require  "includes/header.php";
    require "config/config.php";


    // $categories = $conn->query("SELECT * FROM categories");
    // $categories->execute();
    // $allcategories = $categories->fetchAll(PDO::FETCH_OBJ);

    // $products = $conn->query("SELECT * FROM products");
    // $products->execute();
    // $fetchproducts = $products->fetchAll(PDO::FETCH_OBJ);

    
    // search
    $allsearch = array(); 
    $allcategorys = array();
    if(isset($_GET['search'])){
        $search = $_GET['search']; 
        $query = $conn->prepare("SELECT * FROM products WHERE name LIKE :search OR price LIKE :search OR description LIKE :search");
        $query->execute(array(':search' => "%$search%"));
        $allsearch = $query->fetchAll(PDO::FETCH_OBJ);

        //search Category
        $searchCategory = $_GET['search']; 
        $Categoryquery = $conn->prepare("SELECT * FROM categories WHERE name LIKE :search");
        $Categoryquery->execute(array(':search' => "%$searchCategory%"));
        $allcategorys = $Categoryquery->fetchAll(PDO::FETCH_OBJ);
        
    } else {
        header("Location: http://localhost/fruits/index.php");
        exit();
    }
    
    
?>



<!-- header section ends -->

<div class="heading">
    <h1>our shop</h1>
    <p> <a href="index.php">home >></a> shop </p>
</div>
<section class="category">


    <div class="box-container">
    <?php foreach( $allcategorys as $allcategory): ?>
        <a href="#" class="box">
            <img src="image/<?php echo $allcategory->image; ?>" alt="">
            <h3><?php echo $allcategory->name; ?></h3>
        </a>
        <?php endforeach; ?>
    </div>
    

</section>


<section class="products">

    <h1 class="title"> our <span>products</span> <a href="http://localhost/fruits/view-all.php">view all >></a> </h1>
    <?php if($query->rowCount() < 1): ?>
        <div>
            <h2 style="font-size:500%; color:red; ">Record not found</h2>
        </div>
    <?php endif; ?>
    <div class="box-container">
        <?php foreach($allsearch as $fetchproduct): ?>
        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/<?php echo $fetchproduct->image;?>" alt="">
            </div>
            <div class="content">
                <h3><?php echo $fetchproduct->name;?></h3>
                <div class="price">#<?php echo $fetchproduct->price;?></div>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                
            </div>
           
        </div>
        <?php endforeach; ?>

       
    </div>

</section>

<?php require "includes/footer.php"; ?>