<?php 
$connect = mysqli_connect("localhost", "root", "password", "library");
$output = '';
$sql = "SELECT * FROM tbl_sample ORDER BY id DESC";
$result = mysqli_query($connect, $sql);
$output .= '
    <div class="table-responsive">
    <table class="table table-bordered">
    <tr>
        <th width="10%">ID</th>
        <th width="40%">FIRST NAME</th>
        <th width="40%">LAST NAME</th>
        <th width="10%">DELETE</th>
    </tr>';

if(mysqli_num_rows($result) > 0){
 while($row = mysqli_fetch_array($result)){
    $output .= '<tr>
                    <td>'.$row["id"].'</td>
                    <td class="firstname" data-id1="'.$row["id"].'" contenteditable>'.$row["firstname"].'</td>
                    <td class="lastname" data-id2="'.$row["id"].'" contenteditable>'.$row["lastname"].'</td>
                    <td><button name="btn_delete" id="btn_delete" class="btn btn-danger btn_delete" data-id3="'.$row["id"].'">DELETE</button></td>
                </tr>';
 }

$output .= '<tr>
                <td></td>
                <td id="firstname" contenteditable></td>
                <td id="lastname" contenteditable></td>
                <td> <button name="btn_add" id="btn_add" class="btn btn-info">+ ADD</button></td>
            </tr>';


}else{
    $output .= '<tr>
                    <td colspan="4">No Data Found...</td>
                </tr>';
}

$output .= '</table></div>';
echo $output;
?>