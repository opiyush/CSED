<html>
<head>
  <?php
     $server = "HARSH";
     $conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );
     $email = $_POST['submit'];
     $stmt = sqlsrv_query( $conn, "DELETE from emp_details WHERE Email ='".$email."' ;",array());

     //for deleting the files after a faculty is deleted
     // $stmt_p_c = sqlsrv_query( $conn, "Select Photo, CVlink from emp_details WHERE Email ='".$email."' ;",array());
     // $rows = sqlsrv_fetch_array($stmt_p_c, SQLSRV_FETCH_ASSOC);
     // $photo = "Added_Image/" . $rows["Photo"];
     // $CVlnik = "Added_CV/" . $rows["CVlink"];
     // unlink($photo);
     // unlink($CVlnik);


     $param_2 =array($email);
     //needed to be corrected for subjects
     $stmt_make_null = sqlsrv_query($conn, "UPDATE Subjects_table SET Emp_Id =NULL WHERE Emp_Id=?",$param_2);
     if($stmt and $stmt_make_null ==true)
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
