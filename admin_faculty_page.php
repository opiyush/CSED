<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin->Faculty </title>
    <link rel="stylesheet" href="admin_page.css">
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
      <h4>List Of Faculty</h4>
      <div class="table-responsive">
        <table id="mytable" class="table table-bordred table-striped">
          <thead>
            <th><input type="checkbox" id="checkall" /></th>
            <th>Name</th>
            <th>Employee No</th>
            <th>Edit</th>
            <th>Delete</th>
          </thead>
          <tbody>
          <?php
          while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
          ?>
            <tr>
            <td><input type="checkbox" class="checkthis" /></td>
            <td><?php echo $rows["Name"] ?></td>
            <td><?php echo $rows["EmpNo"]?></td>
            <!-- delete and edit -->
            <td><p data-placement="top" data-toggle="tooltip" title="Edit">
              <button class="btn btn-primary btn-xs"  >
                <span class="glyphicon glyphicon-pencil"></span>
              </button>
            </p></td>
            <td><p data-placement="top" data-toggle="tooltip" title="Delete">
              <form action="delete_on_eno.php" method="post">
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
    function delete_faculty(eid){

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
        <button class="btn btn-primary" data-toggle="modal" data-target="#add_faculty" >Add Faculty</button>
        <!-- modal -->

        <div class="modal fade" id="add_faculty" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Add The Details</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form action="add_faculty.php" method="post">
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
                <input type="submit" class="btn btn-default">Submit</input>
              </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            <html>
            <head>
              <?php
                 $server = "HARSH";
                 $conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );
                 if( $conn === false ) {
                 die( print_r( sqlsrv_errors(), true));
               }
                 $empno = $_POST['empno'];
                 $name = $_POST['name'];
                 //$subject = $_POST['subject'];
                 $sql = 'INSERT INTO Table_1 (Name, EmpNo) VALUES (?, ?)';
                 $params = array($name,$empno);
                 $stmt = sqlsrv_query( $conn,"Insert into Admin_teachers_table (Name, EmpNo) VALUES (?,?);",$params);

                 if($stmt==true)
                 {
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
              <h1><?php echo $empno ?></h1>
            </body>
            </html>

          </div>
          </div>
          </div>

  </div>
  </div>
  </div>

</body>
</html>
