
  <div class="header">
    <div class="row">
      <div class="col-md-1">
        <a href="" class="logo"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/41/KNITlogo.png/220px-KNITlogo.png" alt="KNIT Logo" id="knitlogo"></a>
      </div>
      <div class="col-md-11">
        <h1>Computer Science And Engineering</h1>
        <h2>KNIT Sultanpur</h2>
      </div>
    </div>
    <hr>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">About <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Faculty <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="Assignment1.php">Students Corner<span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Staff <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Infrastructure <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Alumni <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Placement <span class="sr-only">(current)</span></a>
          <div  class="container " style="text-align: center; color: pink ">
            <button type="button" class="btn btn-outline-success float-right mt-2" data-toggle="modal" data-target="#myModal">LOGIN</button>

            <!-- Modal --> <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-body">
                  <nav class="navbar navbar-default">
                    <div class="container-fluid">


                      <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true" >Login</a>
              <!--						<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sign Up</a>-->
                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>
                      </nav>

                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                          <form id="Login">
                            <br>
                            <input type="email" name="Email" placeholder="User Id" required ><br><br>
                            <input type="password" name="Pss" placeholder="Password" required><br><br>
                            <select name="Role" id="role">
                                  <option value="" disabled selected hidden>Choose Role</option>
                                  <option value="Admin">Admin</option>
                                  <option value="HOD">HOD</option>
                                  <option value="Faculty">Faculty</option>
                                  <option value="TechStaff">Technical Staff</option>
                            </select><br><br>
                            <input type="submit" name="Login" value="Login">
                          </form >
                        </div>
        <!--
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                          <form id="sign">
                            <br>
                            <input type="text" name="fName" placeholder="First Name" required>
                            <br><br>
                            <input type="text" name="lName" placeholder="Last Name" required>
                            <br><br>
                            <input type="email" name="Email" placeholder="Email id" required>
                            <br><br>
                            <input type="password" name="Pss" placeholder="Password" required><br><br>
                            <input type="submit" name="SignUp " value="Sign Up">
                          </form>
                        </div>
        -->
                      </div>

                    </div>
                  </nav>
                </div>


              </div>

            </div>
          </div>
        </div>


      <!--	  <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Admin</a>
              <a class="dropdown-item" href="#">HOD</a>
              <a class="dropdown-item" href="#">Faculty</a>
              <a class="dropdown-item" href="#">Technical Staff</a>
            </div>
          </li> -->
        </div>
      </div>
    </nav>
  </div>
