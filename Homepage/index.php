<?php
session_start();

if (!isset($_SESSION['status_login'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ./authen/signin.php');
}
// if (isset($_GET['logout'])) {
// 	session_destroy();
// 	unset($_SESSION['username']);
// 	header("location: signin.php");
// }
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>

	<link rel="stylesheet" href="./src/css/homecss.css">
	<link rel="stylesheet" href="./src/css/style.css">

	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<!-- cdn font awesome -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</head>

<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="my-image-icon user">
						<i class="fas fa-user"></i>
					</span>
					<?php echo $_SESSION['username'] ?>

					<span class="caret"></span></a>
				<ul class="dropdown-menu">

					<li><a href="./webservice/authen/logout.php" class="sign-out">Sign out</a></li>
				</ul>
			</div>

		</div>
	</nav>
	<div class="wrapper">
		<div class="header">

		</div>
	</div> <!--  header -->
	<div class="middle">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="image">
						<img src="./src/assets/images/1.jpg" vspace="10" hspace="20" style="width:12%">
						<img src="./src/assets/images/1.jpg" vspace="10" align="right" style="width:11%">
						<img src="./src/assets/images/1.jpg" vspace="10" hspace="180" style="width:10%;margin-left: 10em;">
					</div>
				</div>
				<div class="col-12 title">
					<font style="font-size: 48px;font-weight: 600;color: #555;">Tools for Literature Survey</font>

				</div>
				<div class="col-12 col-md-8">
					<div class="content">
						<div class="row">
							<div class="col-6">
								<a href="./sentence/openpaper.php" class="my-link">
									<span class="my-image-icon">
										<i class="far fa-copy"></i>
									</span>
									<span class="my-image-text">
										Simple sentence & translate
									</span>
								</a>
							</div>
							<div class="col-6">
								<a href="./search/searchpage.php" class="my-link">
									<span class="my-image-icon search">
										<i class="far fa-file-alt"></i>
									</span>
									<span class="my-image-text">
										Search
									</span>
								</a>
							</div>
							<div class="col-6">
								<a href="./bibliography/citationbuilder-main/src/index.html" class="my-link">
									<span class="my-image-icon bibliography">
										<i class="fas fa-book"></i>
									</span>
									<span class="my-image-text">
										Bibliography
									</span>
								</a>
							</div>
							<div class="col-6">
								<a href="./note/allnote.php" class="my-link">
									<span class="my-image-icon note">
										<i class="far fa-edit"></i>
									</span>
									<span class="my-image-text">
										Note
									</span>
								</a>
							</div>
						</div>
						<br>
					</div>
				</div>
				<div class="col-12 col-md-4">
					<div class="image-right">
						<img src="./src/assets/images/bg.png" hspace="30" style="width:140%;">
					</div>
				</div>
			</div>
		</div>
	</div>
	</div><!--  wrapper -->
	<div class="footer">

	</div>

</body>



</html>