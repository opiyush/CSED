<?php session_start(); ?>
<style media="screen">
  h2{
    text-align: center;
  }
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
       $stmt = sqlsrv_query( $conn,"select * from Softwares WHERE Type = 2",array()); //making query and storing it in stmt variable
    // for displaying the top of the page
    //checking the result of fetching the contents
      if ($stmt !== NULL) {
        //echo "printing the table\n";
    ?>
    <div class="container">
    <div class="row">
      <div class="table_layout">
        <br><br>
        <h2>Licensed Softwares</h2>
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
              <td style="width: 10%"><?php echo substr($rows["Software_Name"])?></td>
              <!-- download -->
              <td style="width: 5%">
                <a target="_blank" href=<?php echo "Softwares/Licensed/" . $rows["Download"]?>>Download S/W</a>

              </td>
              <td style="width: 5%">
              <a target="_blank" href=<?php echo "Softwares/Licensed/" . $rows["Download_Manual"]?>>Download Manual</a>
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
