<html>
<head>
  <?php
     $server = "HARSH";
     $conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );
     $noticeid = $_POST['submit'];
     $stmt = sqlsrv_query( $conn, "DELETE from Notice_table WHERE Notice_Id ='".$empid."' ;",array());
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