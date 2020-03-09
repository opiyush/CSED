<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" href="header.css">
    <meta charset="utf-8">
    <title>Infrastructure</title>
  </head>
  <body>
    <?php include 'header.php';
  	include 'connection.php';

  	$stmt = sqlsrv_query( $conn, "Select * form Lab_Details;",array());// make table Lab_Details
    ?>
    <div class="container">
    <div class="row mt-2 justify-content-center" >
      <?php
      $x=0;
      if ($stmt == TRUE ) {
      while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
      ?>
        <div class="card mx-2" style="max-width: 10rem;">
          <img src="https://cdn1.iconfinder.com/data/icons/metro-ui-dock-icon-set--icons-by-dakirby/256/Netflix.png" alt="" class="card-img-top">
          <div class="card-body">
            Lab <?php $x+=1; echo $x; ?>
            <button >
            </button>
          </div>
        </div>

      <?php
      }
      }
      else {
        echo "<h3>Can't fetch data</h3>";
      }
      ?>

      </div>
    </div>

    <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
		<script src="jquery/popper.min.js" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
