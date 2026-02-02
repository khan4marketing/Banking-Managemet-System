<?php
// backup
file_put_contents(__DIR__ . '/account.php.bak', file_get_contents(__FILE__));
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['userid'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>IUBAT Bank</title>
  <link href="images/IUBAT_symbol.jpeg" rel="icon">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merienda+One">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" href="assets/css/account.css">
   </head>
   <body>
  <nav class="navbar navbar-expand-xl navbar-light bg-light">
  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
  </button>
	<!-- Collection of nav links, forms, and other content for toggling -->
	<div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
		<div class="navbar-nav ">
			<a href="home.php" class="nav-item nav-link ">Home</a>
			<a href="#" class="nav-item nav-link active">Accounts</a>
			<!-- <div class="nav-item dropdown">
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Services</a>
				<div class="dropdown-menu">
					<a href="#" class="dropdown-item">Account Statements</a>
					<a href="#" class="dropdown-item">Funds Transfer</a>
					<a href="#" class="dropdown-item">Graphic Design</a>
					<a href="#" class="dropdown-item">Digital Marketing</a>
				</div>
			</div> -->
			<a href="statement.php" class="nav-item nav-link">Account Statements</a>
			<a href="funds_transfer.php" class="nav-item nav-link">Funds Transfer</a>
   
		</div>
  <?php 
 $con = new mysqli('localhost','root','','iubat_bank');

 $ar = $con->query("select * from useraccounts where id = '".$_SESSION['userid']."'");
 if ($ar && $ar->num_rows > 0) {
   $userData = $ar->fetch_assoc();
 } else {
   header('Location: logout.php');
   exit;
 }

 ?>
		<div class="navbar-nav ml-auto">
  &nbsp; <a href="" class="btn btn-warning " data-toggle="tooltip" title="Your current Account Balance">Account Balance : BDT <?php echo $userData['deposit']; ?></a>  
   &nbsp;&nbsp;
   <!-- User message modal removed -->
      <div class="nav-item dropdown">
        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action">
          <img src="images/IUBAT_symbol.jpeg" width="40" alt="user">
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
   <?php require 'includes/function.php'; ?>
 
   
 <br>
     <div class="container">
     <br>
              <br>
           
              <br>
      <h1 style="text-align:center; color:#CC3300;" >Your Account Information</h1>
              <div class="table-responsive">
              <br>
    
              

              <table class="table table-bordered">
      <tbody>
        <tr>
          <td>Name</td>
          <th><?php echo $userData['name'] ?></th>
          <td>Account No</td>
          <th><?php echo $userData['accountno'] ?></th>
        </tr><tr>
         
          <td>Current Balance</td>
          <th><?php echo $userData['deposit'] ?></th>
          <td>Account Type</td>
          <th><?php echo $userData['accounttype'] ?></th>
        </tr><tr>
        <td>Gender</td>
          <th><?php echo $userData['gender'] ?></th>
          <td>E-mail</td>
          <th><?php echo $userData['email'] ?></th>
          </tr>
          <td>National ID Card</td>
          <th><?php echo $userData['national_id'] ?></th>
          <td>City</td>
          <th><?php echo $userData['city'] ?></th>
        </tr><tr>
          <td>Contact Number</td>
          <th><?php echo $userData['phonenumber'] ?></th>
          <td>Address</td>
          <th><?php echo $userData['address'] ?></th>
        </tr>
        <tr>
          <td>Occupation</td>
          <th><?php echo $userData['occupation'] ?></th>
          <td>Created</td>
          <th><?php echo $userData['time'] ?></th>
        </tr>
      </tbody>
    </table>
              </div>
     </div>
   </body>


<!-- css account.php -->

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
} 
nav{
  display: flex;
  height: 80px;
  width: 100%;
  background: #1b1b1b;
  align-items: center;
  justify-content: space-between;
  padding: 0 50px 0 100px;
  flex-wrap: wrap;
}
nav .logo {
    color: #fff;
    font-size: 29px;
    font-weight: 600;
    /* left: 12px; */
    /* left: 27px; */
    /* align-content: baseline; */
    /* align-items: baseline; */
    margin-left: -24px;
}
nav ul{
  display: flex;
  flex-wrap: wrap;
  list-style: none;
}
nav ul li{
  margin: 0 5px;
}
nav ul li a{
  color: #f2f2f2;
  text-decoration: none;
  font-size: 18px;
  font-weight: 500;
  padding: 8px 15px;
  border-radius: 5px;
  letter-spacing: 1px;
  transition: all 0.3s ease;
}
nav ul li a.active,
nav ul li a:hover{
  color: #111;
  background: #fff;
}
nav .menu-btn i{
  color: #fff;
  font-size: 22px;
  cursor: pointer;
  display: none;
}
input[type="checkbox"]{
  display: none;
}
@media (max-width: 1000px){
  nav{
    padding: 0 40px 0 50px;
  }
}
@media (max-width: 920px) {
  nav .menu-btn i{
    display: block;
  }
  #click:checked ~ .menu-btn i:before{
    content: "\f00d";
  }
  nav ul{
    position: fixed;
    top: 80px;
    left: -100%;
    background: #111;
    height: 100vh;
    width: 100%;
    text-align: center;
    display: block;
    transition: all 0.3s ease;
  }
  #click:checked ~ ul{
    left: 0;
  }
  nav ul li{
    width: 100%;
    margin: 40px 0;
  }
  nav ul li a{
    width: 100%;
    margin-left: -100%;
    display: block;
    font-size: 20px;
    transition: 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  }
  #click:checked ~ ul li a{
    margin-left: 0px;
  }
  nav ul li a.active,
  nav ul li a:hover{
    background: none;
    color: cyan;
  }
}
.content{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: -1;
  width: 100%;
  padding: 0 30px;
  color: #1b1b1b;
}
.content div{
  font-size: 40px;
  font-weight: 700;
}
.container{margin-top:20px}
.account-table th{background:#007bff;color:#fff}

</style>