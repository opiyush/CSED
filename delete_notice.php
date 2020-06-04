<html>
<head>
  <?php
  include "connection.php" ?>
  <?php

     $noticeid = $_POST['submit'];
     $stmt = sqlsrv_query( $conn, "SELECT Notice_Link, Notice_Id FROM Notice_table WHERE Notice_Id =?;",array($noticeid));
     $rows = sqlsrv_fetch_array($stmt,SQLSRV_SCROLL_FIRST);
     $file_pointer = $rows["Notice_Link"];
     // echo $file_pointer;
     // $stmt = sqlsrv_query( $conn, "EXEC DeleteNotice_by_id @notice_id=?;",array($noticeid));
     $stmt = NULL;//should be NULL!!!!
     if(!unlink('Added_Notices/'.$file_pointer))
     {
       echo "Sorry, cant delete the file or file not found <br> Server ERROR occoured";
     }
     else{
       // echo "file is deleted";
       // $stmt = sqlsrv_query( $conn, "DELETE from Notice_table WHERE Notice_Id =?;",array($noticeid));
       $stmt = sqlsrv_query( $conn, "EXEC DeleteNotice_by_id @notice_id=?;",array($noticeid));
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
  <h1><?php echo $noticeid ?></h1>
</body>
</html>
