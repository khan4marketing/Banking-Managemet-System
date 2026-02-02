<?php
	 &nbsp; &nbsp;
	 <!-- Notice/bell and user message modal removed -->
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav ">
			<a href="home.php" class="nav-item nav-link ">Home</a>
			<a href="account.php" class="nav-item nav-link">Accounts</a>
			<!-- <div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item">Account Statements</a>
					<a href="#" class="dropdown-item">Funds Transfer</a>
					<a href="#" class="dropdown-item">Graphic Design</a>
					<a href="#" class="dropdown-item">Digital Marketing</a>
				</div>
			<?php
			session_start();
			if(!isset($_SESSION['userid'])){ header('location:login.php');}
			?>
			<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8">
					<title>Profile</title>
					<link rel="stylesheet" href="assets/css/profile.css">
				</head>
				<body>
					<?php include 'includes/db_conn.php';
					$stmt = $pdo->prepare('SELECT * FROM useraccounts WHERE id = ?');
					$stmt->execute([$_SESSION['userid']]);
					$user = $stmt->fetch();
					if (!$user) { header('Location: logout.php'); exit; }
					?>
					<div class="profile-container">
						<h2><?php echo htmlspecialchars($user['name']); ?></h2>
						<p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
						<p>Account No: <?php echo htmlspecialchars($user['accountno']); ?></p>
						<a href="updateprofile.php">Edit Profile</a>
					</div>
				</body>
			</html>
</body>






<body>

	<section class="py-3 my-3">
	<form method="POST" action="updateprofile.php">
		<div class="container">
			<h1 class="mb-3">Account Settings</h1>
			<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
	<li class="breadcrumb-item active" aria-current="page">Profile</li>

  </ol>
</nav>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
						<img src="<?php echo "images/".$userData['profile'];?>";>
							<div class="pt-2">
                          <a href="#" type="file" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload">  </i></a>
						
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
						</div>
						<h4 class="text-center"> <?php echo $userData['name']; ?> </h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						
						
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
                        
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Name</label>
								  	<input type="text"  class="form-control" value=" <?php echo $userData['name']; ?> " readonly>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Date of Birthdate</label>
								  	<input type="date" class="form-control" name="dob" value="<?php echo $userData['dob']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="email" class="form-control" name="email" value="<?php echo $userData['email']; ?> ">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" class="form-control" name="phonenumber"value="<?php echo $userData['phonenumber']; ?> ">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Occupation</label>
								  	<input type="text" class="form-control" name="occupation" value="<?php echo $userData['occupation']; ?> ">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>City</label>
								  	<input type="text" class="form-control" name="city" value="<?php echo $userData['city']; ?> ">
								</div>
							</div>
							
						</div>
					
					
					</div>
				</div>
			</div>
		</div>
</form>
	</section>


	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>



 

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>