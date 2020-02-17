<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="header.css">
</head>
<body>
  <style media="screen">
    #find_1{
      margin: 10px 0px 0px 0px;
      border-radius: 5px;
    }
    #find_2{
      margin: 10px 0px 0px 0px;
      border-radius: 5px;
    }
  </style>
<?php include 'header.php';?>
<?php include 'connection.php' ;?>
<?php
// $stmt = sqlsrv_query( $conn, "select Subject, Semester, Sub_Code from Subjects_table order by Semester",array());
$stmt = sqlsrv_query( $conn, "EXEC GetAllSubjects_order_by_Sem;",array());
//echo starts for displaying the top of the page
?>
  <div id="fir" class="container">
    <div class="row mt-5">

      <?php
      $rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);//don't remove if no subject in semester one then error could occour
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
                if($rows["Semester"]==$x)
                {
                  do{
                    ?>
                    <option value="<?php echo $rows["Sub_Code"]?>"> <?php echo $rows["Subject"]." (".$rows["Sub_Code"].")"?></option>
                    <?php
                   }
                  while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) and $rows["Semester"] == $x);
                }?>
                </select>
                <button type="submit" class="btn-primary" id="find_1">FIND</button>
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
                  if($rows["Semester"]==$x)
                  {
                    do{
                      ?>
                      <option value="<?php echo $rows["Sub_Code"]?>"> <?php echo $rows["Subject"]." (".$rows["Sub_Code"].")"?></option>
                      <?php
                     }
                    while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) and $rows["Semester"] == $x);
                  }?>
                </select>
                <button type="submit" class="btn-primary" id="find_2">FIND</button>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
