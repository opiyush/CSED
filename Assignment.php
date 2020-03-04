<?php session_start(); ?>
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
$a=$_POST["subject"];
$str="EXEC assign_from_sub_code @sub_code = '$a'";
$stmt = sqlsrv_query( $conn, $str,array()); //making query and storing it in stmt variable
//echo starts for displaying the top of the page
?>
<?php
if ($stmt !== NULL) {
  //echo "printing the table\n";
  ?>
  <div class="container">
    <div class="row">


      <div class="col-md-12">
        <h4>Assignment</h4>
        <div class="table-responsive">
   <table id="mytable" class="table table-bordred table-striped">

            <thead>
              <th>Assignment</th>
              <th>Publised Date</th>
              <th>Due Date</th>
              <th>Download</th>
            </thead>

            <tbody>
              <?php
              while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

                ?>


                <tr>
                  <td><?php echo $rows["Heading"] ?></td>
                  <td><?php $Date = $rows["Published_date"]; echo $Date;?></td>
                  <td><?php $Date = $rows["Due_date"]; echo $Date; ?></td>
                  <td><a target="_blank" href=<?php echo "Added_Assignment/" . $rows["Assg_Link"]?>>Click</a></td>
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
<?php sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
<script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="jquery/popper.min.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
