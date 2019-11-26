<?php
session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Admin")
  { ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin->Manage Subject </title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
 <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
    </head>

<body>
  <?php include 'nav-bar.php' ?>
  <?php include 'connection.php'?>
  <!-- php code for connecting to the database -->
  <?php
     $stmt = sqlsrv_query( $conn, "select * from Subjects_table",array()); //making query and storing it in stmt variable
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
      <h4>List Of Subjects</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped table-hover">
          <thead class="thead-dark">
            <th>Subject Code</th>
            <th>Subject</th>
            <th>Employee Id</th>
            <th>Semester</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
          ?>
            <tr>

            <td><?php echo $rows["Sub_Code"] ?></td>
            <td><?php echo $rows["Subject"]?></td>
            <td><?php echo $rows["Emp_Id"]?></td>
            <td><?php echo $rows["Semester"]?></td>
            <!-- delete and edit -->
            <td>
              <button class="btn btn-primary btn-xs" onclick="show_edit_modal('<?php echo $rows["Sub_Code"] ?>');" id="edit_subject_btn" value="<?php echo $rows["Sub_Code"] ?>">
              </button>
            </td>
            <td>
              <form onsubmit="return validate(this);" action="delete_subject.php" method="post" data-placement="top" data-toggle="tooltip">
               <button class="btn btn-danger btn-xs"  name="submit" value="<?php echo $rows['Sub_Code']?>" >
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
        return confirm('Do you really want to delete this subject');
    }
}
</script>
  <!-- eding the php script and closing the connection -->
  <?php sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn);
  ?>

  <!-- add subject button and its modal -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_subject" >Add Subjects</button>
        <!-- modal -->
        <div class="modal fade" id="add_subject" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add The Subject</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="add_subject.php" method="post">
            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                  <label for="name">Subject Code (eg KCS-103)</label>
                  <input type="name" class="form-control" name="Sub_Code">
                </div>
                <div class="form-group">
                  <label for="empno">Subject Name</label>
                  <input type="text" class="form-control" name="Subject">
                </div>
                <div class="form-group">
                  <label for="empno">Semester</label>
                  <input type="text" class="form-control" name="Semester">
                </div>
                <div class="form-group">
                  <label for="empno">Employee Id</label>
                  <input type="text" class="form-control" name="Emp_Id">
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

          <!-- modal to edit the rows -->
          <div class="modal fade" id="edit_subject_modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit The Subject</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="edit_subject.php" method="post">
              <!-- Modal body -->
              <div class="modal-body">

                  <div class="form-group">
                    <label for="name">Subject Code (eg KCS-103)</label>
                    <input type="name" class="form-control" name="Sub_Code">
                  </div>
                  <div class="form-group">
                    <label for="empno">Subject Name</label>
                    <input type="text" class="form-control" name="Subject">
                  </div>
                  <div class="form-group">
                    <label for="empno">Semester</label>
                    <input type="text" class="form-control" name="Semester">
                  </div>
                  <div class="form-group">
                    <label for="empno">Employee Id</label>
                    <input type="text" class="form-control" name="Emp_Id">
                  </div>
                  <input type="hidden" id="old_Sub_Code_id" name="old_Sub_Code">

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
  <script>
//   $(document).ready(function(){
//   $("#edit_subject_btn").click(function(){
//     // document.getElementById("old_Sub_Code").value
//     $("#edit_subject").modal();
//   });
// });

  </script>
  <script>
  old_id = document.getElementById("old_Sub_Code_id");
  function show_edit_modal(sub) {
    //var sub_c = document.getElementById("edit_subject_btn").value;
    old_id.value = sub;
    $("#edit_subject_modal").modal();
  }

  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>


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
  } ?>
