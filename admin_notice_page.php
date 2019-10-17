<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin->News and Announcements </title>
    <link rel="stylesheet" href="">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <!-- <script src="http://getbootstrap.com/dist/js/bootstrap.min.js"></script> -->


      <script>
      $(document).ready(function(){
        $("#mytable #checkall").click(function () {
                if ($("#mytable #checkall").is(":checked")) {
                    $("#mytable input[type=checkbox]").each(function
                       () {
                        $(this).prop("checked", true);
                    });

                } else {
                    $("#mytable input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });

            $("[data-toggle=tooltip]").tooltip();
        });
      </script>


  </head>

<body>

  <!-- php code for connecting to the database -->
  <?php
     $server = "HARSH";
     $conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );
     $stmt = sqlsrv_query( $conn, "select * from Admin_teachers_table",array()); //making query and storing it in stmt variable
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
      <h4>List Of Notices and Announcements</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <th>Heading</th>
            <th>Published On</th>
            <th>Published By</th>
            <th>Link</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
          ?>
            <tr>

            <!-- <td><?php //echo $rows["Heading"] ?></td>
            <td><?php //echo $rows["PublishedOn"]?></td>
            <td><?php //echo $rows["PublishedBy"]?></td>
            <td><?php //echo $rows["Link"]?></td> -->
            <td><?php echo $rows["Name"] ?></td>
            <td><?php echo $rows["EmpNo"]?></td>
            <!-- delete and edit -->
            <td><p data-placement="top" data-toggle="tooltip" title="Edit">
              <button class="btn btn-primary btn-xs"  >
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
            </p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete">
              <form onsubmit="return validate(this);" action="delete_on_eno.php" method="post">
               <button class="btn btn-danger btn-xs"  name="submit" value="<?php echo $rows['EmpNo']?>" >
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_faculty" >Add Notice</button>
        <!-- modal -->

        <div class="modal fade" id="add_faculty" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add The Notice</h4>
            </div>
            <form action="add_to_table.php" method="post">
            <!-- Modal body -->
            <div class="modal-body">

                <div class="form-group">
                  <label for="name">Heading:</label>
                  <input type="name" class="form-control" name="name">
                </div>
                <div class="form-group">
                  <label for="empno">Link:</label>
                  <input type="text" class="form-control" name="empno">
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Submit</input>
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
