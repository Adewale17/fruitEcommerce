<?php

  require "../layout/header.php";
  require "../../config/config.php";
  $error_message = array();
  $success_message = array();
  if (isset($_POST['submit'])) {
    if (empty($_POST['email']) or empty($_POST['password'])) {
      array_push($error_message, "One or more column is empty");
    } else {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $login = $conn->query("SELECT * FROM admins WHERE email = '$email'");
      $login->execute();

      $fetch = $login->fetch(PDO::FETCH_ASSOC);
      if ($login->rowCount() > 0) {
        if (password_verify($password, $fetch['password'])) {


          $_SESSION['username'] = $fetch['username'];
          $_SESSION['email'] = $fetch['email'];
          $_SESSION['user_id'] = $fetch['id'];

          echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/index.php">';
        } else {
          array_push($error_message, "Incorrect Email or Password");
        }
      } else {
        array_push($error_message, "Incorrect Email or Password");
      }
  }
}
?>
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title mt-5">ADMIN LOGIN</h5>
        <?php require "../../includes/error.php"; ?>

        <form method="POST" class="p-auto" action="login-admins.php">

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />

          </div>


          <!-- Password input -->
          <div class="form-outline mb-4">
            <input type="password" name="password" id="form2Example2" placeholder="Password" class="form-control" />

          </div>



          <!-- Submit button -->
          <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Login</button>


        </form>

      </div>
    </div>
  </div>
</div>
</div>