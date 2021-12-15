<?php
require_once "db.php";

include_once ("it.php");
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
<body>
    <!-- (Navigation bar here) -->
    <nav class="navbar navbar-expand-sm navbar-light sticky-top">
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
          <a class="nav-link" href="http://localhost/Project_work/sign_in.php"><b>Sign In</b></a>
        </li>
        <li class="nav-item do">
            <a class="nav-link" href="#"><b>Contact us</b></a>
          </li>
      </ul>
    </div>

    <div class="text-center justify-content-center">
<a href="http://localhost/Project_work/login.php" class="boxed-btn2 bg-dark">
    Log In
</a>
</div>
      
    </nav> 
    
    <div class="container-fluid bgimage">
    <p class="first-slider-text text-center">
        For The World of Innovation
     </p>

     <p class="second-slider-text text-center">
         bringing the latest technology into all Africans reach!
</p>

<div class="text-center justify-content-center">
<a href="http://localhost/Project_work/sign_in.php" class="boxed-btn">
    Get Started
</a>
</div>


  </div>

  <div class="container pt-4">
    <div class="row">
    <div class="col-md-4">
      <?php
        if(! $ict_content){ 
      ?>
    <h3> <?php  echo $results['category'];?>
    </h3>
     <p> <?php
    echo $results['postupdate'];
    ?></p>
     <?php } 
     
     else{
       ?>
       <p style="color:red;">
         <?php
          echo "No data is available";
         ?>
       </P>
    <?php } ?>

    
</div>

<div class="col-md-4">
  <?php 
  if(! $inform_content){
  ?>
 <h3>
    <?php
   echo $results_two['category']; ?>
  </h3>
  <p>
 <?php
   echo $results_two['postupdate'];
   ?>
   </P>
<?php
 }
  else{
?>
<p style="color:red;">
<?php
   echo "No data available";
  }?>

</P>
        
</div>

<div class="col-md-4">
  <?php 
  if(!  $our_com_content ){
  ?>
 <h3>
    <?php
   echo $results_three['category']; ?>
  </h3>
  <p>
 <?php
   echo $results_three['postupdate'];
   ?>
   </P>
<?php
 }
  else{
?>
<p style="color:red;">
<?php
   echo "No data available";
  }?>

</P>
        
</div>
</div>

<!-- ============================================================= Footer here ===============================  -->

<div class="footer text-center" style="margin-bottom:0">
 <div class="row">
    <div class="col-md-4">
    <h4 class="footer_title">Asks</h4>
    <ul class="list-group ">
  <li class="list-group-item "><a class="footer-link" href="">How to retrieve passwword</a></li>
  <li class="list-group-item"><a class="footer-link" href="">How unlock account</a></li>
  <li class="list-group-item"><a class="footer-link" href="">How to fix uncoonecting issues</a></li>
</ul>
</div>

<div class="col-md-4">
    <h4 class="footer_title">Navigation</h4>
    <ul class="list-group ">
    <li class="list-group-item "><a class="footer-link" href="">Log In</a></li>
  <li class="list-group-item"><a class="footer-link" href="">Sign In</a></li>
  <li class="list-group-item"><a class="footer-link" href="">Contact</a></li>
</ul>
</div>

<div class="col-md-4 pt-5">
    <p class="copyright">Copyright: All rights reserved | This template is made by DMSCONSULTS</p>
</div>
</div></div>





    <script src="jquery.js"></script>
    <script src="popper.js"></script>
    <script src="bootstrap.min.js"></script>
</body>
</html>