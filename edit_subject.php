<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $Sub_Code = $_POST['Sub_Code'];
     $Subject = $_POST['Subject'];
     $Semester = $_POST['Semester'];
     $Emp_Id = $_POST['Emp_Id'];
     $old_Sub_Code = $_POST['old_Sub_Code'];
     if($Emp_Id=="")
      $Emp_Id = NULL;

     //$subject = $_POST['subject'];
     //$sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
     $params = array($Sub_Code,$Subject,$Semester,$Emp_Id,$old_Sub_Code);
     $stmt = sqlsrv_query( $conn,"Update Subjects_table set Sub_Code=?, Subject=?, Semester=?, Emp_Id=? where Sub_Code=?;",$params);
     //echo '$stmt';
     if($stmt!=NULL)
     {
       echo "true";
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
  <h1></h1>
</body>
</html>
