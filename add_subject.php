<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $Sub_Code = $_POST['Sub_Code'];
     $Subject = $_POST['Subject'];
     $Semester = $_POST['Semester'];
     $Emp_Id = $_POST['Emp_Id'];
     if($Emp_Id=="")
      $Emp_Id = NULL;

     //$subject = $_POST['subject'];
     //$sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
     $params = array($Sub_Code,$Subject,$Semester,$Emp_Id);
     //$stmt = sqlsrv_query( $conn,"Insert into Subjects_table (Sub_Code, Subject, Semester, Emp_Id) VALUES (?,?,?,?);",$params);

     $stmt = sqlsrv_query( $conn,"EXEC AddSub @sub_c=?, @sub=?, @emp_id=?, @sem=?;",$params);


     //echo '$stmt';
     if($stmt!=NULL)
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
  <h1></h1>
</body>
</html>
