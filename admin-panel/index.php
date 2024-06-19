<?php 

    require "layout/header.php";
    require "../config/config.php";

    //product count
    $product_count = $conn->query("SELECT COUNT(*) as product_count FROM products");
    $product_count->execute();
    $allProductCount = $product_count->fetch(PDO::FETCH_OBJ);
    // Category count
    $category_count = $conn->query("SELECT COUNT(*) as category_count FROM categories");
    $category_count->execute();
    $allcategoryCount = $category_count->fetch(PDO::FETCH_OBJ);
    // Admins count
    $admins_count = $conn->query("SELECT COUNT(*) as admins_count FROM admins");
    $admins_count->execute();
    $allAdminCount = $admins_count->fetch(PDO::FETCH_OBJ);

?>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Products</h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
        <p class="card-text">number of topics: <?php echo $allProductCount->product_count; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Categories</h5>

        <p class="card-text">number of categories: <?php echo $allcategoryCount->category_count; ?></p>

      </div>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>

        <p class="card-text">number of admins: <?php echo $allAdminCount->admins_count; ?></p>

      </div>
    </div>
  </div>
  <!-- <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Replies</h5>

        <p class="card-text">number of replies: 3</p>

      </div>
    </div>
  </div> -->
</div>
<!--  <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
<?php require "layout/footer.php"; ?>
