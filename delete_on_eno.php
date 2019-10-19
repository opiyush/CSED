<html>
<head>
  <?php include 'connection.php'?>
  <?php
     $empid = $_POST['submit'];
     $stmt = sqlsrv_query( $conn, "DELETE from emp_details WHERE EmpNo ='".$empid."' ;",array());
     if($stmt==true)
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
