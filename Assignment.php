<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
