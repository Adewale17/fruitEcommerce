<?php

require "../layout/header.php";
require "../../config/config.php";

$categories = $conn->query("SELECT * FROM categories");
$categories->execute();
$allcategories = $categories->fetchAll(PDO::FETCH_OBJ);
?>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mb-4 d-inline">Categories</h5>
        <a href="http://localhost/fruits/admin-panel/categories-admins/create-category.php" class="btn btn-primary mb-4 text-center float-right">Create Categories</a>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">S/N</th>
              <th scope="col">name</th>
              <th scope="col">image</th>

              <th scope="col">update</th>
              <th scope="col">delete</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($allcategories as $allcategory) : ?>
            <tr>
              <th scope="row"><?php echo $allcategory->id; ?></th>
              <td><?php echo $allcategory->name; ?></td>
              <td><img style="width: 40%;" src="../../image/<?php echo $allcategory->image;  ?>" alt=""></td>
              <td><a href="http://localhost/fruits/admin-panel/categories-admins/update-category.php?id=<?php echo $allcategory->id; ?>" class="btn btn-warning text-white text-center ">Update Categories</a></td>
              <td><a href="http://localhost/fruits/admin-panel/categories-admins/delete-category.php?id=<?php echo $allcategory->id; ?>" 
              onclick="return confirm('Are you sure you want to delete category?')" class="btn btn-danger  text-center ">Delete Categories</a></td>
            </tr>
            <?php endforeach; ?>
            
        </table>
      </div>
    </div>
  </div>
</div>

<?php require "../layout/footer.php"; ?>
