<?php
$servername="localhost";
$dbusername ='root';
$password ="";
$dbname="school";
 if (! $db = mysqli_connect($servername, $dbusername, $password, $dbname)){
     die('Unable to connect to the database');
 }

?>