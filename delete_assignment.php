<html>
<head>
  <?php include 'connection.php'?>
  <?php
     $assgid = $_POST['submit'];
     $stmt = sqlsrv_query( $conn, "DELETE from Assignment WHERE Assg_Id ='".$assgid."' ;",array());
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
