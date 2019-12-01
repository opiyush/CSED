<div class="sidebar">
<?php include 'connection.php'?>
  <?php
    $email = $_SESSION["email"];
    //$email="Harsh@gmail.com";
     $stmt = sqlsrv_query( $conn, "select * from emp_details where Email=?",array($email)); //making query and storing it in stmt variable
  // for displaying the top of the page
  ?>

  <?php
  $rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
  ?>

  <a href=""><img id="propic" src="Added_Image/<?php echo $rows["Photo"]?>" alt="Profile Picture" height="130" width="130">&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
  <b><?php echo $rows["Name"] ?></b><br>
  <b><?php echo $rows["UserId"]?></b></a>

  <div class="selectonly">
    <a href="Faculty_login.php">My Profile<span class="sr-only">(current)</span></a>
    <a href="Faculty_login_notice.php">Add/Remove Notice</a>
    <a href="Faculty_sidebar_assignment.php">Assignment</a>

  </div>
</div>
