<?php 

    require "../includes/header.php"; 
    require_once "../config/config.php";
    //session validation for register page 

    $error_message = array();
    $success_message = array();
    //register session
    if (isset($_POST['submit'])) {
  
        if (empty($_POST["username"]) or empty($_POST["email"]) or empty($_POST["phone"])or empty($_POST["password"])) {
            array_push($error_message, "one or more column is empty");
        } else {
            $username = $_POST["username"];
            $email = $_POST["email"];
            $phone = $_POST['phone'];
            $password = $_POST['password'];
  
            //check email availability
  
            $email_check = $conn->query("SELECT * FROM users WHERE email = '$email'");
            $email_check->execute();
            $email_count = $email_check->rowCount();
            if ($email_count > 0) {
                array_push($error_message, "$email already exist");
            }
           
  
            //check username availability
            $usernameCheck = $conn->query("SELECT * FROM users WHERE username = '$username'");
            $usernameCheck->execute();
            $username_count = $usernameCheck->rowCount();
            if ($username_count > 0) {
                array_push($error_message, "$username already exist");
            }
             //check  phone 
             $phone_check = $conn->query("SELECT * FROM users WHERE email = '$email'");
             $phone_check->execute();
             $phone_count = $phone_check->rowCount();
             if ($phone_count > 0) {
                 array_push($error_message, "$phone  already exist");
             }
            //insert query
            if (count($error_message) < 1) {
                $register = $conn->prepare("INSERT INTO users (username, email, phone,  password) VALUES (:username, :email, :phone, :password)");
               
                    $register->execute([
                        ":username" => $username,
                        ":email" => $email,
                        ":phone"=> $phone,
                        ":password" => password_hash($password,PASSWORD_DEFAULT)
                    ]);
     
                echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/auth/login.php">';
            }else{
                array_push($error_message, "Something went wrong");

            }

        }
  }
  

?>





<section class="contact" style="margin-top: 5%;">


    <div class="row ">

        <form action="" method="post">
            <?php require "../includes/error.php"; ?>
            <h3 style="text-align: center;">Register Here</h3>
            <div class="inputBox">

                <input type="text" name="username" placeholder="enter your username" class="box">
                <input type="email" name="email" placeholder="enter your email" class="box">
                <input type="text" name="phone" placeholder="enter your phone number" class="box">
                <input type="text" name="password" placeholder="enter your Password" class="box">
               
            </div>

            <div style="text-align: center;"> <input type="submit" name="submit" value="Register" class="btn ">
            <span style="font-size: medium;">already have an account </span> <a href="http://localhost/fruits/auth/login.php" style="font-size: medium;">Login here</a>
            </div>

        </form>

    </div>

</section>

<?php require "../includes/footer.php"; ?>