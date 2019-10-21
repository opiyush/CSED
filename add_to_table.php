<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $empno = $_POST['empno'];
     $name = $_POST['name'];
     //$subject = $_POST['subject'];
     $sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
     $params = array($name,$empno);
     $stmt = sqlsrv_query( $conn,"Insert into Admin_teachers_table (Name, EmpNo) VALUES (?,?);",$params);
     echo '$stmt';
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
  <h1><?php echo $empno ?></h1>
</body>
</html>
