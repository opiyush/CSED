<?php session_start(); ?>
<?php include 'connection.php'?>

<?php
    $EmpNo = $_POST['EmpNo'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Phn1 = $_POST['Phn1'];
    $Phn2 = $_POST['Phn2'];
    $Degree = $_POST['Degree'];
    $CVlink = $_FILES["CVlink"]["name"];
    $Photo= $_FILES["Photo"]["name"];
    $Designation = $_POST['Designation'];
    $params = array($Email,$Password,$Designation);

    //$stmt = sqlsrv_query( $conn, "SELECT COUNT(Password) AS valid FROM emp_details WHERE Email=? and Password=? and Designation=? and Active='0';",$params);
    $stmt = sqlsrv_query( $conn, "EXEC Signin_emp @email=?, @pass=?, @desig=?;",$params);
    if( sqlsrv_fetch( $stmt ) === false)
    {
     die( print_r( sqlsrv_errors(), true));
    }
   $valid = sqlsrv_get_field( $stmt, 0);
   //echo "$valid: ";
  if($valid == 1)
  {
    $_SESSION["email"]=$Email; //assigning email to session variable
    //print_r($params);

    if(!empty($_FILES["Photo"]["name"]))
    {//upload images
      $target_dir = "Added_Image/";
      $ext = end(explode('.',$_FILES["Photo"]["name"]));
      $Photo = $Email . "Photo." . $ext;
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
      }

      if(!empty($_FILES["CVlink"]["name"])){
        //upload cv
        $target_dir_cv = "Added_CV/";
        $ext_cv = end(explode('.',$_FILES["CVlink"]["name"]));
        $CVlink = $Email . "CV." . $ext_cv;
        echo $target_file_cv = $target_dir_cv . $CVlink;
        $uploadOk_cv = 1;
        //$docFileType = strtolower(pathinfo($target_file_cv,PATHINFO_EXTENSION));
        //$docFileType = $_FILES["CVlink"]["Type"];

        // Check if image file is a actual image or fake image
        // if(isset($_POST["submit"])) {
        //     $check = getimagesize($_FILES["CVlink"]["tmp_name"]);
        //     if($check !== false) {
        //         $uploadOk_cv = 1;
        //     } else {
        //         $uploadOk_cv = 0;
        //     }
        // }
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
          if (move_uploaded_file($_FILES["CVlink"]["tmp_name"], $target_file_cv)) {
          }
          else {
          }
        }
      }

    $params = array($EmpNo,$Name,$Phn1,$Phn2,$Degree,$CVlink,$Photo,$Email);
    //$str="Update emp_details set EmpNo = ?,Name = ?, Phn1 = ?, Phn2 =?, Degree = ?, CVlink =?, Photo = ?,Active='1' where Email=?";
    $str="EXEC Signin_update_emp @e_no=?, @name=?, @phn1=?, @phn2=?, @Degree=?, @cv=?,@photo=?, @email=?";

    $stmt = sqlsrv_query( $conn,$str,$params);
    if(!$stmt){
      die( print_r(sqlsrv_errors(),true));
    }
    if($Designation== 0)//0 for admin
    {
      $_SESSION["role"]='Admin';
      header("Location: admin_page.php");
    }
    elseif ($Designation ==1) {// 1 for HOD
      $_SESSION["role"]="HOD"; //assigning role to session variable
      header('Location: admin_page.php');
    }
    elseif ($Designation ==2) {//2 for Faculty
      $_SESSION["role"]="Faculty";//assigning role to session variable
      header("Location: Faculty_login.php");
    }
    elseif ($Designation == 3) {//3 for Technical Staff
      $_SESSION["role"]="TechStaff";
      header("Location: Techstaff_login.php");
    }
  }
  else {
    echo '<h2>invalid User ID or Password</h2>';
  }
 ?>
