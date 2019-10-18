<?php include 'header.php';?>
<script>
$(document).ready(function(){
  $("#mytable #checkall").click(function () {
    if ($("#mytable #checkall").is(":checked")) {
      $("#mytable input[type=checkbox]").each(function () {
        $(this).prop("checked", true);
      });

    } else {
      $("#mytable input[type=checkbox]").each(function () {
        $(this).prop("checked", false);
      });
    }
  });

  $("[data-toggle=tooltip]").tooltip();
});
</script>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>
