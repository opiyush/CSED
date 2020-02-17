<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $heading = $_POST['heading'];
     //$link = $_POST['link'];
     $Published_date = date("d-m-Y");
     $Due_date = $_POST["Due_date"];
     $empid = $_POST["Emp_Id"];
     $sub_code =$_POST["Sub_Code"];
     $old_Assg_Id = $_POST["old_Assg_Id"];
     //$subject = $_POST['subject'];
     //$sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
     $params = array($Published_date,$Due_date,$empid,$heading,$sub_code,$old_Assg_Id);
     echo $old_Assg_Id;
     //$stmt = sqlsrv_query( $conn,"Update Assignment set Published_date=?, Due_date=?, Emp_Id=?, Heading=?, Sub_Code=? where Assg_Id=?;",$params);
     $stmt = sqlsrv_query( $conn,"EXEC UpdateAssg_on_id @pub_d = ?, @due_d = ?, @emp_id = ?, @head = ?, @sub_c = ?, @assg_id = ?;",$params);
     //echo $params[4];
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
