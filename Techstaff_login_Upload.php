<?php session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="TechStaff")
  {
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <head>
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


      <?php include 'Sidebar.php' ?>


      <form align="right" name="form1" method="post" action="Front_Page.php">
        <label class="logoutLblPos">
          <input name="logout" type="submit" id="submit1" value="Sign Out">
        </label>
      </form>
      <div class="content1">
      <form>
        <div class="form-group">
          <label for="New Arrival Details">New Arrival Details</label>
          <textarea class="form-control" id="New_Arrival" rows="15"></textarea><br>
          <button type="submit" class="btn btn-outline-primary">Upload</button>
        </div>
      </form>

      </div>
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