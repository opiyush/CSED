<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Login</title>
	<link rel="stylesheet" href="Login.css">
</head>
<body>
<?php include 'header.php'?>

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
