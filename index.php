<?php 
    $pdo = new PDO("mysql:host=localhost;dbname=library", "root", "password");
    $sql = "SELECT * FROM tbl_admission ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Chart </title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="http://code.highcharttable.org/2.0.0/jquery.highchartTable.js"></script>

    <script src="http://highcharttable.org/js/highcharts.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>

<br/>
<div class="container">
    <h3 align="center"> Display HTML Table Data in Chart</h3>
    <br>
    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="for_chart">
            <thead>
                <tr>
                    <th width="20%">Year</th>
                    <th width="40%">No. Of Student Admission</th>
                    <th width="40%">No. Of Student Graduates</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($result as $row) {
                        echo '<tr>
                                <td>'.$row["year"].'</td>
                                <td>'.$row["no_of_admission"].'</td>
                                <td>'.$row["no_of_passout"].'</td>
                              </tr>';
                    }
                ?>
            </tbody>
            
        </table>
    </div>
    <br>
    <div id="chart_area" id="Student Admission & Passout Details">
        
    </div>
    <br>
    <div align="center">
        <button type="button" name="view_chart" id="view_chart" class="btn btn-info btn-lg">View Data in chart </button>
    </div>

</div>

</body>
<script type="text/javascript">
    $(document).ready(function(){
        $('#chart_area').dialog({
            autoOpen:false,
            width:1000,
            height:500
        });

        $('#view_chart').click(function(){
            $('#for_chart').data('graph-container', '#chart_area');
            $('#for_chart').data('graph-type', 'column');
            $('#chart_area').dialog('open');
            $('#for_chart').highchartTable();
        });
    });
</script>
</html>