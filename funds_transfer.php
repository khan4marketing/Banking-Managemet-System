<?php
// backup
file_put_contents(__DIR__ . '/funds_transfer.php.bak', file_get_contents(__FILE__));
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['userid'])){ header('location:login.php');}
?>
<!DOCTYPE html>
<html lang="en">
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
<link rel="stylesheet" href="assets/css/funds_transfer.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <?php 
 $con = new mysqli('localhost','root','','iubat_bank');

 $ar = $con->query("select * from useraccounts where id = '".$_SESSION['userid']."'");
 if ($ar && $ar->num_rows > 0) {
     $userData = $ar->fetch_assoc();
 } else { header('Location: logout.php'); exit; }

 ?>
   <?php require 'includes/function.php'; ?>
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
			<a href="statement.php" class="nav-item nav-link">Account Statements</a>
			<a href="funds_transfer.php" class="nav-item nav-link active">Funds Transfer</a>
     
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
<style> 
body{background:#f3f4f8}
.container .card{margin-top:30px}
.btn-transfer{background:#007bff;color:#fff}
</style>

<div class="maincontainer">
            <div class="container py-5">
              <div class="row">
                <div class=" mx-auto">
                  <div class="bg-white rounded-lg shadow-sm p-5">
                   
                    <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
            
                      <li class="nav-item">
                       
                      <h5> <i class="fa fa-university fa-lg" >&nbsp;Bank Transfer</i> </h5>
                                        
                      </li>
                    </ul>
                    
                    <div class="tab-content">
  
                      
                      <div id="nav-tab-card" class="tab-pane fade show active">
                            <!-- php  -->

                        <form role="form" method="POST" >
                      
                          <div class="form-group">
                            <label >Receiver Account number</label>
                            <div class="input-group">
                              <input type="text"  name="otherNo"  placeholder="Enter Receiver Account number" class="form-control"  />
                              <div class="input-group-append">
                              <button class="btn btn-secondary" type="submit" name="get">Get Account Info</button>
                             </div>
                            </div>
                          </div>
                     
                           



                          </div>
                          <?php if (isset($_POST['get'])) 
      {
        $array2 = $con->query("select * from otheraccounts where accountno = '$_POST[otherNo]'");
        $array3 = $con->query("select * from useraccounts where accountno = '$_POST[otherNo]'");
        {
          if ($array2->num_rows > 0) 
          { $row2 = $array2->fetch_assoc();
            echo "
                  <form method='POST'>
                  <div class='form-group'>
                  <label > Account No.  <label > 
                    <input type='text' value='$row2[accountno]' name='otherNo' class='form-control ' readonly required>
                    </div>
                    <div class='form-group'>
                    <label >  Account Holder Name.  <label > 
                    <input type='text' class='form-control' value='$row2[holdername]' readonly required>
                    </div>
                    <div class='form-group'>
                    <label>
                    Account Holder Bank Name.</label>
                    <input type='text' class='form-control' value='$row2[bankname]' readonly required>
                    </div>
                    <div class='form-group'>
                    <label>
                    Enter Amount for tranfer.</label>
                    <input type='number' name='amount' class='form-control' min='3000' max='$userData[deposit]' required>
                    </div>
                     <button type='submit'  name='transfer'class='subscribe btn btn-primary btn-block rounded-pill shadow-sm'> Transfer  </button>
                  </form>
          ";
          }elseif ($array3->num_rows > 0) {
           $row2 = $array3->fetch_assoc();
            echo "
                  <form method='POST'>
                  <div class='form-group'>
                  <label >Account No.</label> 
                    <input type='text' value='$row2[accountno]' name='otherNo' class='form-control ' readonly required>
                    </div>
                    <div class='form-group'>
                 <label >Account Holder Name.</label> 
                    <input type='text' class='form-control' value='$row2[name]' readonly required>
                    </div>
                    <div class='form-group'>
                    <label > Enter Amount for tranfer.</label> 
                    <input type='number' name='amount' class='form-control' min='3000' max='$userData[deposit]' required>
                    </div>
                    <button type='submit'  name='transferSelf'class='subscribe btn btn-primary btn-block rounded-pill shadow-sm'> Transfer  </button>
                    
                  </form>
                ";
          }
          else
            echo "<div class='alert alert-danger'>Account No. $_POST[otherNo] Does not exist</div>";
        }
      } 
      ?>
     
          <br>
    <h5>Transfer History</h5>
    <?php
    if (isset($_POST['transferSelf']))
    {
      $amount = $_POST['amount'];
      setBalance($amount,'debit',$userData['accountno']);
      setBalance($amount,'credit',$_POST['otherNo']);
      makeTransaction('transfer',$amount,$_POST['otherNo']);
      echo "<script>alert('Transfer Successfull');window.location.href='funds_transfer.php'</script>";
    }
    if (isset($_POST['transfer']))
    {
      $amount = $_POST['amount'];
      setBalance($amount,'debit',$userData['accountno']);
      makeTransaction('transfer',$amount,$_POST['otherNo']);
      echo "<script>alert('Transfer Successfull');window.location.href='funds_transfer.php'</script>";
    }
  $array = $con->query("select * from transaction where userid = '".$userData['id']."' AND action = 'transfer' order by date desc");
      if ($array ->num_rows > 0) 
      {
         while ($row = $array->fetch_assoc()) 
         {
            if ($row['action'] == 'transfer') 
            {
              echo "<div class='alert alert-warning'>Transfer have been made for BDT $row[debit] from your account at $row[date] in account no.$row[other]</div>";
            }

         }
      }
      else
        echo "<div class='alert alert-info'>You have made no transfer yet.</div>";
    ?>  
                          
                        </form>
                      </div>
                    
       
       
                     
                
                     
                    </div>
                   

                  </div>
                          </div>
                        </div>
                    </div>
                  </div>
               </body>
          </html>
                           


