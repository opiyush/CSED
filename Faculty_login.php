<?php session_start();
if(isset($_SESSION["role"])){
  if($_SESSION["role"]=="Faculty")
  {
  ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <head>
  <link rel="stylesheet" href="Faculty_login.css">
  <link rel="stylesheet" href="header.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Faculty</title>
  </head>
  <body>
    <?php include 'connection.php'?>
    <?php include 'nav-bar.php'?>
    <!-- php code for connecting to the database -->

    <!-- details are fetched in sidebar faculty only -->
    <?php include 'Sidebar_Faculty.php' ?>
     <div class="Details">
       <h2>Hello, <?php echo $rows["Name"] ?></h2>
       <br><br>

      <p><b>Name :</b>&nbsp;&nbsp;&nbsp;&nbsp;   <?php echo $rows["Name"] ?>  </p>
      <p><b>Employee No. :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["EmpNo"]?>  </p>
      <p><b>E-mail :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Email"]?> </p>
      <p><b>Password :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Password"]?>  </p>
      <p><b>Phone No. :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Phn1"]?>  </p>
      <p><b>Alternate Phone No. :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Phn2"]?>  </p>
      <p><b>Degree :</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $rows["Degree"]?>  </p>
      <br><br>
      <button class="btn btn-primary btn-xs"
      onclick='show_edit_modal("<?php echo $rows["Email"];?>","<?php echo $rows["Name"];?>","<?php echo $rows["Password"];?>","<?php echo $rows["Phn1"];?>","<?php echo $rows["Phn2"];?>","<?php echo $rows["Degree"];?>","<?php echo $rows["EmpNo"];?>","<?php echo $rows["Designation"];?>");'
      id="edit_faculty_btn" value="<?php echo $rows['Email'] ?>">Edit Details
      </button>
     </div>

     <!-- edit option modal -->
     <div class="modal fade" id="edit_faculty_modal" role="dialog">
     <div class="modal-dialog">
       <div class="modal-content">

         <!-- Modal Header -->
         <div class="modal-header">
           <h4 class="modal-title">Edit Your Details</h4>
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
               <input id="EmpNo_edit" type="text" name="EmpNo" placeholder="Employe No" class="form-control">
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
             <input type="hidden" name="Designation" id="desig_edit">
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
       Desig_id = document.getElementById("desig_edit");
       function show_edit_modal(old_id_var,name,Pass,Phn1,Phn2,Degree,Emp,desig) {
         old_id.value = old_id_var;
         name_id.value=name;
         EmpNo_id.value = Emp;
         Phn1_id.value = Phn1;
         Phn2_id.value = Phn2;
         Degree_id.value = Degree;
         Password_id.value = Pass;
         Desig_id.value = desig;
         $("#edit_faculty_modal").modal();
       }
       </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
