<div class="sidebar">
<?php include 'connection.php'?>
  <?php
    $email = $_SESSION["email"];
    //$email="Harsh@gmail.com";
     $stmt = sqlsrv_query( $conn, "EXEC GetEmp_by_email @email=?;",array($email)); //making query and storing it in stmt variable
  // for displaying the top of the page
  ?>

  <?php
  $rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
  ?>
  <?php $photo_name=$rows["Photo"]?>
  <?php if(is_null($photo_name) or $photo_name=="")
  {
    $photo_name="images.png";
  }
    ?>
  <a style="color:white"><img id="propic" src="Added_Image/<?php echo $photo_name?>" alt="Profile Picture" height="130" width="130">&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
  <b><?php echo $rows["Name"] ?></b><br>
  <!-- <b><?php echo $rows["UserId"]?></b> -->
  </a>
  <?php $emp_id=$rows["EmpNo"]; ?>

  <div class="selectonly">
    <a href="Techstaff_login.php">My Profile<span class="sr-only">(current)</span></a>
    <a href="Techstaff_login_Upload.php">Upload Arrival</span></a>
    <a href="techstaff_login_notice.php">Add/Remove Notice</a>
  </div>
</div>
