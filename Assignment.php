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
$a=$_POST["semester"];
$b=$_POST["subject"];
$stmt = sqlsrv_query( $conn, "select Assg_Link, Heading, Published_date, Due_date, Semester from Assignment where Semester=$a and Subject=$b",array()); //making query and storing it in stmt variable
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
              <th>Semester</th>
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
                  <td><?php echo $rows["Semester"]?></td>
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>
