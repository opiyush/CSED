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
    $Photo = $_POST['Photo'];
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
    $params = array($EmpNo,$Name,$Phn1,$Phn2,$Degree,$CVlink,$Photo);
    //print_r($params);
   $str="Update emp_details set EmpNo = ?,Name = ?, Phn1 = ?, Phn2 =?, Degree = ?, CVlink =?, Photo = ?";
    $stmt = sqlsrv_query( $conn,$str,$params);
    if(!$stmt){
      die( print_r(sqlsrv_errors(),true));
    }
      if($Designation== 0)//0 for admin
      {
        header("Location: admin_page.php");
      }
      elseif ($Designation ==1) {// 1 for HOD
        header('Location: admin_page.php');
      }
      elseif ($Designation ==2) {//2 for Faculty
        echo 'the role is Faculty';
      }
      elseif ($Designation == 3) {//3 for Technical Staff
        echo "TechStaff";
      }
  }
  else {
    echo '<h2>invalid User ID or Password</h2>';
  }
 ?>
