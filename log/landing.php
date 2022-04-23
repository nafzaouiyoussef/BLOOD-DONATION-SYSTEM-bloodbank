<?php
include 'config.php';

session_start();

error_reporting(0);

if(isset($_SESSION["user_id"])){
  header('location:../pages/index.php');
}

if(isset($_POST['signup'])){
  $full_name = mysqli_real_escape_string($conn,$_POST["signup_full_name"]);
  $email = mysqli_real_escape_string($conn,$_POST["signup_email"]);
  $password = mysqli_real_escape_string($conn,md5($_POST["signup_password"]));
  $cpassword = mysqli_real_escape_string($conn,md5($_POST["signup_cpassword"]));

  $check_email = mysqli_num_rows(mysqli_query($conn,"SELECT email FROM users WHERE email='$email' "));
  /*si password not match with this password*/ 
if($password !== $cpassword) {
   echo"<script>alert('password did not match.');</script>";
      } elseif($check_email > 0){
        echo"<script>alert('email already exist.');</script>";
      }else{
         $sql = "INSERT INTO users ( full_name, email, password) VALUES('$full_name','$email','$password')";
         $result = mysqli_query($conn,$sql);
         if($result){
          $_POST["signup_full_name"]= "";
          $_POST["signup_email"]= "";
          $_POST["signup_password"]= "";
          $_POST["signup_cpassword"]= "";
          echo"<script>alert('user registration succesfully.');</script>";
         }else{
          echo"<script>alert('user registration faild.');</script>";
         }
      }

}
/*signin php*/

if(isset($_POST['signin'])){

  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn,md5($_POST["password"]));

 
  $check_email = mysqli_query($conn,"SELECT id, usertype FROM users WHERE email='$email'AND password='$password'");
  /*si password not match with this password*/ 


         if(mysqli_num_rows($check_email) > 0) {
           $row = mysqli_fetch_assoc($check_email);
            $_SESSION["user_id"]= $row['id'];
            $_SESSION["user_usertype"]=$row['usertype'];
            if($row["usertype"]=="admin")
            {
              header('location:../pages/index.php');
            }
            elseif($row["usertype"]=="user")
            {
            header('location:../userlog/index.php');
           }
         }else{
          echo"<script>alert('login details are incorrect. please try again');</script>";
         }
      }


 
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" type="x-icon" href="favicon.ico">
    <title>IDONOR CONNEXION</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">


          <!-- sign-in-form -->
          <form action="" method="post" class="sign-in-form">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="email" value="<?php echo $_POST["email"];?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" value="<?php echo $_POST["password"];?>" required />
            </div>
            <input type="submit" value="Login" name="signin"  class="btn solid" />
            <p class="social-text">Contact Us</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <!-- end sign-in-form -->


          <!-- sign-up-form -->
          <form action="#" class="sign-up-form" method="post">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="signup_full_name" value="<?php echo $_POST["signup_full_name"];?>" required/>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="signup_email" value="<?php echo $_POST["signup_email"];?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="signup_password" value="<?php echo $_POST["signup_password"];?>" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="confirm Password" name="signup_cpassword" value="<?php echo $_POST["signup_cpassword"];?>" required />
            </div>
            <input type="submit" class="btn" name="signup" value="Sign up" />
            <p class="social-text">Contact Us</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
          <!-- end sign-up-form -->
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
             Make your first move to be one of us :
             <br>
             Life Saver
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
            Hurry up we are waiting for you
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="app.js"></script>
  </body>
</html>
