<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $email = $_POST['email'];
     $name = $_POST['name'];
     $desig = $_POST["Designation"];
     $EmpNo = $_POST["EmpNo"];
     $Password = $_POST["Password"];
     $Phn1 = $_POST["Phn1"];
     $Phn2 = $_POST["Phn2"];
     $Degree = $_POST["Degree"];
     $CVLink = $_FILE["CVLink"];
     $Photo = $_FILE["Photo"];
     $oldEmail = $_POST["old_Email"];
     //$pass = random_int(1000,9999);
     //$subject = $_POST['subject'];
     $params = array($name,$email,$Password,$desig,$EmpNo,$Phn1,$Phn2,$Degree,$oldEmail);
     $stmt = sqlsrv_query( $conn,"Update emp_details set Name=?, Email=?, Password=?, Designation=?, EmpNo=?, Phn1=?, Phn2=?, Degree=? WHERE Email=?;",$params);
     echo '$stmt';
     if($CVLink!=NULL)
     {
       $params = array($Email."CV");//CV link should be eg- harsh@gamil.comCV
       $stmt = sqlsrv_query( $conn,"Update emp_details set CVlink=? WHERE Email=?;",$params);
     }
    if($Photo!=NULL)
    {
      $params = array($Email."Photo"); //eg-if email = harsh@gmail.com so photo will be saved at harsh@gamil.comPhoto
      $stmt = sqlsrv_query( $conn,"Update emp_details set Photo=? WHERE Email=?;",$params);
    }
     if($stmt==true)
     {
       echo "true"
       ?>

       <form>
       	<input type="button" id="return_back" value="Return to previous page" onClick="javascript:history.go(-1)" />
       </form>
  <?php
     }
     else{
       ?>
       <h1>
         Error Occoured please try again
        </h1>
       <?php     }
  ?>




  <script type="text/javascript">
  document.getElementById("return_back").click();
  </script>

</head>
<body>
  <h1><?php echo $email ?></h1>
</body>
</html>
