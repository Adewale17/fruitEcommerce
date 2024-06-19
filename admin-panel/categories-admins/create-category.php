<?php

require "../layout/header.php";
require "../../config/config.php";

if (!isset($_SESSION['username'])) {
  echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/admins/login-admins.php">';
}

if(isset($_POST['submit'])){
  if(empty($_POST['name']) OR empty($_FILES['image'])){
    array_push($error_message, "name or image  is empty");
  }else{
  $name = $_POST['name'];
  $image = $_FILES['image']['name'];
  $dir = "../../image".basename($image);

  $query = $conn->prepare("INSERT INTO categories (name, image) VALUES (:name, :image)");
  $query->execute(["name" => $name,"image"=>$image]);

  echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/categories-admins/show-categories.php">';
}
}


?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-5 d-inline">Create Categories</h5>
        <form method="POST" action="" enctype="multipart/form-data">
          <!-- Email input -->
          <div class="form-outline mb-4 mt-4">
            <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />

          </div>
          <div class="form-outline mb-4 mt-4">
            <input type="file" name="image" id="form2Example1" class="form-control"/>
          </div>
          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>


        </form>

      </div>
    </div>
  </div>
</div>

<?php require "../layout/footer.php"; ?>