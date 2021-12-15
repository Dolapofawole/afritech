<?php
include_once "db.php";

$errors=[];
$success=[];

if (isset($_POST['submit'])){

if(empty(($_POST['fullname']))){
$errors["fullname_error"] = "your name is required";
 
}
elseif(!preg_match("/^[a-zA-Z ]*$/",$_POST['fullname'])) {
  
$errors["fullname_error"] = "check your name, Only letters and white space allowed";

}

else{
    $fullname = $_POST["fullname"];

}

if(empty(($_POST['email']))){
    $errors["email_error"] = "your email is required";
}
elseif((!filter_var(($_POST['email']), FILTER_VALIDATE_EMAIL ))) {
  
  $errors["email_error"] ="Invalid email format";
}

else{

    $mail = $_POST["email"];

    $sql= "SELECT email from users Where email='$mail'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0 )
    {
      $errors["email_error"] ="Email is already exist";
    }
    else {
          $email=$_POST["email"];
    }

}
if(empty(($_POST['phone']))){
$errors["phone_error"] = "your phone number is required";

}

else{
    $ph = $_POST["phone"];
    $sql= "SELECT phone from users Where phone='$ph'";
    $result = mysqli_query($db, $sql);
    if(mysqli_num_rows($result) > 0 )
    {
      $errors["phone_error"] ="Phone number is already exist";
    }
    else {
          $phone=$_POST["phone"];
    }

}

if(empty(($_POST['password']))){
$errors["password_error"] = "your password is rquired";

}

else{
    $password = md5($_POST["password"]) ;

}

 if(! $errors){
  
  $sql ="INSERT INTO users(name, email, phone, password) values('$fullname', '$email', '$phone', '$password')";
  if(mysqli_query($db, $sql)){
     $success["success_msg"] = "Details submitted succefully"; 

    }
   
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

    <style>
      body{
        background-image:url('image/sign_in_bgr.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        
    
      }
      .first-head{
        padding-top:100px;
      }

    </style>
</head>
<body>
  <!-- (Navigation bar here) -->
  <nav class="navbar navbar-expand-sm navbar-dark  sticky-top" style="background-color:white;">
        <!-- Navbar text-->
      <span class="navbar-text pl-4">
        AFRITECH
        </span>
        <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
      <!-- Links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item do">
          <a class="nav-link" href="http://localhost/Project_work/index.php"><b>Home</b></a>
        </li>
        <li class="nav-item do">
          <a class="nav-link" href="http://localhost/Project_work/sign_in.php"><b>Sign In<b></a>
        </li>
        <li class="nav-item do">
            <a class="nav-link" href="#"><b>Contact us</b></a>
          </li>
      </ul>
    </div>

    
      
    </nav> 

    <!-- ====================================================================================== -->

    <div class="container first-head">

    <div class="col-md-6 offset-md-3">
<?php
if(isset($_POST['submit']) && ! $errors){
  ?>
  <div class="alert alert-success text-center">
  <?php
  if(array_key_exists('success_msg', $success) ){
    echo $success['success_msg'];
  
  }

  ?>

  </div>
<?php } ?>

</div>
               
    <div class="row">
    <div class="col-md-2">
    <!-- <img src="image/image1.JFIF" width="100%", height="auto"> -->
    </div>

    <div class="col-md-8 p-4" style="background-color:rgba(106, 49, 163, 0.658); border-radius:20px;">

    <form method="post" action="sign_in.php" style="color:white;">
    <h3 class="text-center" style="color:white;">Sign In</h3>
    <div class="form-group">
      <label for="email">Full Name:</label>
      <input type="text" class="form-control"  id="name" placeholder="Enter your name" name="fullname" value="<?php if(isset($_POST['submit'])){ $fullname= $_POST["fullname"]; echo $fullname;}?>">
      <span class="text-danger"> 
          <?php
             if(array_key_exists('fullname_error', $errors)){
                echo $errors['fullname_error'];
            }
               
          ?>
      </span>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="" class="form-control"  id="email" placeholder="Enter email" name="email" value="<?php if(isset($_POST['submit'])){ $email = $_POST['email']; echo $email;}?>">
      <span class="text-danger"> 
          <?php
             if(array_key_exists('email_error', $errors)){
                echo $errors['email_error'];
            }
               
          ?>
      </span>
    </div>
    <div class="form-group">
      <label for="email">Phone Number:</label>
      <input type="number" class="form-control"  id="phone" placeholder="Enter phone number" name="phone" value="<?php if(isset($_POST['submit'])){ $phone = $_POST['phone']; echo $phone;}?>">
      <span class="text-danger"> 
          <?php
             if(array_key_exists('phone_error', $errors)){
                echo $errors['phone_error'];
            }
               
          ?>
      </span>
      
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
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
    <button type="submit" name="submit" class="btn btn-dark text-center form-control">Submit</button>
    <div class="text-white text-center">I already have an account <a href="http://localhost/Project_work/login.php" class="text-primary">log in</a></div>
  </form>
</div>

    </div>
</div>
<div class="col-md-2">
    <!-- <img src="image/image1.JFIF" width="100%", height="auto"> -->
    </div>
    
</div>





<script src="/jquery.js"></script>
    <script src="/popper.js"></script>
    <script src="/bootstrap.min.js"></script>
</body>
</html>