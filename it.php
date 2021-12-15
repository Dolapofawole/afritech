<?php
 $inform_content = $ict_content = $our_com_content  =false;

$sql = "SELECT * FROM post where category='Why ICT' Order By id DESC ";


$select = mysqli_query($db, $sql);
if(mysqli_num_rows($select) < 1){

$ict_content ="No data available";
}

else{
    $results = mysqli_fetch_array($select);
}

$sql_two = "SELECT * FROM post where category='Get Inform' Order By id DESC ";
$select_two = mysqli_query($db, $sql_two);
if(mysqli_num_rows($select_two) < 1){
    $inform_content = "No data available";

}
else{ 
$results_two = mysqli_fetch_array($select_two);


}

$sql_three = "SELECT * FROM post where category='Our Community' Order By id DESC";
$select_three = mysqli_query($db, $sql_three);
if(mysqli_num_rows($select_three) < 1){
    $our_com_content = "No data available";
} 
else{
$results_three = mysqli_fetch_array($select_three);
}

?>