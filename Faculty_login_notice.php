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
    <title>Faculty->Add/Remove Notice </title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="Faculty_login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <style media="screen">
      .container{
        margin-left: 16%;
      }
      .row{
        margin-left: 3rem;
        margin-top: 3rem;
      }
    </style>
<body>
  <?php include 'nav-bar.php' ?>


  <?php include 'Sidebar_Faculty.php' ?>
  <?php include 'connection.php'?>
  <!-- php code for connecting to the database -->
  <?php
     //$stmt = sqlsrv_query( $conn, "select N.Notice_Id,N.Heading,N.Published_By,N.Published_Date,N.Notice_Link from emp_details E inner join Notice_table N on E.EmpNo=N.Published_By where E.Email=?",array($_SESSION["email"])); //making query and storing it in stmt variable
     $stmt = sqlsrv_query( $conn, "EXEC GetNotice_of_emp @email=?",array($_SESSION["email"])); //making query and storing it in stmt variable

  // for displaying the top of the page
  ?>
  <!-- scripts were here -->
  <?php
  //checking the result of fetching the contents
    if ($stmt != NULL) {
      //echo "printing the table\n";
  ?>
  <div class="container">
  <div class="row">
    <div class="col-md-12">
      <h4>List Of Notices</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead class="thead-dark">
            <th>Heading</th>
            <th>Published On</th>
            <th>Published By</th>
            <th>Link</th>
            <!-- <th>Edit</th> -->
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
          ?>
            <tr>
            <td><?php echo $rows["Heading"] ?></td>
            <td><?php echo $rows["Published_Date"]?></td>
            <td><?php echo $rows["Published_By"]?></td>
            <td><?php echo $rows["Notice_Link"]?></td>
            <!-- delete and edit -->
            <!-- <td>
              <button class="btn btn-primary btn-xs" onclick="show_edit_modal('<?php echo $rows["Notice_Id"] ?>')" id="edit_notice_btn" value="<?php echo $rows['Notice_Id'] ?>">
              </button>
            </td> -->
            <td>
              <form onsubmit="return validate(this);" action="delete_notice.php" method="post" data-placement='top' data-toggle='tooltip'>
               <button class="btn btn-danger btn-xs"  name="submit" value="<?php echo $rows['Notice_Id'] ?>" >
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
    function delete_notice(eid){

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
        return confirm('Do you really want to delete this notice?');
    }
}
</script>


  <!-- eding the php script and closing the connection -->


  <!-- add faculty button and its modal -->
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_faculty" >Add Notice</button>
        <!-- modal -->
        <div class="modal fade" id="add_faculty" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add The Notice</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <form action="add_to_notice.php" method="post" enctype="multipart/form-data">
            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                  <label for="name">Heading:</label>
                  <input type="name" class="form-control" name="heading">
                </div>
                <div class="form-group">
                  <label for="empno">Upload Notice:</label><br>
                  <input type="file" class="" name="NoticeFile">
                </div>
                <div class="form-group">
                  <label for="Emp_Id">Published_By:</label>
                  <?php $stmt=sqlsrv_query( $conn, "EXEC GetAllFaculty;" ,array());
                  if ($stmt != NULL) {
                  ?>
                  <select class="form-control" id="emp" name="published_by">
                  <?php while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
                   ?>
                   <option value="<?php echo $rows["EmpNo"] ?>"><?php echo $rows["Name"];?> (<?php echo $rows["EmpNo"];?>)</option>
                  <?php }
                  } ?>
                  </select>
                  <!-- <input type="text" class="form-control" name="Emp_Id"> -->
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

          <!-- modal of edit notice -->
          <div class="modal fade" id="edit_notice_modal" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Add The Notice</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form action="edit_notice.php" method="post">
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
                  <div class="form-group">
                    <label for="empno">Published By:</label>
                    <input type="text" class="form-control" name="published_by">
                  </div>
                  <input type="hidden" id="old_Notice_Id_id" name="old_Notice_Id">
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
<!-- was for edit notice -->
  <!-- <script>
  old_id = document.getElementById("old_Notice_Id_id");
  function show_edit_modal(sub) {
    //var sub = document.getElementById("edit_Notice_btn").value;
    old_id.value = sub;
    // document.getElementById("display").value = sub;
    $("#edit_notice_modal").modal();
  }
  </script> -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>

  <!-- <input type="text" name="display" value="hello" id="display"> -->

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

  <?php sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn);
  ?>
