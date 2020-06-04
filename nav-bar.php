<style>
.sticky{
  position: fixed;
  top: 0;
  width: 100%;
  background-color: black;
  z-index: 10000;
}
.nav-wrapper_sticky{
  height: 56px;
  margin-top: 56px;
  position: fixed;
  top: 0;
  z-index: 10000;
}
</style>
<div id="navbar_wrapper_id" class=""><!-- height of it should be same as that of nav bar, for holding the position-->
  <nav id="navbar_id" class="navbar navbar-expand-md navbar-black bg-white" >
  <button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target=".dual-collapse2" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2 my-1">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
      <a class="nav-link" href="#">Left</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="#">Link</a>
      </li> -->
  <li class="nav-item">
    <a class="nav-link active" href="Welcome.php">Home <span class="sr-only">(current)</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="Faculty.php">Faculty</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Staff.php">Staff <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Academic Corner
    </a>
    <!-- fixed dropwon close when going to dropdown items by padding=0 and margin=0 -->
    <div class="dropdown-menu" style="padding: 0px; margin: 0px;" aria-labelledby="navbarDropdownMenuLink">
      <a class="dropdown-item" href="Assignment1.php">Assignment</a>
      <a class="dropdown-item" href="Pre_paper.php">Previous Paper</a>
      <a class="dropdown-item" href="Scedule.php">Schedule</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="infrastructure.php">Infrastructure <span class="sr-only">(current)</span></a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" href="#">Library <span class="sr-only">(current)</span></a>
  </li> -->
   <li class="nav-item">
    <a class="nav-link" href="repository.php">Repository <span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Placement <span class="sr-only">(current)</span></a>
  </li>
</ul>
</div>
<div class="mx-auto order-0"> <!-- to add something in the middle of the nav bar -->
  <!-- <a class="navbar-brand mx-auto" href="#">Navbar 2</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
  <span class="navbar-toggler-icon"></span>
</button> -->
</div>
<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
  <ul class="navbar-nav ml-auto">
    <!-- <li class="nav-item">
    <a class="nav-link" href="#">Right</a>
  </li>
  <li class="nav-item">
  <a class="nav-link" href="#">Link</a>
</li> -->
<?php
if(isset($_SESSION["role"]))
{
  if(!($_SESSION["role"]=="Admin" or $_SESSION["role"]=="HOD" or $_SESSION["role"]=="Faculty" or $_SESSION["role"]=="TechStaff"))
  {?>

    <!-- <li class="nav-item">
      <a class="nav-link" data-toggle="modal"  data-target="#myModal" style="color:red;cursor:pointer;">Log In<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="modal" data-target="#myModal2" style="color: red;cursor:pointer;">Sign Up<span class="sr-only"></span></a>
    </li> -->


    <!-- New modal Start -->

    <!--Modal: Login / Register Form-->
<div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
              Log In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
              Sign Up</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

            <!--Body-->
            <div class="modal-body mb-1">
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
            <!--Footer-->
          </div>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade" id="panel8" role="tabpanel">

            <!--Body-->
            <div class="modal-body">
              <form id="Login" action="signup_backend.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="EmpNo" placeholder="Employe No" class="form-control"><br>
                <input type="text" name="Name" placeholder="Full Name" required class="form-control"><br><br>
                <input type="email" name="Email" placeholder="Email Id" required class="form-control"><br><br>
                <input type="password" name="Password" placeholder="Password" required class="form-control"><br><br>
                <input type="text" name="Phn1" placeholder="Contact No." required class="form-control"><br><br>
                <input type="hidden" name="Phn2" placeholder="Alternate Contact No." class="form-control">
                <input type="hidden" name="Degree" placeholder="Degree"  class="form-control">
                <!-- <label for="CVlink">Upload CV:</label><br> -->
                <input type="hidden" name="CVlink" placeholder="CV Link" id="CvToUpload" class="">
                <!-- <label for="PhotoToUpload">Upload Photo:</label><br> -->
                <input type="hidden" name="Photo" id="PhotoToUpload" class="">
                <select name="Designation" id="role" class="form-control">
                  <option value="" disabled selected hidden>Choose Role</option>
                  <option value="2">Faculty</option>
                  <option value="3">Technical Staff</option>
                </select><br><br>
                <input type="submit" name="Sign Up" value="Sign Up" class="btn-primary">
              </form >
            </div>
            <!--Footer-->
          </div>
          <!--/.Panel 8-->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login / Register Form-->
<div class="mx-sm-2 my-sm-1">
  <a href="" class="btn btn-danger py-sm-2" id="login_nav_bar" data-toggle="modal" data-target="#modalLRForm">Log In</a>
</div>
<!-- New Modal ends -->


  <?php }
}
else
{?>
  <!-- <li class="nav-item">
    <a class="nav-link" data-toggle="modal"  data-target="#myModal" style="color:red;cursor:pointer;">Log In<span class="sr-only">(current)</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="modal" data-target="#myModal2" style="color: red;cursor:pointer;">Sign Up<span class="sr-only"></span></a>
  </li> -->


<!-- New Modal Start-->
  <div class="modal fade" id="modalLRForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal" role="document">
      <!--Content-->
      <div class="modal-content">

        <!--Modal cascading tabs-->
        <div class="modal-c-tabs">

          <!-- Nav tabs -->
          <ul class="nav nav-tabs md-tabs tabs-2 light-blue darken-3" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fas fa-user mr-1"></i>
                Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fas fa-user-plus mr-1"></i>
                Sign Up</a>
            </li>
          </ul>

          <!-- Tab panels -->
          <div class="tab-content">
            <!--Panel 7-->
            <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

              <!--Body-->
              <div class="modal-body mb-1">
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
              <!--Footer-->

            </div>
            <!--/.Panel 7-->

            <!--Panel 8-->
            <div class="tab-pane fade" id="panel8" role="tabpanel">

              <!--Body-->
              <div class="modal-body">
                <form id="Login" action="signup_backend.php" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="EmpNo" placeholder="Employe No" class="form-control"><br>
                  <input type="text" name="Name" placeholder="Full Name" required class="form-control"><br><br>
                  <input type="email" name="Email" placeholder="Email Id" required class="form-control"><br><br>
                  <input type="password" name="Password" placeholder="Password" required class="form-control"><br><br>
                  <input type="text" name="Phn1" placeholder="Contact No." required class="form-control"><br><br>
                  <input type="hidden" name="Phn2" placeholder="Alternate Contact No." class="form-control">
                  <input type="hidden" name="Degree" placeholder="Degree"  class="form-control">
                  <!-- <label for="CVlink">Upload CV:</label><br> -->
                  <input type="hidden" name="CVlink" placeholder="CV Link" id="CvToUpload" class="">
                  <!-- <label for="PhotoToUpload">Upload Photo:</label><br> -->
                  <input type="hidden" name="Photo" id="PhotoToUpload" class="">
                  <select name="Designation" id="role" class="form-control">
                    <option value="" disabled selected hidden>Choose Role</option>
                    <option value="2">Faculty</option>
                    <option value="3">Technical Staff</option>
                  </select><br><br>
                  <input type="submit" name="Sign Up" value="Sign Up" class="btn-primary">
                </form >
              </div>
              <!--Footer-->

            </div>
            <!--/.Panel 8-->
          </div>

        </div>
      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Login / Register Form-->

  <div class="my-sm-1 mx-sm-2">
    <a href="" class="btn btn-danger py-sm-2" id="login_nav_bar" data-toggle="modal" data-target="#modalLRForm">Log In</a>
  </div>
  <!-- New Modal ends -->



  <?php
} ?>

<!-- sign out btn -->
<?php
if(isset($_SESSION["role"]))
{
  if($_SESSION["role"]=="Admin" or $_SESSION["role"]=="HOD" or $_SESSION["role"]=="Faculty" or $_SESSION["role"]=="TechStaff")
  {?>
    <div class="px-sm-3">
      <li class="dropleft dropdown">
        <?php
        $photo_var = $_SESSION['profile_pic'];//session variable is always set (it's set in login, signup and when changed(but the navbar is cached so new profile image dont show instantaneously))
        if ($photo_var==Null or $photo_var=="") {
          $photo_var = "images.png";
        }
        else {
          //$photo_var = $photo_var."Photo.jpg";
        }
        //echo $photo_var; ?>
        <!-- <img src=<?php //echo "Added_Image/".$_SESSION['email']."Photo.jpg" ?> alt="NA" id="navbarDropdownAvatar" onerror="standby()" class="img-thumbnail avatar img-circle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
        <img src=<?php echo "Added_Image/".$photo_var.""?> alt="NA" id="navbarDropdownAvatar" onerror="standby()" class="img-thumbnail avatar img-circle dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <div class="dropdown-menu">


    <?php
    if($_SESSION['role']=="Admin" or $_SESSION["role"]=="HOD")
    { ?>
      <button class="dropdown-item" name="home" id="admin_hod_home_btn" onclick="location.href='admin_page.php';" >Your Profile
      </button>
    <?php
    }
    elseif ($_SESSION["role"]=="Faculty")
    { ?>
      <!-- <a name="home" id="faculty_home_btn" href='Faculty_login.php'>H
      </a> -->
      <button class="dropdown-item" name="home" id="faculty_home_btn" onclick="location.href='Faculty_login.php';" >Your Profile
      </button>
    <?php
    }
    elseif ($_SESSION["role"]=="TechStaff")
    { ?>
      <!-- <a name="home" id="techstaff_home_btn" href='Techstaff_login.php'>H
      </a> -->
      <button class="dropdown-item" name="home" id="techstaff_home_btn" onclick="location.href='Techstaff_login.php';" >Your Profile
      </button>
    <?php
    }?>
    <form class="dropdown-item" onsubmit="return clear_session(this);" name="signout" method="post" action="Signout_backend.php">
      <button name="logout" type="submit" id="submit1" class="sign_out_btn btn-primary"><span>Sign Out</span>
      </button>
    </form>

  </div>
</li>
</div>
    <?php
  }
}?>

</ul>
</div>
</nav>
</div>
<!-- Old modal -->
<!-- <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
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
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
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
                  <input type="hidden" name="EmpNo" placeholder="Employe No" class="form-control"><br>
                  <input type="text" name="Name" placeholder="Full Name" required class="form-control"><br><br>
                  <input type="email" name="Email" placeholder="Email Id" required class="form-control"><br><br>
                  <input type="password" name="Password" placeholder="Password" required class="form-control"><br><br>
                  <input type="text" name="Phn1" placeholder="Contact No." required class="form-control"><br><br>
                  <input type="hidden" name="Phn2" placeholder="Alternate Contact No." class="form-control">
                  <input type="hidden" name="Degree" placeholder="Degree"  class="form-control">
                  <input type="hidden" name="CVlink" placeholder="CV Link" id="CvToUpload" class="">
                  <input type="hidden" name="Photo" id="PhotoToUpload" class="">
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
</div>-->
<!-- Old modals end -->

<script>
  var avatar_img = document.getElementById('navbarDropdownAvatar');
function standby() {
  // alert('The image could not be loaded.');
    try {
      avatar_img.src ='Added_Image/images.png';
    } catch (e) {
      console.log("error in allocating default images");
    }
}
// for nav bar to get fixed while scrolling
window.onscroll = function() {scrollcontrol()};
// Get the navbar
var navbar_var = document.getElementById("navbar_id");
var navbar_wrapper_var = document.getElementById("navbar_wrapper_id");
// Get the offset position of the navbar
var sticky = navbar_var.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function scrollcontrol() {
  if (window.pageYOffset >= sticky) {
    navbar_var.classList.add("sticky");
    navbar_wrapper_var.classList.add("nav-wrapper_sticky");
  } else {
    navbar_var.classList.remove("sticky");
    navbar_wrapper_var.classList.remove("nav-wrapper_sticky");
  }
}
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
