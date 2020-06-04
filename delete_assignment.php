<html>
<head>
  <?php
  include "connection.php" ?>
  <?php
     $assgid = $_POST['submit'];
     $stmt = sqlsrv_query( $conn, "SELECT Assg_Link, Assg_Id FROM Assignment WHERE Assg_Id =?;",array($assgid));
     // $file_pointer = sqlsrv_get_field( $stmt, 0);
     $rows = sqlsrv_fetch_array($stmt,SQLSRV_SCROLL_FIRST);
     $file_pointer = $rows["Assg_Link"];
     // echo "file name<br>";
     // echo "$file_pointer<br>";
     // echo "id = ";
     // echo "$assgid";
     $stmt = NULL;
     if(!unlink('Added_Assignment/'.$file_pointer))
     {
       echo "Sorry, cant delete the file or file not found <br> Server ERROR occoured";
     }
     else{
       // echo "file is deleted";
       // $stmt = sqlsrv_query( $conn, "DELETE from Assignment WHERE Assg_Id ='".$assgid."' ;",array());
       $stmt = sqlsrv_query( $conn, "EXEC DeleteAssg_by_id @assg_id='".$assgid."' ;",array());
       // echo "Trying to remove entry";
     }

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
  <h1><?php echo $assgid ?></h1>
</body>
</html>
