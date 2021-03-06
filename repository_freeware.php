<?php session_start(); ?>
<style media="screen">
</style>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
  <link rel="stylesheet" href="header.css">
</head>
<body>
    <?php include 'header.php';?>
    <?php include 'connection.php' ;?>
    <?php
       $stmt = sqlsrv_query( $conn,"select * from Software WHERE Type = 1",array()); //making query and storing it in stmt variable
    // for displaying the top of the page
    //checking the result of fetching the contents
      if ($stmt !== NULL) {
        //echo "printing the table\n";
    ?>
    <div class="container">
    <div class="">
      <div class="table_layout">
        <br>
        <div class="table-responsive">
          <table id="mytable" class="table table-bordred table-striped" style="">
            <thead class="thead-dark">
              <th>Software Name</th>
              <th colspan="2">Activity</th>
            </thead>
            <tbody>
            <?php
            while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            ?>
              <tr>
              <td style="width: 40%"><?php echo substr($rows["Software_Name"],0,30)?></td>
              <!-- download -->
              <td style="width: 30%">
                <a target="_blank" href=<?php echo "Softwares/Freeware/" . $rows["Download"]?>>Download S/W</a>

              </td>
              <td style="width: 30%">
              <a target="_blank" href=<?php echo "Softwares/Freeware/" . $rows["Download_Manual"]?>>Download Manual</a>
            </td>
              </tr>
            <?php
            }
            }
            ?>
            </tbody>
          </table>


        </div>
      </div>
    </div>
    </div>

    <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
