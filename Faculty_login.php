<?php session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Faculty")
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


    <?php include 'Sidebar.php' ?>
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
      <form class="CV" align="left" action="Added_CV/<?php echo $rows["CVlink"]?>" method="post">
        <input type="submit" id="cv" name="cvlink" value="CV">
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
