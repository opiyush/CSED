
<style>


</style>
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
          <a class="nav-item nav-link active" href="Front_Page.php">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">About <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="Faculty.php">Faculty <span class="sr-only">(current)</span></a>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Academic Corner
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="Assignment1.php"><span class="sr-only">(current)</span>Assignment</a>
            <a class="dropdown-item" href="Pre_paper.php"><span class="sr-only">(current)</span>Previous Paper</a>
            <a class="dropdown-item" href="Scedule.php"><span class="sr-only">(current)</span>Schedule</a>
          </div>
        </li>
          <a class="nav-item nav-link" href="#">Staff <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Infrastructure <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Library <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Alumni <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Placement <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" data-toggle="modal" data-target="#myModal">Log In<span class="sr-only">(current)</span></a>

            <!-- Modal --> <div id="myModal" class="modal fade" role="dialog">
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
                          <form id="Login">
                            <br>
                            <input type="email" name="Email" placeholder="User Id" required class="form-control"><br><br>
                            <input type="password" name="Pss" placeholder="Password" required class="form-control"><br><br>
                            <select name="Role" id="role" class="form-control">
                                  <option value="" disabled selected hidden>Choose Role</option>
                                  <option value="Admin">Admin</option>
                                  <option value="HOD">HOD</option>
                                  <option value="Faculty">Faculty</option>
                                  <option value="TechStaff">Technical Staff</option>
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
        </div>
      </div>
    </nav>
  </div>
