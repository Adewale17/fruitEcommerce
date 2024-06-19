<?php require "../layout/header.php"; ?>
<?php require "../../config/config.php"; ?>
<?php

if (!isset($_SESSION['username'])) {
  echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/admins/login-admins.php">';
}

$error_message = array();
$success_message = array();
if(isset($_GET['id'])){
  $id = $_GET['id'];

  $products = $conn->query("SELECT * FROM products WHERE id = '$id'");
  $products->execute();
  $fetchedproducts = $products->fetch(PDO::FETCH_OBJ);
  if(isset($_POST['submit'])){
    if(empty($_POST['name']) OR empty($_POST['price']) OR empty($_POST['description'])){
      array_push($error_message, "One or more column is empty");
    }else{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $dir = "../../image".basename($image);


    $query = $conn->prepare("UPDATE products SET name = :name, price = :price, description = :description, image = :image WHERE id = :id");

// Bind the values to the placeholders
        $query->execute([
    "name" => $name,
    "price" => $price,
    "description" => $description,
    "image" => $image,
    "id" => $id
]);

  
    echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/products/show-products.php">';
  }
}

}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Products</h5>
        <form method="POST" action="" enctype="multipart/form-data">
          <!-- Email input -->
          <?php require "../../includes/error.php"; ?>
          <div class="form-outline mb-4 mt-4">
            <input value="<?php echo $fetchedproducts->name; ?>" type="text" name="name" id="form2Example1" class="form-control"/>
          </div>
          <div class="form-outline mb-4 mt-4">
            <input value="<?php echo $fetchedproducts->price; ?>" type="number" name="price" id="form2Example1" class="form-control"/>
          </div>
          <div class="form-outline mb-4 mt-4">
            <input value="<?php echo $fetchedproducts->description; ?>" type="text" name="description" id="form2Example1" class="form-control"/>
          </div>
      
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="image" id="form2Example1" class="form-control"/>
          </div>
      


          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>


        </form>

      </div>
    </div>
  </div>
</div>
<?php require "../layout /footer.php"; ?>