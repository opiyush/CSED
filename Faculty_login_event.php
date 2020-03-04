<?php session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Faculty")
  {
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
      <link rel="stylesheet" href="header.css">
      <link rel="stylesheet" href="Faculty_login.css">
      <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
        <title>Faculty</title>
    </head>
    <body>
      <?php include 'connection.php'?>
      <?php include 'nav-bar.php'?>
      <!-- php code for connecting to the database -->
      <?php
      $email = $_SESSION["email"];
      //$email="Harsh@gmail.com";
      $stmt = sqlsrv_query( $conn, "select * from emp_details where Email=?",array($email)); //making query and storing it in stmt variable
      // for displaying the top of the page
      ?>

      <?php
      $rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)
      ?>

      <?php include 'Sidebar_Faculty.php' ?>
      <div class="content1">
        <form action="Faculty_Upload_Backend_2.php" method="post">
          <div class="form-group">
            <label for="Events">Events</label><br><br>
            <select name="Events">
              <option value="Workshop">Workshop</option>
              <option value="FDP">FDP</option>
              <option value="Summer School">Summer School</option>
              <option value="Winter School">Winter School</option>
              <option value="Training Program">Training Program</option>
              <option value="International Conference">International Conference</option>
              <option value="National Conference">National Conference</option>
              <option value="International Conference">International Conference</option>
            </select><br>

            <select name="Type">
              <option value="Organized">Organized</option>
              <option value="Attended">Attended</option>
            </select><br>

            <textarea class="form-control" name="Heading" rows="2" placeholder="Heading"></textarea><br>
            <textarea class="form-control" name="Data" rows="15" placeholder="Details"></textarea><br>
            <input type="hidden"  name="Uploaded_By" value='<?php echo $email ?>'>
            <button type="submit" class="btn btn-outline-primary">Upload</button>
          </div>
        </form>
      </div>

      <<?php
      $stmt = sqlsrv_query( $conn, "select * from Event_Upload where Uploaded_By=?",array($email)); //making query and storing it in stmt variable
      ?>

      <?php
      if ($stmt !== NULL) {
        //echo "printing the table\n";
        ?>

        <div class="container" style="padding:13%">
          <div class="row">
            <div class="col-md-12">
              <h4>Previous Uploads</h4>
              <div class="table-responsive">
                <table id="mytable" class="table table-bordred table-striped">
                  <thead>
                    <th>Serial No.</th>
                    <th>Event</th>
                    <th>Type</th>
                    <th>Heading</th>
                    <th>Publised Date</th>
                    <th>Details</th>
                  </thead>

                  <tbody>
                    <?php
                    while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                      ?>

                      <tr>
                        <td><?php echo $rows["Serial No."] ?></td>
                        <td><?php echo $rows["Event"] ?></td>
                        <td><?php echo $rows["Type"] ?></td>
                        <td><?php echo $rows["Heading"] ?></td>
                        <td><?php $Date = $rows["Date"]->format('d/m/Y'); echo $Date;?></td>
                        <td><?php $Data = $rows["Data"]; echo $Data; ?></td>
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
      <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
      <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
    </html>
    <?php
  }
  else {
    echo "access denied";
  }
}
else {
  echo "Login required";
} ?>
