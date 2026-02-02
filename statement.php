<?php
session_start();
if(!isset($_SESSION['userid'])){ header('location:login.php');}
?>

  
  <?php
    $error = "";
    if (isset($_POST['userlogin']))
    {
      $error = "";
        $user = $_POST['email'];
        $pass = $_POST['password'];
       
        $result = $con->query("select * from useraccounts where email='$user' AND password='$pass'");
        if($result->num_rows>0)
        { 
          session_start();
          $data = $result->fetch_assoc();
          $_SESSION['userid']=$data['id'];
          $_SESSION['user'] = $data;
          header('location:index.php');
         }
        else
        {
          $error = "<div class='alert alert-warning text-center rounded-0'>Username or password wrong try again!</div>";
        }
    }

   ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>IUBAT Bank</title>
  <link href="images/IUBAT_symbol.jpeg" rel="icon">
   <link href="images/IUBAT_symbol.jpeg" rel="apple-touch-icon"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 
  <link rel="stylesheet" href="assets/css/statement.css">
      
     
      
   </head>

  <?php require 'includes/function.php'; ?>
  <?php 
 $con = new mysqli('localhost','root','','iubat_bank');

 $ar = $con->query("select * from useraccounts where id = '$_SESSION[userid]'");
 $userData = $ar->fetch_assoc();

 ?>
   <body>
<nav class="navbar navbar-expand-xl navbar-light bg-light">
  <a href="home.php" class="navbar-brand"><img src="images/IUBAT_symbol.jpeg" width="45" alt="" class="logo-img"><b>IUBAT Bank</b></a>
  
	<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
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
			</div> -->
			<a href="#" class="nav-item nav-link active">Account Statements</a>
			<a href="funds_transfer.php" class="nav-item nav-link">Funds Transfer</a>
		</div>

		<div class="navbar-nav ml-auto">
  &nbsp; <a href="" class="btn btn-warning " data-toggle="tooltip" title="Your current Account Balance">Account Balance : BDT <?php echo $userData['deposit']; ?></a>  
   &nbsp;&nbsp;
   <!-- Notice/bell and user message modal removed -->
          <div class="nav-item dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
              <img src="images/IUBAT_symbol.jpeg" width="40" alt="IUBAT logo" class="rounded-circle mr-2">

              <?php echo htmlspecialchars($userData['name'], ENT_QUOTES, 'UTF-8'); ?> <b class="caret"></b>
            </a>
				<div class="dropdown-menu">
					<a href="profile.php" class="dropdown-item"><i class="fa fa-user-o"></i> Profile</a></a>
					<div class="dropdown-divider"></div>
					<a href="logout.php" class="dropdown-item"><i class="material-icons">&#xE8AC;</i> Logout</a></a>
				</div>
			</div>
		</div>
	</div>
</nav>




<div class="container">
  <div class="card   mx-auto">
  <div class="card-header text-center">
    Transaction made against you account
  </div>
  <div class="card-body">
    <?php 
      $array = $con->query("select * from transaction where userid = '$userData[id]' order by date desc");
      if ($array ->num_rows > 0) 
      {
         while ($row = $array->fetch_assoc()) 
         {
            if ($row['action'] == 'withdraw') 
            {
              echo "<div class='alert alert-secondary'>You withdraw BDT $row[debit] from your account at $row[date]</div>";
            }
            if ($row['action'] == 'deposit') 
            {
              echo "<div class='alert alert-success'>You deposit BDT $row[credit] in your account at $row[date]</div>";
            }
            if ($row['action'] == 'deduction') 
            {
              echo "<div class='alert alert-danger'>Deduction have been made for BDT $row[debit] from your account at $row[date] in case of $row[other]</div>";
            }
            if ($row['action'] == 'transfer') 
            {
              echo "<div class='alert alert-warning'>Transfer have been made for BDT $row[debit] from your account at $row[date] in account no.$row[other]</div>";
            }

         }
      } 
    ?>  
  </div>
  <div class="card-footer text-muted">
  </div>
</div>

</div>
</body>
</html>