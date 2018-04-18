
<!DOCTYPE html>
<html>
<head>
<title>Live Table Editing </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<br/>
<div class="container">
    
    <br />
    <div class="table-responsive">
        <h3 align="center"> Live Table Add/Edit and Delete</h3><br>
        <div id="live_data">
            
        </div>
        
    </div>
    

</div>

</body>
<script type="text/javascript">
  $(document).ready(function(){
    function fetch_data(){
        $.ajax({
            url: "fetch-data.php",
            method: "POST",
            success:function(data){
                $('#live_data').html(data);
            }
        });
    }
    // Declare  the function
    fetch_data();

    $(document).on('click', '#btn_add', function(){
        var firstname = $('#firstname').text();
        var lastname = $('#lastname').text();
        if(firstname == ''){
            alert('Enter First');
            return false;
        }
        if(lastname == ''){
            alert("Enter last");
            return false;
        }
        $.ajax({
            url:"insert.php",
            method:"POST",
            data:{firstname:firstname, lastname:lastname},
            dataType:"text",
            success:function(data){
                alert(data);
                fetch_data();
            }
        });
    });

    function edit_data(id, text, column_name){
        $.ajax({
            url:"edit.php",
            method:"POST",
            data:{id:id, text:text, column_name:column_name},
            dataType:"text",
            success:function(data){
                alert(data);
            }
        });
    }

    $(document).on('blur', '.firstname', function(){
        var id = $(this).data("id1");
        var firstname = $(this).text();
        edit_data(id, firstname, "firstname");
    });

    $(document).on('blur', '.lastname', function(){
        var id = $(this).data("id2");
        var lastname = $(this).text();
        edit_data(id, lastname, "lastname");
    });

    $(document).on('click', '.btn_delete', function(){
        var id = $(this).data('id3');
        $.ajax({
            url:"delete.php",
            method:"POST",
            data:{id:id},
            dataType:"text",
            success:function(data){
                alert(data);
                fetch_data();
            }
        });
    });

  });
</script>
</html>