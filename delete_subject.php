<html>
<head>

  <?php
  include "connection.php" ?>
  <?php
     $Sub_Code = $_POST['submit'];
     //$stmt = sqlsrv_query( $conn, "DELETE from Subjects_table WHERE Sub_Code ='".$Sub_Code."' ;",array());
     $stmt = sqlsrv_query( $conn, "EXEC DeleteSubject_by_code @sub_code='".$Sub_Code."';",array());
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
  <h1><?php echo $Sub_Code ?></h1>
</body>
</html>
