<?php 
   
?>
<!DOCTYPE html>
<html>
<head>
<title>Picture Cropping</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="js/croppie.js"></script>

    <script src="http://highcharttable.org/js/highcharts.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="css/croppie.css">

</head>
<body>

<br/>
<div class="container">
   <div class="panel panel-default">
       <div class="panel-heading">
           <div class="panel-body">
            <input type="file" name="upload_image" id="upload_image">
            <br>

            <div id="uploaded_image">
                
            </div>
            </div>
       </div>
   </div>
</div>

<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px">
                            
                        </div>
                    </div>
                    <div class="col-md-4" style="padding-top:30px;">
                        <br>
                        <br>
                        <br>
                        <button class="btn btn-success crop_image">Crop Picture</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $image_crop = $('#image_demo').croppie({
             enableExif: true,
                viewport:{
                    width:300,
                    height:300,
                    type:'square' //OR circle|square
                },
                boundary:{
                    width:350,
                    height:350
                }
            });

        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function(event){
                $image_crop.croppie('bind', {
                    url:event.target.result
                }).then(function(){
                    console.log('jQuery bind  complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response){
                $.ajax({
                    url:"upload.php",
                    type: "POST",
                    data:{"image": response},
                    success:function(data)
                    {
                        $('#uploadimageModal').modal('hide');
                        $('#uploaded_image').html(data);
                    }
                });
            })
        });
    });
</script>
</html>