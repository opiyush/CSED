<?php session_start(); ?>

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
	<link rel="stylesheet" href="css/bootstrap.min.css"  crossorigin="anonymous">

	<title>Faculties</title>
	<link rel="stylesheet" href="header.css">
</head>
<body>
	<?php include 'header.php'?>

	<?php
	include 'connection.php';

	$stmt = sqlsrv_query( $conn, "EXEC GetAllStaff;",array()); //making query and storing it in stmt variable


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
							<div class="row">
								<div class="col-md-6">
									<h5 class="card-title"><?php echo $rows["Name"] ?></h5>
									<h6 class="card-subtitle mb-2 text-muted"><?php echo $rows["Degree"] ?></h6>
									<p class="card-text"><?php echo $rows["Email"] ?></p>
									<p class="card-text"><?php echo $rows["Phn1"] , $rows["Phn2"] ?></p>
								</div>
								<div class="col-md-6">
									<div class="col-md-6">
										<?php $photo_name=$rows["Photo"]?>
										<?php if(is_null($photo_name) or $photo_name=="")
										{
											$photo_name="images.png";
										}
											?>
										<img id="propic" src="Added_Image/<?php echo $photo_name?>" alt="Profile Picture" style="border-radius:46%;" height="130" width="130">&nbsp;&nbsp;&nbsp;&nbsp;
									</div>
								</div>
								<!-- <button type="button" class="btn btn-info">Details</button> -->
							</div>
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
		<script src="jquery/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
		<script src="jquery/popper.min.js" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js" crossorigin="anonymous"></script>
	</body>
	</html>
