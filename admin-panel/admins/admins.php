<?php 

    require "../layout/header.php";
    require "../../config/config.php";

    $query = $conn->query("SELECT * FROM admins");
    $query->execute();
    $allAdmins = $query->fetchAll(PDO::FETCH_OBJ);
?>


          <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">username</th>
                    <th scope="col">email</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($allAdmins as $allAdmin) :?>
                  <tr>
                    <th scope="row"><?php echo $allAdmin->id; ?></th>
                    <td><?php echo $allAdmin->username; ?></td>
                    <td><?php echo  $allAdmin->email; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
<?php require "../layout/footer.php"; ?>
