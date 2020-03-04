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
        <h4>Schedule</h4>
        <div class="table-responsive">
   <table id="mytable" class="table table-bordred table-striped">


            <tbody>
                <?php

            }
            ?>
          </tbody>

        </table>
        <form target="_blank" method="get" action="image/Schedule.jpeg">
         <button type="submit">Download</button>
      </form>
      </div>

    </div>
  </div>
</div>
<script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="jquery/popper.min.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</body>
</html>
