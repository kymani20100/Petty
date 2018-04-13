<?php 
// UPLOAD 
if(isset($_POST["image"])){
    $data = $_POST["image"];
    // data:image/png;base64,iVBORfsjgnkjgnkgkbAAArdftgyFbf...
    $image_array_1 = explode(";", $data);
    // base64,iVBORfsjgnkjgnkgkbAAArdftgyFbf...
    $image_array_2 = explode(",", $image_array_1[1]);
    // iVBORfsjgnkjgnkgkbAAArdftgyFbf...
    $data = base64_decode($image_array_2[1]);

    $imageName = time().'.png';
    file_put_contents($imageName, $data);
    echo '<img src="'.$imageName.'" class="img-thumbnail" />';
}

?>