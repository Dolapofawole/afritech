<?php
session_start();

// if($_SESSION['username']){

//     echo "Welcome to our website ". $_SESSION['username'];
   
   

//    };

$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="school";
if(! $db = mysqli_connect($servername, $dbusername, $dbpassword, $dbname)){
  echo "unable to connect to the data base";
}



$errors=[];
$success=[];
if(isset($_POST['submit'])){
  if(empty(($_POST['text']))){
    $errors['text_error']="Enter the textarea";
  }

  else{
    $text = $_POST['text'];
  }
  if(empty(($_POST['category']))){
    $errors['category_error']="Enter the category";
  }

  else{
    $category = $_POST['category'];
  }


if(! $errors){
 $sql = "INSERT INTO post(category, postupdate) values('$category', '$text')";
if(mysqli_query($db, $sql)){
  $success['success_msg']="submiited Successfully";

} 

}}
   
?> 

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="...css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body style="background-color:#0032;">
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

    <div class="text-center justify-content-center">
<a href="http://localhost/Project_work/login.php" class="boxed-btn2">
    Log out
</a>
</div>
      
    </nav> 

<div class="container">
<div class="col-md-6 offset-md-3">
<?php
if(isset($_POST['submit'])){
  ?>
  <div class="alert alert-success text-center">
  <?php
  if(array_key_exists('success_msg', $success)){
    echo $success['success_msg'];
  
  }

  ?>

  </div>
<?php } ?>




</div>


<div class="form-group">
  <form method="post" action="admin.php" type="text" >
  <label for="usr"><h1>Categories</h1></label>
    
    <select class="form-control dropdown-toggle" type="text"  data-toggle="dropdown" name="category">
    <option href="#">Why ICT</option>
    <option href="#">Our Community</option>
    <option  href="#">Get Inform</option>
</select></div>


  <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
  <span class="text-danger">
  <?php
  if(array_key_exists('text_error', $errors)){
    echo $errors['text_error'];
  }

  ?>
  
  </span>

  <input type="submit" class="form-control" name="submit">
</form>
  

</div>

<!-- <div class="form-group">
<label for="usr"><h1>Categories</h1></label>
    <select class="form-control">
      <option>Why IT</option>
      <option>Our Community</option>
      <option>Get Inform</option>
    </select>
  </div> -->

</div>


<script src="jquery.js"></script>
<script src="popper.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>