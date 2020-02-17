<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $heading = $_POST['heading'];
     $link = $_POST['link'];
     $Published_date = date("d-m-Y");
     $published_by = $_POST['published_by'];
     $old_Notice_Id = $_POST["old_Notice_Id"];
     //$subject = $_POST['subject'];
     //$sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
     $params = array($link,$Published_date,$published_by,$heading,$old_Notice_Id);
     //$stmt = sqlsrv_query( $conn,"Update Notice_table set Notice_Link=?, Published_Date=?, Published_By=?, Heading=? where Notice_Id=?;",$params);
     $stmt = sqlsrv_query( $conn,"UpdateNotice_on_id @link=?, @pub_d=?, @pub_by=?, @head=?, @notice_id=?;",$params);

//file selected for notice then update link and ipload file

     echo '$stmt';
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
