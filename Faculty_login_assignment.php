<?php
session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Faculty")
  {
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Faculty->Assignments </title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="Faculty_login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">
    </head>
    <!-- <style media="screen">
      .container{
        margin-left: 16%;
      }
      .row{
        margin-left: 3rem;
        margin-top: 3rem;
      }
    </style> -->
<body>
  <?php include 'nav-bar.php' ?>
  <?php include 'Sidebar_Faculty.php' ?>
  <?php include 'connection.php'?>
  <!-- php code for connecting to the database -->
  <?php
     //$stmt = sqlsrv_query( $conn, "select * from Assignment A inner join emp_details E on A.Emp_Id = E.EmpNo where E.Designation=2 and E.Email = ? ",array($_SESSION['email'])); //making query and storing it in stmt variable
     $stmt = sqlsrv_query( $conn, "EXEC GetAssg_of_faculty @email=?;",array($_SESSION['email']));
  // for displaying the top of the page

  ?>

  <?php
  //checking the result of fetching the contents
    if ($stmt !== NULL) {
      //echo "printing the table\n";
  ?>
  <div class="content1">
  <div class="row">
    <div class="col-md-12">
      <h4>List Of Assignments</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead class="thead-dark">
            <th>Heading</th>
            <th>Published On</th>
            <th>Due Date</th>
            <th>Published By</th>
            <th>Download</th>
            <th>Subject</th>
            <!-- <th>Edit</th> -->
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
          ?>
            <tr>

            <td><?php echo $rows["Heading"] ?></td>
            <td><?php echo $rows["Published_date"]?></td>
            <td><?php echo $rows["Due_date"]?></td>
            <td><?php echo $rows["Emp_Id"]?></td>
            <td><a target="_blank" href="<?php echo "Added_Assignment/".$rows["Assg_Link"]?>">Click</a></td>
            <td><?php echo $rows["Sub_Code"]?></td>
            <!-- <td><?php echo $rows["Assg_Link"] ?></td> -->

            <!-- delete and edit -->
            <!-- <td>
              <button class="btn btn-primary btn-xs" onclick="show_edit_modal('<?//php echo $rows['Assg_Id'] ?>')" id="edit_assignment_btn" value="<?//php echo $rows['Assg_Id'] ?>">
              </button>
            </td> -->

            <!-- delete option -->
            <td>
              <form onsubmit="return validate(this);" action="delete_assignment.php" method="post" data-placement="top" data-toggle="tooltip">
               <button class="btn btn-danger btn-xs"  name="submit" value="<?php echo $rows['Assg_Id']?>" >
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </form>
           </td>
            </tr>
          <?php
          }
          }
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- delete function if want to do it through js -->
  <script>
    function delete_assignment(eid){

    }
  </script>
  <script>
function validate(form) {

    // validation code here ...


    if(false) {
        alert('Please correct the errors in the form!');
        return false;
    }
    else {
        return confirm('Do you really want to submit the form?');
    }
}
</script>
  <!-- eding the php script and closing the connection -->
  <?php //sqlsrv_free_stmt($stmt);
  //sqlsrv_close($conn);
  ?>

  <!-- add faculty button and its modal -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_faculty" >Add Assignments</button>
        <!-- modal -->
        <div class="modal fade" id="add_faculty" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">


            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add The Assignment</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="add_to_ass_table.php" method="post" enctype="multipart/form-data">
            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                  <label for="heading">Heading:</label>
                  <input type="name" class="form-control" name="heading">
                </div>
                <div class="form-group">
                  <label for="link">Upload Assignment:</label><br>
                  <input id="link" type="file" class="" name="AssgFile">
                </div>

                <input type="hidden" class="form-group" name="Emp_Id" value="<?php echo $emp_id; ?>"></input>
                <div class="form-group">
                  <label for="Subject">Select Subject</label>
                  <?php $stmt=sqlsrv_query( $conn, "EXEC GetAllSubjects;",array());
                  if ($stmt !== NULL) {
                  ?>
                  <select class="form-control" id="Subject" name="Sub_Code">
                    <?php while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                     ?>
                    <option value="<?php echo $rows["Sub_Code"] ?>"><?php echo $rows["Subject"] ?></option>
                  <?php }
                } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="Due_date">Select Due Date</label>
                  <input type="date" class="form-control" name="Due_date">
                </div>


            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button id="submit_modal" type="submit" class="btn btn-success">Submit</input>
              <button id="close_modal" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>

          </div>
          </div>
          </div>


          <!-- modal to edit Assignment -->
          <div class="modal fade" id="edit_assignment_modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">


              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit This Assignment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="edit_assignment.php" method="post">
              <!-- Modal body -->
              <div class="modal-body">

                  <div class="form-group">
                    <label for="heading">Heading:</label>
                    <input type="name" class="form-control" name="heading">
                  </div>
                  <div class="">
                    <label for="link">Upload Assignment:</label><br>
                    <input id="link" type="file" class="" name="AssgFile">
                  </div><br>
                  <div class="form-group">
                    <label for="Emp_Id">By Faculty</label>
                    <input type="text" class="form-control" name="Emp_Id">
                  </div>
                  <input type="hidden" id="old_Assg_Id_id" name="old_Assg_Id">
                  <div class="form-group">
                    <label for="Subject">Select Subject</label>
                    <?php $stmt=sqlsrv_query( $conn, "EXEC GetAllSubjects;",array());
                    if ($stmt !== NULL) {
                    ?>
                    <select class="form-control" id="Subject" name="Sub_Code">
                      <?php while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                       ?>
                      <option value="<?php echo $rows["Sub_Code"] ?>"><?php echo $rows["Subject"] ?></option>
                    <?php }
                  } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Due_date">Select Due Date</label>
                    <input type="date" class="form-control" name="Due_date">
                  </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button id="submit_modal" type="submit" class="btn btn-success">Submit</input>
                <button id="close_modal" type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              </form>

            </div>
            </div>
            </div>

  </div>
  </div>
  </div>
<!-- was for edit assg -->
  <!-- <script>
  old_id = document.getElementById("old_Assg_Id_id");
  function show_edit_modal(sub) {
    //var sub_c = document.getElementById("edit_assignment_btn").value;
    old_id.value = sub;
    $("#edit_assignment_modal").modal();
  }

  </script> -->
  <script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
  <script src="jquery/popper.min.js" crossorigin="anonymous"></script>
  <script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
</div>
</body>
</html>
<?php
  }
  else {
    echo "access denied";
  }
  }
  else {
    echo "Login required";
  }
?>
  <?php sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn);
 ?>
