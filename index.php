<?php 
	require('server/database.php'); 
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dashboard</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">


	<!-- MDB icon -->
	<link rel="icon" href="img/logo_1.png" type="image/x-icon" />

	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
   
	<!-- Bootstrap core CSS -->
	<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom -->
	<link rel="stylesheet" href="css/style.css"/>

	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  </head>

  <style>
	.bd-placeholder-img {
	  font-size: 1.125rem;
	  text-anchor: middle;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  user-select: none;
	}

	@media (min-width: 768px) {
	  .bd-placeholder-img-lg {
		font-size: 3.5rem;
	  }
	}
  </style>

  <body>
    
	<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="index.php">
			<i class="fa-solid fa-house mx-2"></i>
			AZA Explorers
		</a>

		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
		<input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
		<div class="navbar-nav">
		  <div class="nav-item text-nowrap">
			<a class="nav-link p-2 mx-2" href="#">Sign out</a>
		  </div>
		</div>
	</header>

	<div class="container-fluid">
	<div class="row">
		<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
			<div class="position-sticky pt-3">
				<ul class="nav flex-column">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="index.php">
						<span data-feather="home"></span>
						Dashboard
						</a>
					</li>
				</ul>

				<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
					<span>Summary</span>
				</h6>
				
				<ul class="nav flex-column mb-2">
					<li class="nav-item">
						<a class="nav-link" href="table.html">
						<span data-feather="file-text"></span>
						Previous updates
						</a>
					</li>
				</ul>
			</div>
		</nav>

		<main class="ms-sm-auto col-lg-10 px-md-4">
			<!--
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
				<h1 class="h2">Dashboard</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group me-2">
					<button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
					<button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
				</div>
				<button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
					<span data-feather="calendar"></span>
					This week
				</button>
				</div>
			</div>
			-->

			<h1 class="my-3 text-center display-3">Upload Update</h1>

			<section class="intro">
				<div class="mask d-flex align-items-center h-100 ms-5">
				  <div class="container-fluid vh-100">
					<div class="row justify-content-center">
					  <div class="col-12 col-lg-9 col-xl-7">
						<div class="card px-5 py-3">
						  <div class="card-body p-4 p-md-5">
							<h3 class="mb-4 pb-2 text-center">Game Update Details</h3>
			  
			
							<?php
								// TODO
								// set autofill values from sign in
								// set algo for getting version number

								// database functions
								$db = new Database();
								$conn = $db->conn;
				
								// autofill fields
								$dt = new DateTime();
								$dt->setTimezone(new DateTimeZone('Africa/Johannesburg'));

								$date = date('Y-m-d');
								$time = $dt->format('h:i');
								$comment = "";

								if (isset($_POST['submit'])) {
									$comment = $db->strip($_POST['comment']);
								}
							?>

							<form  class="" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
								<div class="row mb-4">
									<div class="col-md-6">
										<div class="form-outline">
										<label class="form-label" for="firstName">Developer Name</label>
										<input readonly type="text" id="name" class="form-control" name="name" value="Tester01"/>
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="info">
											<strong>Compatibility check:</strong>
											Date "<span id="date-output"></span>",
											Time "<span id="time-output"></span>"
										</div>
										<div class="datetimepicker">
											<input readonly type="date" id="date" name="date" value=<?php echo $date; ?> >
											<span></span>
											<input readonly type="time" id="time" name="time" value=<?php echo $time; ?> >
										</div>
									</div>
								</div>

								<div class="row mb-4">
									<div class="col-md-6">
										<h6 class="mb-2 pb-1">Grade: </h6>
				
										<select class="form-select" name="grade">
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										</select>
									</div>

									<div class="col-md-6">
										<h6 class="mb-2 pb-1">Subject: </h6>
				
										<select class="form-select" name="subject">
										<option value="geography">Geography</option>
										<option value="natural sciences">Natural Sciences</option>
										<option value="mathematics">Mathematics</option>
										</select>
									</div>	  
								</div>

								<div class="row mb-2">
									<div class="col-md-6">
										<h6 class="mb-2 pb-1">Update Type: </h6>

										<div class="form-check form-check-inline">
										  <input
											class="form-check-input"
											type="radio"
											name="radioBtn"
											id="minor"
											value="0.1"
											checked="checked"
											onchange="updateVersion(this);"
										  />
										  <label class="form-check-label" >Minor</label>
										</div>
					
										<div class="form-check form-check-inline">
										  <input
											class="form-check-input"
											type="radio"
											name="radioBtn"
											id="major"
											value="1.0"
											onchange="updateVersion(this);"
										  />
										  <label class="form-check-label">Major</label>
										</div>
									</div>

									<div class="col-md-6">
										<label for="versionNumber" class="form-label">Version Number</label>			  
										<div class="form-outline">
											<input
											readonly
											type="text"
											class="form-control"
											id="versionNumber"
											name="versionNumber"
											value="0.0"
											/>
										</div>
									</div>
								</div>

								<div class="form-group mb-4">
									<label for="comment">Comment</label>
									<textarea class="form-control" id="comment" name="comment"rows="3"><?php echo $comment; ?></textarea>
								</div>
								
								<div class="row">
									<div class="col-12">
										<label class="form-label" for="customFile">choose ".pck" file to upload</label>
										<input type="file" class="form-control" id="customFile" />

										<div class="mt-4 text-center">
											<input class="btn btn-success btn-lg" type="submit" name="submit" value="Upload" />
										</div>
									</div>
								</div>

								<?php
								if (isset($_POST['submit'])) {

									$name = $_POST['name'];
									$date = $_POST['date'];
									$time = $_POST['time'];
									$grade = intval($_POST['grade']);
									$subject = $_POST['subject'];
									// $type = 
									$versionNumber = $_POST['versionNumber'];									

									echo $name . $date. $grade . $subject .$versionNumber. $comment;
								}
								?>
			  
							</form>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </section>
		</main>
	</div>
	</div>

	<!-- Bootstrap core -->
	<script src="assets/dist/js/bootstrap.bundle.min.js"></script>

	<script 
		src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
		crossorigin="anonymous">
	</script>

	<script 
		src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
		integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
		crossorigin="anonymous">
	</script>

	<!-- Custom scripts -->
	<script src="dashboard.js"></script>
  </body>

</html>
