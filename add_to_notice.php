<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $heading = $_POST['heading'];
     $NoticeLink = $_FILES['NoticeFile']["name"];
     $Published_date = date("Y-m-d/H:i");
     $uniqueId = date("His") . date("dmY");
     $published_by = $_POST['published_by'];
     //$subject = $_POST['subject'];
     //$sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';

     if(!empty($_FILES["NoticeFile"]["name"])){
       //upload cv
       $target_dir_n = "Added_Notices/";
       $temp = explode('.',$_FILES["NoticeFile"]["name"]);
       $ext_n = end($temp);
       $NoticeLink = $uniqueId . "Notice." . $ext_n;
       echo $target_file_n = $target_dir_n . $NoticeLink;
       $uploadOk_n = 1;
       if(strtolower($ext_n)!= "pdf")//checking whether pdf or not
           {
             $uploadOk_n = 0;
           }
       //$uploadOk_cv = 1;
       if ($uploadOk_n == 0) {

             // if everything is ok, try to upload file in else block
         }
       else
       {
         if (move_uploaded_file($_FILES["NoticeFile"]["tmp_name"], $target_file_n)) {
         }
         else {
         }
       }
     }

     $params = array($NoticeLink,$Published_date,$published_by,$heading);
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
