<?php
session_start();
 ?>
<?php include 'connection.php'?>

<?php
    $email = $_POST['Email'];
    $pass = $_POST['Pss'];
    $role = $_POST['Role'];
    $params = array($email,$pass,$role);
    //$stmt = sqlsrv_query( $conn, "SELECT COUNT(Password) AS valid FROM emp_details WHERE Email=? and Password=? and Designation=? and Active=1",$params);
    $stmt = sqlsrv_query( $conn, "EXEC Login_emp @email=?, @pass=?, @desig=?;",$params);
    if( sqlsrv_fetch( $stmt ) === false)
    {
     die( print_r( sqlsrv_errors(), true));
    }
   $valid = sqlsrv_get_field( $stmt, 0);

   //especially for profile pic, try to use a smaller picture to reduce loding time
   $stmt = sqlsrv_query( $conn, "EXEC GetEmp_by_email @email=?;",array($email));
   $profile_pic = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
   //echo "$valid: ";
  if($valid == 1)
  {
    $_SESSION["profile_pic"]=$profile_pic["Photo"];
    $_SESSION["email"]=$email; //assigning email to session variable
      if($role == 0)//0 for admin
      {
        $_SESSION["role"]='Admin'; //assigning role to session variable
        header("Location: admin_page.php");
      }
      elseif ($role ==1) {// 1 for HOD
        $_SESSION["role"]="HOD"; //assigning role to session variable
        header('Location: admin_page.php');
      }
      elseif ($role ==2) {//2 for Faculty
        $_SESSION["role"]="Faculty";//assigning role to session variable
        header("Location: Faculty_login.php");
      }
      elseif ($role == 3) {//3 for Technical Staff
        $_SESSION["role"]="TechStaff";
        header("Location: Techstaff_login.php");
        //assigning role to session variable
        ;
      }
  }
  else {
    echo '<h2>invalid User ID or Password</h2>';
  }

 ?>
