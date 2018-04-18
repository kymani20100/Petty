<?php 
$connect = mysqli_connect("localhost", "root", "password", "library");
$id = $_POST['id'];
$text = $_POST['text'];
$column_name = $_POST['column_name'];
$sql = "UPDATE tbl_sample SET $column_name = $text WHERE id = $id";
$query = mysqli_query($connect, $sql);
if($query){
    echo "Data Updated";
}
?>