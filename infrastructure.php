<!DOCTYPE html>
<?php
 session_start();
  ?>
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

  	$stmt = sqlsrv_query( $conn, "Select * from Lab_Details;",array());// make table Lab_Details
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
            <div>
              <?php echo "PC Type=".$rows["pc_type"]; ?>
            </div>
            <div>
              <?php echo "Number=".$rows["number_of_pc"]; ?>
            </div>
          </div>
          <button onclick='details_diaplay_modal("<?php echo $rows["lab_number"];?>","<?php echo $rows["pc_type"];?>");'>
            click to view modal
          </button>
        </div>

      <?php
      }
      }
      else {
        echo "<h3>Sorry, </h3>";
        echo "<h3>Can't fetch data</h3>";
      }
      ?>

      </div>
    </div>

    <!--common modal to display details of labs-->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#add_faculty">Lab Details</button> -->
          <!-- modal -->
          <div class="modal fade" id="display_lab_details" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Lab Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                  <div class="form-group">
                    <label for="lab_name">Lab Name:</label>
                    <div id="lab_name"></div>

                  </div>
                  <div class="form-group">
                    <label for="pc_type">PC Type:</label>
                    <div id="pc_type"></div>
                  </div>


              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <!-- <button type="submit" class="btn btn-success">Submit</input> -->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>


            </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    <script>
      Lab_name = document.getElementById("lab_name");
      Pc_type = document.getElementById("pc_type");
      function details_diaplay_modal(name,type)
      {
        Lab_name.innerHTML= name;
        Pc_type.innerHTML = type;
        $("#display_lab_details").modal();
      }
    </script>
    <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
		<script src="jquery/popper.min.js" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
  </body>
</html>
