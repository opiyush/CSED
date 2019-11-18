<?php
 session_start();
//$_SESSION["role"]="Admin";
//echo $_SESSION["role"];
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Admin")
  {
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin </title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="admin_page.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  </head>
  <body>

    <?php include 'header.php'?>

    <!-- main contents  -->
    <div class= "container-fluid main_contents">
      <div class = "row">
        <div class = "col-sm-6 col-md-6 col-xl-6 py-2 Faculty">
          <div class="card img-fluid" >
          <a href="admin_faculty_page.php">
            Alter Faculty
          </a>
          </div>

        </div>
        <div class = "col-sm-6 col-md-6 col-xl-6 py-2 Technical_staff">
          <div class="card img-fluid">
            <a href="admin_staff_page.php">
              Alter Techninal Staff
            </a>
          </div>
        </div>
        <div class = "col-sm-6 col-md-6 col-xl-6 py-2 News">
          <div class="card img-fluid">
            <a href="admin_notice_page.php">
            Alter NEWS and Information
          </a>
          </div>
        </div>
        <div class = "col-sm-6 col-md-6 col-xl-6 py-2  Assignments">
          <div class="card img-fluid">
            <a href="admin_assignment_page.php">
              Alter Assignments and schedules
            <a/>
          </div>
        </div>
      </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

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
