<html>
<head>
  <?php include 'connection.php' ?>
  <?php
     $heading = $_POST['heading'];
     $AssgLink = $_FILES["AssgFile"]["name"];
     $Published_date = date("Y-m-d/H:i");
     $uniqueId = date("His") . date("dmY");
     $Due_date = $_POST["Due_date"];
     $empid = $_POST["Emp_Id"];
     $sub_code =$_POST["Sub_Code"];

     // echo $AssgLink ." = This is the name<br>";
     $AssgLink = "";//initially set to null
     $stmt=NULL;//should be null only!!!!
     if(!empty($_FILES["AssgFile"]["name"])){
       //upload cv
       $target_dir_a = "Added_Assignment/";
       $temp = explode('.',$_FILES["AssgFile"]["name"]);
       $ext_a = end($temp);
       $AssgLink = $uniqueId . "Assignment." . $ext_a;
       // echo $target_file_a = $target_dir_a . $AssgLink;
       $uploadOk_a = 1;
       if(strtolower($ext_a)!= "pdf" and strtolower($ext_a)!= "txt")//checking whether pdf or not
           {
             $uploadOk_a = 0;
           }
       //$uploadOk_cv = 1;
       if ($uploadOk_a == 0) {

             // if everything is ok, try to upload file in else block
         }
       else
       {
         // echo "<br>uploading in progress";
         if (move_uploaded_file($_FILES["AssgFile"]["tmp_name"], $target_file_a)) {
           $params = array($AssgLink,$Published_date,$Due_date,$empid,$heading,$sub_code);
           $stmt = sqlsrv_query( $conn,"EXEC AddAssg @Assg_l=?, @pub_d=?, @due_d=?, @emp_id=?, @head=?, @sub_c=?;",$params);
           // echo "<br>uploaded successfully";
         }
         else {
           echo "Some error occoured please try again";
         }
       }
     }

     // $params = array($AssgLink,$Published_date,$Due_date,$empid,$heading,$sub_code);
     //$stmt = sqlsrv_query( $conn,"Insert into Assignment (Assg_Link, Published_date, Due_date, Emp_Id, Heading, Sub_Code) VALUES (?,?,?,?,?,?);",$params);
     // $stmt = sqlsrv_query( $conn,"EXEC AddAssg @Assg_l=?, @pub_d=?, @due_d=?, @emp_id=?, @head=?, @sub_c=?;",$params);

     // echo '$stmt';
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
