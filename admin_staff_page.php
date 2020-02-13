<?php
 session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Admin")
  {
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin->staff </title>
    <link rel="stylesheet" href="header.css">
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>

<body>
  <?php include 'nav-bar.php' ?>
  <?php include 'connection.php' ?>
  <!-- php code for connecting to the database -->
  <?php
     $stmt = sqlsrv_query( $conn, "EXEC GetAllStaff",array()); //making query and storing it in stmt variable
  // for displaying the top of the page
  ?>

  <!-- scripts were here -->

  <?php
  //checking the result of fetching the contents
    if ($stmt !== NULL) {
      //echo "printing the table\n";
  ?>
  <div class="container">
  <div class="row">
    <div class="table_layout">
      <h4>List Of staff</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead class="thead-dark">
            <th>Name</th>
            <th>Employee No</th>
            <th>Email</th>
            <th>UserId</th>
            <th>Password</th>
            <th>Phn1</th>
            <th>Phn2</th>
            <th>Degree</th>
            <th>CV Link</th>
            <th>Photo Link</th>
            <th>Designation</th>
            <th>Active</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
          ?>
            <tr>
              <td><?php echo $rows["Name"] ?></td>
              <td><?php echo $rows["EmpNo"]?></td>
              <td><?php echo $rows["Email"]?></td>
              <td><?php echo $rows["UserId"]?></td>
              <td><?php echo $rows["Password"]?></td>
              <td><?php echo $rows["Phn1"]?></td>
              <td><?php echo $rows["Phn2"]?></td>
              <td><?php echo $rows["Degree"]?></td>
              <td><?php echo $rows["CVlink"]?></td>
              <td><?php echo $rows["Photo"]?></td>
              <td><?php echo $rows["Designation"]?></td>
              <td><?php echo $rows["Active"]?></td>
            <!-- delete and edit -->
            <td>
              <button class="btn btn-primary btn-xs"
              onclick='show_edit_modal("<?php echo $rows["Email"] ?>","<?php echo $rows["Name"];?>","<?php echo $rows["Password"];?>","<?php echo $rows["Phn1"];?>","<?php echo $rows["Phn2"];?>","<?php echo $rows["Degree"];?>","<?php echo $rows["EmpNo"];?>");'
              id="edit_faculty_btn" value="<?php echo $rows['Email'] ?>">
              </button>
            </td>
            <td>

              <form onsubmit="return validate(this);" action="delete_on_eno.php" method="post" data-placement='top' data-toggle='tooltip'>
               <button class="btn btn-danger btn-xs"  name="submit" value="<?php echo $rows['Email']?>" >
                <!-- <span class="glyphicon glyphicon-trash"></span> -->
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
    function delete_staff(eid){

    }
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
  <?php sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn);
  ?>

  <!-- add staff button and its modal -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_staff" >Add staff</button>
        <!-- modal -->

        <div class="modal fade" id="add_staff" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add The Details</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form action="add_to_table.php" method="post">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                  <label for="name">Name:</label>
                  <input type="name" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="text" class="form-control" name="email">
                </div>
                <!-- <div class="form-group">
                  <label for="sel1">Subject list:</label>
                  <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div> -->
                <input type="hidden" name="Designation" value="3">
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit</input>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            </form>

          </div>
          </div>
          </div>

      </div>
      </div>
      </div>

          <!-- modal to edit faculty details -->
          <div class="modal fade" id="edit_faculty_modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Edit Faculty's Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="edit_employee.php" method="post" enctype="multipart/form-data">
              <!-- Modal body -->
              <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Name:</label>
                    <input id="name_edit" type="name" class="form-control" name="name">
                  </div>
                  <!-- <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" name="email">
                  </div> -->
                  <div class="form-group">
                    <label for="EmpNo">Employe No:</label>
                    <input id="EmpNo_edit" type="text" name="EmpNo" placeholder="Employe No" required class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Password">Password:</label>
                    <input id="Password_edit" type="text" name="Password" placeholder="Password" required class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Phn1">Phone Primary(10 digits):</label>
                    <input id="Phn1_edit" type="text" name="Phn1" placeholder="Contact No." required class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Phn2">Phone Secondary(10 digits):</label>
                    <input id="Phn2_edit" type="text" name="Phn2" placeholder="Alternate Contact No." class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="Degree">Degree:</label>
                    <input id="Degree_edit" type="text" name="Degree" placeholder="Degree" required class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="CVlink">Upload CV:</label><br>
                    <input id="CVlink_edit" type="file" name="CVLink" id="cvToUpload" class="">
                  </div>
                  <label for="PhotoToUpload">Upload Photo:</label><br>
                  <input id="Photo_edit" type="file" name="Photo" id="PhotoToUpload" class=""><br>
                  <!-- continue eduiting -->
                  <input type="hidden" name="Designation" value="3">
                  <input type="hidden" id="old_Email_id" name="old_Email">
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Submit</input>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              </form>

            </div>
            </div>
            </div>



  <script>
  old_id = document.getElementById("old_Email_id");
  name_id = document.getElementById("name_edit");
  EmpNo_id = document.getElementById("EmpNo_edit");
  Phn1_id = document.getElementById("Phn1_edit");
  Phn2_id = document.getElementById("Phn2_edit");
  Degree_id = document.getElementById("Degree_edit");
  Password_id = document.getElementById("Password_edit");
  function show_edit_modal(sub_c,name,Pass,Phn1,Phn2,Degree,Emp) {
    old_id.value = sub_c;
    name_id.value=name;
    EmpNo_id.value = Emp;
    Phn1_id.value = Phn1;
    Phn2_id.value = Phn2;
    Degree_id.value = Degree;
    Password_id.value = Pass;
    $("#edit_faculty_modal").modal();
  }
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>


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
