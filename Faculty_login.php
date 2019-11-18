<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="Faculty_login.css">
    <title></title>
  </head>
  <body>
    <?php include 'connection.php'?>
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

    <div class="sidebar">
      <a href=""><img id="propic" src="<?php echo $rows["Photo"]?>" alt="Profile Picture" height="130" width="130">&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo $rows["Name"] ?></b><br><b><?php echo $rows["UserId"]?></b></a>

      <div class="selectonly">
        <a class="active" href="#">My Profile<span class="sr-only">(current)</span></a>

        <a href="#">Assignments</a>

        <a href="#">Add/Remove Notice</a>

    </div>
    </div>

      <form align="right" name="form1" method="post" action="Front_Page.php">
       <label class="logoutLblPos">
       <input name="logout" type="submit" id="submit1" value="Sign Out">
       </label>
     </form>

     <div class="Details">
       <h3>Hello, <?php echo $rows["Name"] ?></h3>
       <br><br>

      <p><b>Name :</b>&nbsp;&nbsp;&nbsp;&nbsp;   <?php echo $rows["Name"] ?>  </p>
      <p><b>Employee No. :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["EmpNo"]?>  </p>
      <p><b>E-mail :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Email"]?> </p>
      <p><b>Password :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Password"]?>  </p>
      <p><b>Phone No. :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Phn1"]?>  </p>
      <p><b>Alternate Phone No. :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Phn2"]?>  </p>
      <p><b>Degree :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Degree"]?>  </p>
      <br><br>
      <form class="CV" align="left" action="<?php echo $rows["CVlink"]?>" method="post">
        <input type="submit" id="cv" name="cvlink" value="CV">
      </form>
     </div>
  </body>
</html>
