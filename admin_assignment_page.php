<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin->Assignments </title>
    <link rel="stylesheet" href="Login.css">
    <!-- <link rel="stylesheet" href=""> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <!-- <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> -->
  </head>

<body>
  <?php include 'header.php' ?>
  <?php include 'connection.php'?>
  <!-- php code for connecting to the database -->
  <?php
     $stmt = sqlsrv_query( $conn, "select * from Assignment",array()); //making query and storing it in stmt variable
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
    <div class="col-md-12">
      <h4>List Of Assignments</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
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

            <td><?php echo $rows["Heading"] ?></td>
            <td><?php echo $rows["Published_date"]?></td>
            <td><?php echo $rows["Due_date"]?></td>
            <td><?php echo $rows["Emp_Id"]?></td>
            <td><?php echo $rows["Assg_Link"]?></td>
            <td><?php echo $rows["Sub_Code"]?></td>

            <!-- delete and edit -->
            <td><p data-placement="top" data-toggle="tooltip" title="Edit">
              <form onsubmit="return validate(this);" action="Edit_on_eno.php" method="post">
              <button class="btn btn-primary btn-xs"  >
                <span class="glyphicon glyphicon-pencil"></span>
              </button></form>
            </p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete">
              <form onsubmit="return validate(this);" action="delete_assignment.php" method="post">
               <button class="btn btn-danger btn-xs"  name="submit" value="<?php echo $rows['Assg_Id']?>" >
                <span class="glyphicon glyphicon-trash"></span>
              </button>
            </form>
            </p></td>
            </tr>
          <?php
          }
          }
          ?>
          </tbody>
        </table>

        <!-- page number and next page code -->
        <div class="clearfix"></div>
        <ul class="pagination pull-right">
          <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
        </ul>
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
  <?php sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn);
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
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add The Assignment</h4>
            </div>
            <form action="add_to_ass_table.php" method="post">
            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                  <label for="name">Heading:</label>
                  <input type="name" class="form-control" name="heading">
                </div>
                <div class="form-group">
                  <label for="empno">Link:</label>
                  <input type="text" class="form-control" name="link">
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

</body>
</html>
