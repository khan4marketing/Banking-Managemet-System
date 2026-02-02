
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | IUBAT Bank</title>
    <link href="images/IUBAT_symbol.jpeg" rel="icon">
   <link href="images/IUBAT_symbol.jpeg" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">

</head>

<?php
    $con = new mysqli('localhost','root','','iubat_bank');
    $error = "";
    if (isset($_POST['userlogin']))
    {
        $error = "";
        $user = $_POST['email'];
        $pass = $_POST['password'];
        $result = $con->query("select * from userAccounts where email='$user' AND password='$pass'");
        if($result->num_rows>0)
        {
          session_start();
          $data = $result->fetch_assoc();
          $_SESSION['userid']=$data['id'];
          $_SESSION['user'] = $data;
          header('location:home.php?id='.$_SESSION['userid']);
        }
        else
        {
            echo '<script>alert("Username or password wrong try again!")</script>';
        }
    }
?>

<style>
    .image { position:fixed; top:0; left:0; width:100%; height:100%; z-index:-2; }
    .image img { width:100%; height:100%; object-fit:cover; }
    body { overflow:hidden; }
    .login-form { margin-top:8%; }
    .login-panel { text-align: center !important; }
    .image img{ max-width:100%; }
</style>
<body scroll="no">
    <div class="image">
        <img src="images/IUBAT_bank.jpg" alt="IUBAT Bank">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form  method="POST" autocomplete="">
                    <h2 class="login-panel">User Login</h2>
                    <p class="login-panel">Login with your email and password.</p>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="userlogin" value="Login">
                    </div>
                    <div class="link login-link login-panel">Not a member? <a href="manager_login.php">Manager Login</a></div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
