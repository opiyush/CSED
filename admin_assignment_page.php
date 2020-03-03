<?php
session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Admin" or $_SESSION["role"]=="HOD")
  {
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin->Assignments </title>
    <link rel="stylesheet" href="header.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

<body>
  <?php include 'nav-bar.php' ?>
  <?php include 'connection.php'?>
  <!-- php code for connecting to the database -->
  <?php
     $stmt = sqlsrv_query( $conn, "EXEC GetAllAssignment;",array()); //making query and storing it in stmt variable
  // for displaying the top of the page
  ?>

  <?php
  //checking the result of fetching the contents
    if ($stmt !== NULL) {
      //echo "printing the table\n";
  ?>
  <div class="container">
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
            <th>Link</th>
            <th>Subject</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
          ?>
            <tr>
            <td><?php echo substr($rows["Heading"], 0, 8).".." ?></td>
            <td><?php echo $rows["Published_date"]?></td>
            <td><?php echo $rows["Due_date"]?></td>
            <td><?php echo $rows["Emp_Id"]?></td>
            <td><?php echo substr($rows["Assg_Link"],0,8).".."?></td>
            <td><?php echo $rows["Sub_Code"]?></td>

            <!-- delete and edit -->
            <td>
              <button class="btn btn-primary btn-xs"
              onclick='show_edit_modal("<?php echo $rows['Assg_Id'];?>","<?php echo $rows["Heading"];?>","<?php echo $rows["Due_date"];?>","<?php echo $rows["Sub_Code"];?>","<?php echo $rows["Emp_Id"] ?>")'
                 id="edit_assignment_btn" value="<?php echo $rows['Assg_Id'] ?>">
              </button>
            </td>
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
                <div class="">
                  <label for="link">Upload Assignment:</label><br>
                  <input id="link" type="file" class="" name="AssgFile">
                </div><br>
                <div class="form-group">
                  <label for="Emp_Id">By Faculty</label>
                  <?php $stmt=sqlsrv_query( $conn, "EXEC GetAllEmp_name_eid;",array());
                  if ($stmt != NULL) {
                  ?>
                  <select class="form-control" id="emp" name="Emp_Id">
                  <?php while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                   ?>
                   <option value="<?php echo $rows["EmpNo"] ?>"><?php echo $rows["Name"];?> (<?php echo $rows["EmpNo"];?>)</option>
                  <?php }
                  } ?>
                  </select>
                  <!-- <input type="text" class="form-control" name="Emp_Id"> -->
                </div>
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
                  <label for="duedate">Select Due Date</label>
                  <input id="duedate" type="date" class="form-control" name="Due_date">
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

              <?php $stmt=sqlsrv_query( $conn, "EXEC GetAllSubjects;",array());
              if ($stmt !== NULL) {
              ?>
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
                    <input id="heading_edit" type="name" class="form-control" name="heading">
                  </div>
                  <!-- <div class="form-group">
                    <label for="link">Link:</label>
                    <input id="Link_edit" type="text" class="form-control" name="link">
                  </div> -->
                  <div class="form-group">
                    <label for="Emp_Id">By Faculty</label>
                    <input id="Emp_Id_edit" type="text" class="form-control" name="Emp_Id">
                  </div>
                  <input type="hidden" id="old_Assg_Id_id" name="old_Assg_Id">
                  <div class="form-group">
                    <label for="Subject">Select Subject</label>
                    <select class="form-control" id="Subject_edit" name="Sub_Code">
                      <?php while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                       ?>
                      <option value="<?php echo $rows["Sub_Code"] ?>"><?php echo $rows["Subject"] ?></option>
                    <?php }
                  } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="Due_date">Select Due Date</label>
                    <input id="Due_date_edit" type="date" class="form-control" name="Due_date">
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
  <!-- is of edit Assignment  -->

  <script>
  old_id = document.getElementById("old_Assg_Id_id");
  heading_id = document.getElementById("heading_edit");
  Subject_id = document.getElementById("Subject_edit");
  Due_date_id = document.getElementById("Due_date_edit");
  Emp_id = document.getElementById("Emp_Id_edit");
  //heading_id = document.getElementById("heading_edit");
  function show_edit_modal(asg,head,dueDate,sub,Emp) {
    //var sub_c = document.getElementById("edit_assignment_btn").value;
    old_id.value = asg;
    heading_id.value = head;
    Subject_id.value = sub;
    Due_date_id.value = dueDate;
    Emp_id.value = Emp;
    $("#edit_assignment_modal").modal();
  }

  </script>

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
