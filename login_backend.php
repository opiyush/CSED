<?php include 'connection.php'?>

<?php
    $email = $_POST['Email'];
    $pass = $_POST['Pss'];
    $role = $_POST['Role'];
    $params = array($email,$pass,$role);
    $stmt = sqlsrv_query( $conn, "SELECT COUNT(Password) AS valid FROM emp_details WHERE Email=? and Password=? and Designation=?",$params);
    if( sqlsrv_fetch( $stmt ) === false)
    {
     die( print_r( sqlsrv_errors(), true));
   }
   $valid = sqlsrv_get_field( $stmt, 0);
   echo "$valid: ";
  if($valid == 1)
  {
      if($role == 0)//0 for admin
      {
        header("Location: admin_page.php");
      }
      elseif ($role ==1) {// 1 for HOD
        header('Location: admin_page.php');
      }
      elseif ($role ==2) {//2 for Faculty
        echo 'the role is Faculty';
      }
      elseif ($role == 3) {//3 for Technical Staff
        echo 'The role is TechStaff';
      }
  }
  else {
    echo '<h2>invalid User ID or Password</h2>';
  }

 ?>
