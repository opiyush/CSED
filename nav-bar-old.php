<nav id="navi" class="navbar navbar-expand-lg " style="background-color: #01456600;color:#014566;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="Front_Page.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">About <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="Faculty.php">Faculty <span class="sr-only">(current)</span></a>
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Academic Corner
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="Assignment1.php">Assignment</a>
        <a class="dropdown-item" href="Pre_paper.php">Previous Paper</a>
        <a class="dropdown-item" href="Scedule.php">Schedule</a>
      </div>
    </li>
      <a class="nav-item nav-link" href="Staff.php">Staff <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Infrastructure <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="Library.php">Library <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Alumni <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="#">Placement <span class="sr-only">(current)</span></a>
      <?php
      if(isset($_SESSION["role"]))
      {
        if(!($_SESSION["role"]=="Admin" or $_SESSION["role"]=="HOD" or $_SESSION["role"]=="Faculty" or $_SESSION["role"]=="TechStaff"))
          {?>
      <form class="form-inline float-right">
        <a class="nav-item nav-link" data-toggle="modal"  data-target="#myModal" style="color:red;cursor:pointer;" >Log In<span class="sr-only">(current)</span></a>
        <a class="nav-item nav-link" data-toggle="modal" data-target="#myModal2" style="color: red;cursor:pointer;">Sign Up<span class="sr-only"></span></a>
      </form>
    <?php }
       }
       else
       {?>
         <form class="form-inline float-right">
           <a class="nav-item nav-link" data-toggle="modal"  data-target="#myModal" style="color:red;cursor:pointer;" >Log In<span class="sr-only">(current)</span></a>
           <a class="nav-item nav-link" data-toggle="modal" data-target="#myModal2" style="color: red;cursor:pointer;">Sign Up<span class="sr-only"></span></a>
         </form>
         <?php
       } ?>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Login</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <nav class="form-group">
                <div class="container-fluid">
                  <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                      <form id="Login" action="login_backend.php" method="post">
                        <br>
                        <input type="email" name="Email" placeholder="User Id" required class="form-control"><br><br>
                        <input type="password" name="Pss" placeholder="Password" required class="form-control"><br><br>
                        <select name="Role" id="role" class="form-control">
                              <option value="" disabled selected hidden>Choose Role</option>
                              <option value="0">Admin</option>
                              <option value="1" >HOD</option>
                              <option value="2" >Faculty</option>
                              <option value="3" >Technical Staff</option>
                        </select><br><br>
                        <input type="submit" name="Login" value="Login" class="btn-primary">
                      </form >
                    </div>
                  </div>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>

       <!-- Modal -->
       <div id="myModal2" class="modal fade" role="dialog">
       <div class="modal-dialog">
         <!-- Modal content-->
         <div class="modal-content">
           <!-- Modal Header -->
           <div class="modal-header">
             <h4 class="modal-title">Sign Up</h4>
             <button type="button" class="close" data-dismiss="modal">&times;</button>
           </div>
           <div class="modal-body">
             <nav class="form-group">
               <div class="container-fluid">
                 <div class="tab-content" id="nav-tabContent">
                   <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                     <form id="Login" action="signup_backend.php" method="post" enctype="multipart/form-data">
                       <br>
                       <input type="text" name="EmpNo" placeholder="Employe No" required class="form-control"><br><br>
                       <input type="text" name="Name" placeholder="Full Name" required class="form-control"><br><br>
                       <input type="email" name="Email" placeholder="Email Id" required class="form-control"><br><br>
                       <input type="password" name="Password" placeholder="Password" required class="form-control"><br><br>
                       <input type="text" name="Phn1" placeholder="Contact No." required class="form-control"><br><br>
                       <input type="text" name="Phn2" placeholder="Alternate Contact No." class="form-control"><br><br>
                       <input type="text" name="Degree" placeholder="Degree" required class="form-control"><br><br>
                       <label for="CVlink">Upload CV:</label><br>
                       <input type="file" name="CVlink" placeholder="CV Link" id="CvToUpload" class=""><br><br>
                       <label for="PhotoToUpload">Upload Photo:</label><br>
                       <input type="file" name="Photo" id="PhotoToUpload" class=""><br><br>
                       <select name="Designation" id="role" class="form-control">
                             <option value="" disabled selected hidden>Choose Role</option>
                             <option value="2">Faculty</option>
                             <option value="3">Technical Staff</option>
                       </select><br><br>
                       <input type="submit" name="Sign Up" value="Sign Up" class="btn-primary">
                     </form >
                   </div>
                 </div>
               </div>
             </nav>
           </div>
         </div>
       </div>
     </div>

       <?php
       if(isset($_SESSION["role"]))
       {
         if($_SESSION["role"]=="Admin" or $_SESSION["role"]=="HOD" or $_SESSION["role"]=="Faculty" or $_SESSION["role"]=="TechStaff")
         {?>
         <form onsubmit="return clear_session(this);" align="right" name="signout" method="post" action="Signout_backend.php" style="float: right">
           <label class="logoutLblPos">
             <input name="logout" type="submit" id="submit1" value="Sign Out" class="btn-primary">
           </label>
         </form>
         <?php
        }
      }?>
      <script>
      function clear_session(form) {

          // validation code here ...


          if(false) {
              alert('Please correct the errors in the form!');
              return false;
          }
          else {
              return confirm('Confirm to Logout?');
          }
      }
      </script>
    </div>
  </div>
</nav>
