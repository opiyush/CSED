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
 {
  //echo "printing the table\n";
  ?>
  <div class="container">
    <div class="row">


      <div class="col-md-12">
        <h4>Previous Paper</h4>
        <div class="table-responsive">
   <table id="mytable" class="table table-bordred table-striped">

            <thead>
              <th>Paper Name</th>
              <th>Held Date</th>
              <th>Download</th>
            </thead>

            <tbody>
                <?php

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
