<div class="sidebar">
<?php include 'connection.php'?>
  <?php
    $email = $_SESSION["email"];
    //$email="Harsh@gmail.com";
     //$stmt = sqlsrv_query( $conn, "select * from emp_details where Email=?",array($email)); //making query and storing it in stmt variable
     $stmt = sqlsrv_query( $conn, "EXEC GetEmp_by_email @email=?;",array($email));
  // for displaying the top of the page
  ?>

  <?php
  $rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
  ?>
  <?php $photo_name=$rows["Photo"]?>
  <?php if(is_null($photo_name))
  {
    $photo_name="images.png";
  }
    ?>
  <a style="color:white"><img id="propic" src="Added_Image/<?php echo $photo_name?>" alt="Profile Picture" height="130" width="130">&nbsp;&nbsp;&nbsp;&nbsp;<br><br>
  <b><?php echo $rows["Name"] ?></b><br>
  <b><?php echo $rows["UserId"]?></b></a>

  <div class="selectonly">
    <a href="Faculty_login.php">My Profile<span class="sr-only">(current)</span></a>
    <a href="Faculty_login_notice.php">Add/Remove Notice</a>
    <a href="Faculty_login_assignment.php">Assignment</a>
    <a href="Faculty_login_publication.php">Publication</a>
    <a href="Faculty_login_project.php">Project</a>
    <a href="Faculty_login_thesis.php">Research Thesis</a>
    <a href="Faculty_login_event.php">Event</a>
    <a href="Faculty_login_professionalbodies.php">Professional Bodies</a>
    <a href="Faculty_login_adminrespon.php">Adminstrative Responsibilty at Institute Level</a>
    <a href="Faculty_login_academicrespon.php">Academic Responsibilty</a>
    <a href="Faculty_login_awards.php">Awards, Honors and Achievements</a>
    <a href="Faculty_login_countryvis.php">Country Visited</a>
  </div>
</div>
