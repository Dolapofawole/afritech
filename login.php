<?php
session_start();
$servername="localhost";
$dbusername ='root';
$password ="";
$dbname="school";

 if (! $db = mysqli_connect($servername, $dbusername, $password, $dbname)){
     die('Unable to connect to the database');
 }

$errors=[];
if (isset($_POST['submit'])){

if(empty(($_POST['email']))){
    $errors["email_error"] = "your email is required";
}
elseif((!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL ))) {
  
  $errors["email_error"] ="Invalid email format";
}

else{
    $email = $_POST["email"];

}

if(empty(($_POST['password']))){
$errors["password_error"] = "your password is required";

}

else{
    $password = md5($_POST["password"]) ;

}
if(! $errors){
  
 $sql ="SELECT * FROM users WHERE email='$email' AND password='$password'";
 $select = mysqli_query($db, $sql);
  if(mysqli_num_rows($select) < 1){
    $errors["log_in_error"] ="Invalid details";

   

  }
  else{
    $results= mysqli_fetch_array($select);
   $username =  $results['name'] . "<br/>";
   $useremail = $results['email'];
  }

 
}

if(! $errors){
  $_SESSION['username']=$username;
  header('location:admin.php');  

}
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="...css/all.min.css">
    <link rel="stylesheet" href="style.css">



</head>
<body style="background-color:#0032;">
<!-- (Navigation bar here) -->
<nav class="navbar navbar-expand-sm navbar-dark sticky-top" style="background-color:white;">
        <!-- Navbar text-->
      <span class="navbar-text pl-4">
        AFRITECH
        </span>
        <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
      <!-- Links -->
      <div class="collapse  navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item do">
          <a class="nav-link" href="http://localhost/Project_work/index.php"><b>Home</b></a>
        </li>
        <li class="nav-item do">
          <a class="nav-link" href="http://localhost/Project_work/sign_in.php"><b>Sign In</b></a>
        </li>
        <li class="nav-item do">
            <a class="nav-link" href="#"><b>Contact us</b></a>
          </li>
      </ul>
    </div>

    <div class="text-center justify-content-center">
<a href="http://localhost/Project_work/login.php" class="boxed-btn2">
    Log In
</a>
</div>
      
    </nav> 

    <!-- ============================================================================================================== -->

<div class="container">
<div class="col-md-6 offset-md-3">
      <?php
      if(isset($_POST["submit"]) AND $errors){
        ?>
        <div class="alert alert-danger text-center">
          

          <?php
           if(array_key_exists('log_in_error', $errors)){
            echo $errors['log_in_error'];
        }
           
          ?>
      </div>
      <?php } ?>



      

</div>
    <div class="row">
    <div class="col-md-4 pt-5 pr-0">
    <!-- <img src="developer-team.jpg" width="100%" height="400px"> -->
</div>
<div class="col-md-4 pt-5 pr-0">
  <div class="pt-5 p-3 border border-success " style="border-radius:15px">
  <h2 class="text-center text-dark"><b>Log In</b></h2>
  <form action="login.php" method="post">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="" class="form-control" id="email" placeholder="Enter email" name="email"value="<?php if(isset($_POST['submit'])){ $email = $_POST['email']; echo $email;}?>" >
      <span class="text-danger"> 
          <?php
             if(array_key_exists('email_error', $errors)){
                echo $errors['email_error'];
            }
               
          ?>
      </span>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?php if(isset($_POST['submit'])){ $password = $_POST['password']; echo $password;}?>">
      <span class="text-danger"> 
          <?php
             if(array_key_exists('password_error', $errors)){
                echo $errors['password_error'];
            }
               
          ?>
      </span>
    </div>
    <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button style="width:100%;" type="submit" name="submit" class="btn btn-primary text-center justify-content-center">Log In</button>
  </form>
</div></div></div>
<div class="col-md-4 pt-5 pr-0">
    <!-- <img src="developer-team.jpg" width="100%" height="400px"> -->
</div>
</div>






<script src="/jquery.js"></script>
    <script src="/popper.js"></script>
    <script src="/bootstrap.min.js"></script>
</body>
</html>