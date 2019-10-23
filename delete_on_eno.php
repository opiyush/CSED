<html>
<head>
  <?php
     $server = "HARSH";
     $conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );
     $empid = $_POST['submit'];
     $stmt = sqlsrv_query( $conn, "DELETE from emp_details WHERE EmpNo ='".$empid."' ;",array());
     $param_2 =array($empid);
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
  <h1><?php echo $empid ?></h1>
</body>
</html>
