<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="Login.css">
</head>
<body>
<?php include 'header.php';?>
<?php
$server = "DESKTOP-HAF4GQB";
$conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );

$stmt = sqlsrv_query( $conn, "select Subject, Semester, Sub_Code from Subject order by Semester",array()); //making query and storing it in stmt variable
//echo starts for displaying the top of the page
?>
  <div id="fir" class="container">
    <div class="row mt-5">

      <?php
for ($x = 1; $x <=4; $x++) {
    ?>
      <div class="col-md-3  mb-5">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER <?php echo $x ?> </h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <?php
                  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) and $rows["Semester"] == $x){
                    ?>
                  <option value="<?php echo $rows["Sub_Code"]?>"> <?php echo $rows["Subject"]?></option>
                  <<?php } ?>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
      ?>

      <?php
      for ($x = 5; $x <=8; $x++) {
      ?>
      <div class=" col-md-3">
        <div class="card" >
          <div class="card-body">
            <h5 class="card-title">SEMESTER <?php echo $x ?></h5>
            <div class="dropdown">
              <form action="Assignment.php" method="post">
                <label for="SUBJECT">SUBJECT</label>
                <select name="subject" class="form-control">
                  <?php
                  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) and  $rows["Semester"]==$x){
                    ?>
                  <option value="<?php $rows["Sub_Code"]?>"><?php echo $rows["Subject"]?></option>
                  <<?php } ?>
                </select>
                <button type="submit" class="btn">FIND</button>
              </form>
            </div>
          </div>
        </div>
      </div>
  <?php
}
?>

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
