
<?php
session_start();
if(!isset($_SESSION['loginid'])){ header('location:manager_login.php');}
?>
<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
  <title>IUBAT Bank</title>
  <link href="images/IUBAT_symbol.jpeg" rel="icon">
   <link href="images/IUBAT_symbol.jpeg" rel="apple-touch-icon">

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/manager_home.css"/>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </head>

   <?php require 'includes/db_conn.php'; ?>
  <?php require 'includes/function.php'; ?>

   <body>
      <nav>
      
         <div class="logo" >
         <img src="images/IUBAT_symbol.jpeg" width="45" alt="" class="logo-img">
         IUBAT Bank
         </div>
        
         <input type="checkbox" id="click">
         <label for="click" class="menu-btn">
         <i class="fas fa-bars"></i>
         </label>
         <ul>
            <li><a class="active" href="#">Home</a></li>
            <!-- Accounts link removed -->
            <li><a href="addnewaccount.php">Add new Account</a></li>
            <!-- Feedback link removed -->
            <li><a class="active" href="logout.php">Logout</a></li>
         </ul>

      </nav>
  
<div class="card-body">
				
<h1 style="text-align:center; color:#CC3300;" >Accounts</h1>
              <div class="table-responsive">
               
       
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" >
               
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Holder Name</th>
                      <th>Account No.</th>
                      <th>Gender</th>
                      <th>Current Balance	</th>
                      <th>Account type	</th>
                      <th>Contact No.</th>
                      <th>Time</th>
                      <!-- Send Notice column removed -->
                      <th>Delete</th>
                    </tr>
                  </thead>
                  
				  <tbody>
          <?php
           $con = new mysqli('localhost','root','','iubat_bank');
           if (isset($_GET['delete'])) 
  {
    if ($con->query("delete from useraccounts where id = '$_GET[delete]'"))
    {
     
    }
  }
  ?>


          <?php
           $con = new mysqli('localhost','root','','iubat_bank');

           $ar = $con->query("select * from userAccounts");
           $userData = $ar->fetch_assoc();
      $i=0;
      $array = $con->query("select * from useraccounts");
      if ($array->num_rows > 0)
      {
        while ($row = $array->fetch_assoc())
        {$i++;
    ?>
      <tr>
        <th scope="row"><?php echo $i ?></th>
  <td><?php echo $row['name'] ?></td>
  <td><?php echo $row['accountno'] ?></td>
    <td><?php echo $row['gender'] ?></td>
  <td>BDT <?php echo $row['deposit'] ?></td>
        <td><?php echo $row['accounttype'] ?></td>
        <td><?php echo $row['phonenumber'] ?></td>
        <td><?php echo $row['time'] ?></td>
        
          <td> <a href="manager_home.php?delete=<?php echo $row['id'] ?>" class='btn btn-danger btn-sm'  data-toggle='tooltip' title="Delete this account">Delete</a></td>
        
        
      </tr>
  

          
    </div>
  </div>
</div>
</form>


      <?php
        }
      }
     ?>
  </tbody> 
                </table>
              </div>
            </div>






</body>
</html>
