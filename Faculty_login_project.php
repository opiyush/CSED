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
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <form action="Faculty_Upload_Backend.php" method="post">
          <div class="form-group">
            <label for="Project Details">Project Details</label><br><br>
            <select name="Type">
              <option value="Under Graduate">Under Graduate</option>
              <option value="Post Graduate">Post Graduate</option>
            </select><br>
            <textarea class="form-control" name="Heading" rows="2" placeholder="Heading"></textarea><br>
            <textarea class="form-control" name="Data" rows="15" placeholder="Details"></textarea><br>
            <input type="hidden"  name="Uploaded_By" value='<?php echo $email ?>'>
            <input type="hidden"  name="Table" value='Project_Upload'>
            <button type="submit" class="btn btn-outline-primary">Upload</button>
          </div>
        </form>
      </div>

      <<?php
      $stmt = sqlsrv_query( $conn, "select * from Project_Upload where Uploaded_By=?",array($email)); //making query and storing it in stmt variable
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
                    <th>Project</th>
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
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
