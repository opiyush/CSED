<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Login</title>
	<link rel="stylesheet" href="Login.css">
</head>
<body>

<!--	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="mr-auto"></ul>
			<ul class="navbar-nav ">
				<li class="nav-item">
					<h2 >Computer Science And Engineering</h2>
					<h6 class="float-right" style="color:white">Kamla Nehru Institute of Technology,Sultanpur</h6>
				</li>
			</ul>
		</nav>
	</div> -->
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
		<nav class="navbar navbar-expand-lg navbar-light bg-light">

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">About <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Faculty <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="#">Students <span class="sr-only">(current)</span></a>
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

	<?php
	     $server = "DESKTOP-BOK28QQ";
	     $conn = sqlsrv_connect( $server, array( 'Database' => 'KNITCSE' ) );

	     $stmt = sqlsrv_query( $conn, "select * from emp_details where Designation=2",array()); //making query and storing it in stmt variable


	  //echo starts for displaying the top of the page
	  ?>




<div id="fir" class="container">
	<div class="row mt-5">
		<?php
		while($rows = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){

		?>
		<div class="col-md-6 mb-5">
			<div class="card" >
				<div class="card-body">
					<h5 class="card-title"><?php echo $rows["Name"] ?></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?php echo $rows["Degree"] ?></h6>
					<p class="card-text"><?php echo $rows["Email"] ?></p>
					<p class="card-text"><?php echo $rows["Phn1"] ?></p>
					<p class="card-text"><?php echo $rows["Phn2"] ?></p>
					<button type="button" class="btn btn-info">Details</button>
				</div>
			</div>
    </div>
<?php
}
?>

	</div>
	</div>
	<?php sqlsrv_free_stmt($stmt);
	sqlsrv_close($conn);
	?>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
