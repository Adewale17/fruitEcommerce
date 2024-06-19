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

  $category = $conn->query("SELECT * FROM categories WHERE id = '$id'");
  $category->execute();
  $fetchedCategory = $category->fetch(PDO::FETCH_OBJ);
  if(isset($_POST['submit'])){
    if(empty($_POST['name'])){
      array_push($error_message, "Column is empty");
    }else{
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $dir = "../../image".basename($image);

    $query = $conn->prepare("UPDATE categories SET name = :name, image = :image WHERE id = '$id'");
    $query->execute(["name" => $name,"image"=>$image]);
  
    echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/categories-admins/show-categories.php">';
  }
}

}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Update Categories</h5>
        <form method="POST" action="" enctype="multipart/form-data">
          <!-- Email input -->
          <?php require "../../includes/error.php"; ?>
          <div class="form-outline mb-4 mt-4">
            <input value="<?php echo $fetchedCategory->name; ?>" type="text" name="name" id="form2Example1" class="form-control"/>
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