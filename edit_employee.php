<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     //$Email = $_POST['email'];
     $name = $_POST['name'];
     $desig = $_POST["Designation"];
     $EmpNo = $_POST["EmpNo"];
     $Password = $_POST["Password"];
     $Phn1 = $_POST["Phn1"];
     $Phn2 = $_POST["Phn2"];
     $Degree = $_POST["Degree"];
     $CVLink = $_FILES["CVLink"]["name"];
     $Photo = $_FILES["Photo"]["name"];
     $oldEmail = $_POST["old_Email"];
     //$pass = random_int(1000,9999);
     //$subject = $_POST['subject'];
     $params = array($name,$Password,$EmpNo,$Phn1,$Phn2,$Degree,$oldEmail,$desig);
     $stmt = sqlsrv_query( $conn,"Update emp_details set Name=?, Password=?, EmpNo=?, Phn1=?, Phn2=?, Degree=? WHERE Email=? and Designation=?;",$params);
     echo '$stmt';
     if($CVLink!=NULL && $CVLink!="")
     {
       $target_dir_cv = "Added_CV/";
       $tem = explode('.',$CVLink);
       $ext_cv = end($tem);
       $CVLink = $oldEmail . "CV." . $ext_cv;
       echo $target_file_cv = $target_dir_cv . $CVLink;
       $uploadOk_cv = 1;
       if(strtolower($ext_cv)!= "pdf")//checking whether pdf or not
       {
         $uploadOk_cv = 0;
       }
       //$uploadOk_cv = 1;
       if ($uploadOk_cv == 0) {

             // if everything is ok, try to upload file in else block
         }
       else
       {
         if (move_uploaded_file($_FILES["CVLink"]["tmp_name"], $target_file_cv)) {
         }
         else {
         }
       }
       $params = array($CVLink,$oldEmail);//CV link should be eg- harsh@gamil.comCV
       $stmt = sqlsrv_query( $conn,"Update emp_details set CVlink=? WHERE Email=?;",$params);
     }
    if($Photo!=NULL && $Photo!="")
    {

      $target_dir = "Added_Image/";
      $temp = explode('.',$_FILES["Photo"]["name"]);
      $ext = end($temp);
      $Photo = $oldEmail . "Photo." . $ext;
      echo $target_file = $target_dir . $Photo;
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if(isset($_POST["submit"])) {
          $check = getimagesize($_FILES["Photo"]["tmp_name"]);
          if($check !== false) {
              $uploadOk = 1;
          } else {
              $uploadOk = 0;
          }
      }
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
          && $imageFileType != "gif" )
          {
            $uploadOk = 0;
          }
      if ($uploadOk == 0) {

            // if everything is ok, try to upload file in else block
        }
      else
      {
        if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $target_file)) {
          }
        else {
          }
      }

      $params = array($Photo,$oldEmail); //eg-if email = harsh@gmail.com so photo will be saved at harsh@gamil.comPhoto
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
  <h1><?php echo $oldEmail ?></h1>
</body>
</html>
