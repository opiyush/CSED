<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $heading = $_POST['heading'];
     $link = $_POST['link'];
     $Published_date = date("d-m-Y");

     $published_by = $_POST['published_by'];
     //$subject = $_POST['subject'];
     //$sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
     $params = array($link,$Published_date,$published_by,$heading);
     $stmt = sqlsrv_query( $conn,"Insert into Notice_table (Notice_Link, Published_Date, Published_By, Heading) VALUES (?,?,?,?);",$params);
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
