<html>
<head>

  <?php
  include "connection.php" ?>
  <?php
     $email = $_POST['submit'];
     $stmt = NULL;
     // $stmt = sqlsrv_query( $conn, "DELETE from emp_details WHERE Email ='".$email."' ;",array());

     //for deleting the files after a faculty is deleted
     $stmt_p_c = sqlsrv_query( $conn, "Select Photo, CVlink from emp_details WHERE Email ='".$email."' ;",array());
     $rows = sqlsrv_fetch_array($stmt_p_c, SQLSRV_FETCH_ASSOC);

     if($rows["Photo"]=="" or $rows["Photo"]==NULL)
     {
       $stmt = sqlsrv_query( $conn, "EXEC DeleteEmp_by_id @emp_id='".$email."' ;",array());
     }
     else{
       $photo = "Added_Image/" . $rows["Photo"];
       if(!unlink($photo))
       {
         echo "Error deleting employee<br>cant delete the profile pic,pls try again";
       }
       else{
         $stmt = sqlsrv_query( $conn, "EXEC DeleteEmp_by_id @emp_id='".$email."' ;",array());
       }
     }
     // $photo = "Added_Image/" . $rows["Photo"];
     // $CVlnik = "Added_CV/" . $rows["CVlink"];
     // unlink($photo);
     // unlink($CVlnik);


     $param_2 =array($email);
     //needed to be corrected for subjects

     // $stmt_make_null = sqlsrv_query($conn, "UPDATE Subjects_table SET Emp_Id =NULL WHERE Emp_Id=?",$param_2);






     $stmt_make_null = sqlsrv_query($conn, "EXEC MakeSubjectNull_by_email @emp_id=?",$param_2);
     //not checked but should be working




     if(($stmt and $stmt_make_null) ==true)
     {
       ?>
       <form>
       	<input id="submit" type="button" value="Return to previous page" onClick="javascript:history.go(-1)" />
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
  document.getElementById("submit").click();
  </script>

</head>
<body>
  <h1><?php echo $email ?></h1>
</body>
</html>
