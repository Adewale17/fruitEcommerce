<?php

require "../layout/header.php";
require "../../config/config.php";


if (!isset($_SESSION['username'])) {
  echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/admins/login-admins.php">';
}
    $error_message = array();
    $success_message = array();
    if (isset($_POST['submit'])) {

      if (empty($_POST['username']) or empty($_POST['email']) or empty($_POST['password'])) {
        array_push($error_message, "One or more column field is empty");
      } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        //No repetition of email

        $query = $conn->query("SELECT * FROM admins WHERE email = '$email'");
        $query->execute();
        $email_count = $query->rowCount();
        if ($email_count > 0) {
          // var_dump("test");
          array_push($error_message, " $email  already exist");
        }
        //No repetition of username
        $query = $conn->query("SELECT * FROM admins WHERE username = '$username'");
        $query->execute();
        $username_count = $query->rowCount();
        if ($username_count > 0) {
          // var_dump("test");
          array_push($error_message, " $username  already exist");
        }

        if (count($error_message) < 1) {
          $insert = $conn->prepare("INSERT INTO admins (email, username, password) VALUES(:email, :username,:password)");
          $insert->execute([
              ":email" => $email,
              ":username" => $username,
              ":password" => $password,
          ]);

     echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/admin-panel/admins/login-admins.php">';

        } 
      }
    }



?>

       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Admins</h5>
          <form method="POST" action="create-admins.php" enctype="multipart/form-data">
          <?php require "../../includes/error.php"; ?>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" name="username" id="form2Example1" class="form-control" placeholder="username" />
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="email" name="email" id="form2Example1" class="form-control" placeholder="email" />
                 
                </div>

               
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form2Example1" class="form-control" placeholder="password" />
                </div>

               
            
                
              


                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
<script type="text/javascript">

</script>
</body>
</html>