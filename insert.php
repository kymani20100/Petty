<?php 
$connect = mysqli_connect("localhost", "root", "password", "library");
$sql = "INSERT INTO tbl_sample (firstname,lastname) VALUES ('".$_POST["firstname"]."', '".$_POST["lastname"]."')";
$query = mysqli_query($connect, $sql);
if($query){
    echo "Data Inserted";
}
?>