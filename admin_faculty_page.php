<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin->Faculty </title>
    <link rel="stylesheet" href="Login.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
<body>
  <?php include 'header.php' ?>
  <?php include 'connection.php'?>
  <!-- php code for connecting to the database -->
  <?php
     $stmt = sqlsrv_query( $conn, "select * from emp_details",array()); //making query and storing it in stmt variable
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
      <h4>List Of Faculty</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped" style="word-wrap: break-word;">
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
            <td><?php echo $rows["phn1"]?></td>
            <td><?php echo $rows["phn2"]?></td>
            <td><?php echo $rows["Degree"]?></td>
            <td><?php echo $rows["CVlink"]?></td>
            <td><?php echo $rows["Photo"]?></td>
            <td><?php echo $rows["Designation"]?></td>
            <!-- delete and edit -->
            <td><p data-placement="bottom" data-toggle="tooltip" title="Edit">
              <button class="btn btn-primary btn-xs"  >
                <!-- <span class="btn-edit"></span> -->
              </button>
            </p></td>
            <td>

              <form onsubmit="return validate(this);" action="delete_on_eno.php" method="post" data-placement='top' data-toggle='tooltip'>
               <button class="btn btn-danger btn-xs"  name="submit" value="<?php echo $rows['EmpNo']?>" >
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
    function delete_faculty(eid){

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

  <!-- add faculty button and its modal -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div style="padding:10px">
          <button class="btn btn-primary" data-toggle="modal" data-target="#add_faculty" >Add Faculty</button>
        </div>
        <!-- modal -->

        <div class="modal fade" id="add_faculty" role="dialog">
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
                  <label for="empno">Employee Number:</label>
                  <input type="text" class="form-control" name="empno">
                </div>
                <div class="form-group">
                  <label for="sel1">Subject list:</label>
                  <select class="form-control" id="sel1">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                  </select>
                </div>
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

</body>
</html>
