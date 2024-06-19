<?php
require "../layout/header.php";
require "../../config/config.php";

$products = $conn->query("SELECT * FROM products");
$products->execute();
$allproducts = $products->fetchAll(PDO::FETCH_OBJ);
?>
          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Products</h5>
              <a href="http://localhost/fruits/admin-panel/products/create-product.php" class="btn btn-primary mb-4 text-center float-right">Add New Product</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">delete</th>
                    <th scope="col">Update</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allproducts as $allproduct): ?>
                  <tr>
                    <th scope="row"><?php echo $allproduct->id;?> </th>
                    <td><?php echo $allproduct->name;?> </td>
                    <td>#<?php echo $allproduct->price;?> </td>
                    <td><?php echo $allproduct->description;?> </td>
                    <td><img style="width: 40%;" src="../../image/<?php echo $allproduct->image;  ?>" alt=""></td>
                    
                     <td><a href="http://localhost/fruits/admin-panel/products/delete-products.php?id=<?php echo $allproduct->id; ?>" 
                     onclick="return confirm('Are you sure you want to delete product?')" class="btn btn-danger  text-center ">delete</a></td>
                     <td><a href="http://localhost/fruits/admin-panel/products/update-products.php?id=<?php echo $allproduct->id; ?>" class="btn btn-success  text-center ">update</a></td>
                  </tr>
                  <?php endforeach?>
                 
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>

<?php  require "../layout/footer.php";?>