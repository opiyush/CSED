<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="Login.css">
</head>
<body>
<?php include 'header.php';?>
<?php include 'connection.php'//echo starts for displaying the top of the page
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
                  <td><?php $Date = $rows["Published_date"]->format('d/m/Y'); echo $Date;?></td>
                  <td><?php $Date = $rows["Due_date"]->format('d/m/Y'); echo $Date; ?></td>
                  <td><a href="<?php echo $rows["Assg_Link"]?>">Click</a></td>
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

</body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</html>
