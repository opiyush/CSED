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
    $CVlink = $_POST['CVlink'];
    $Photo= $_FILES["Photo"]["name"];
    $Designation = $_POST['Designation'];
    $params = array($Email,$Password,$Designation);

    $stmt = sqlsrv_query( $conn, "SELECT COUNT(Password) AS valid FROM emp_details WHERE Email=? and Password=? and Designation=?",$params);
    if( sqlsrv_fetch( $stmt ) === false)
    {
     die( print_r( sqlsrv_errors(), true));
    }
   $valid = sqlsrv_get_field( $stmt, 0);
   //echo "$valid: ";
  if($valid == 1)
  {
    $_SESSION["email"]=$Email; //assigning email to session variable
    $params = array($EmpNo,$Name,$Phn1,$Phn2,$Degree,$CVlink,$Photo,$Email);
    //print_r($params);
    //upload images
    $target_dir = "Added_Image/";
    echo $target_file = $target_dir . basename($_FILES["Photo"]["name"]);
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
        && $imageFileType != "gif" ) {
          $uploadOk = 0;
        }
        if ($uploadOk == 0) {

          // if everything is ok, try to upload file
        } else {
          if (move_uploaded_file($_FILES["Photo"]["tmp_name"], $target_file)) {
          } else {

    }
}

   $str="Update emp_details set EmpNo = ?,Name = ?, Phn1 = ?, Phn2 =?, Degree = ?, CVlink =?, Photo = ? where Email=?";
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
        echo "TechStaff";
      }
  }
  else {
    echo '<h2>invalid User ID or Password</h2>';
  }
 ?>
