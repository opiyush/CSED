<html>
<head>
  <!-- professional bodies, Adminstrative Responsibilty,  Academic Responsibilty, Awards Honors,Country Visited -->
  <?php include 'connection.php' ?>
  <?php
     $Heading = $_POST['Heading'];
     $Data = $_POST['Data'];
     $Date = date("d-m-Y");
     $Uploaded_By = $_POST['Uploaded_By'];
     $Category=$_POST['Category'];
     //$subject = $_POST['subject'];
     //$sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
     $params = array($Heading,$Data,$Date,$Uploaded_By, $Category);

     $stmt = sqlsrv_query( $conn,"Insert into Other_Uploads (Heading, Data, Date, Uploaded_By, Category) VALUES (?,?,?,?, ?);",$params);
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
