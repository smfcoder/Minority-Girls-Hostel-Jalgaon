<?php
    session_start();
    $sname=$_SESSION['otp'];
    if(!isset($_SESSION['otp']))
    {
        header('location:/admin/login.php');
        exit();
    }
?>
<?php
    
    if(isset($_POST['submit']))
    {
        include('../asset/conn.php');
        $email=$_POST['email'];
        $otp=$_POST['otp'];
        $sel="SELECT * FROM admin WHERE email='$email' AND otp='$otp';";
        $e_sel=mysqli_query($sql,$sel);
        $row=mysqli_num_rows($e_sel);
        if($row==0)
        {
                $_SESSION['forgot']="invalid";
                header('location:/admin/login.php');
        }
        else
        {
            $_SESSION['newpass']=$email;
            header('Location:/admin/newpass.php');
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>OTP </title>
    <style>
    .login-form {
		width: 340px;
    	margin: 40px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
    </style>
  </head>
  <body class="text-center">
      
  
     <div class="login-form"> 
    <form action="" method="post">
        
        <h3>OTP</h3>
        
            <input type="text" name="email" class="form-control" value="<?php echo $sname; ?>" hidden>
        
        <div class="form-group">
            <input type="text" name="otp" class="form-control" placeholder="otp" required="required">
        </div>
       
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">check</button>
        </div>
        
    </form>
    </div>
    
    <?php
        include('footer.php');
    ?>
   
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>