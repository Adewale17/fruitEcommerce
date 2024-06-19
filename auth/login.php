<?php require "../includes/header.php";
require_once "../config/config.php";

$error_message = array();
$success_message = array();
if(isset($_POST['submit'])){
    if(empty($_POST['email']) OR empty($_POST['password'])){
        array_push($error_message, "One or more column is empty");
    }else{
        $email = $_POST['email'];
        $password = $_POST['password'];
  
        $login = $conn->query("SELECT * FROM users WHERE email = '$email'");
        $login->execute();
  
        $fetch = $login->fetch(PDO::FETCH_ASSOC);
        if($login->rowCount() > 0 ){
            if(password_verify($password, $fetch['password'])){
              

                $_SESSION['username'] = $fetch['username'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['user_id'] = $fetch['id'];

                echo '<meta http-equiv="refresh" content="0;url=http://localhost/fruits/index.php">';
            


            }else{
                array_push($error_message, "Incorrect Email or Password");
            }
            
        }else{
          array_push($error_message, "Incorrect Email or Password");
        }
    }
  }
?>

<section class="contact" style="margin-top: 5%;">

    <div class="row">

        <form action="login.php" method="post">
        <?php require "../includes/error.php"; ?>

            <h3 style="text-align: center;" >Login Here</h3>
            <div class="inputBox">
                <input type="text" name="email" placeholder="enter your email" class="box">
                <input type="password" name="password" placeholder="enter your password" class="box">
            </div>
            <div style="text-align: center;"> <input type="submit" name="submit" value="login" class="btn ">
     
            <span style="font-size: medium;">Don't have an account </span> <a href="http://localhost/fruits/auth/register.php" style="font-size: medium;">Register here</a>
            </div>

        </form>

    </div>

</section>

<?php require "../includes/footer.php"; ?>
