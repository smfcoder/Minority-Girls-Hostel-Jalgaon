<?php
    session_start();
    if(isset($_POST['submit']))
    {
        include('../asset/conn.php');
        $email=$_POST['email'];
        $sel="SELECT * FROM admin WHERE email='$email';";
        $e_sel=mysqli_query($sql,$sel);
        $row=mysqli_num_rows($e_sel);
        if($row==0)
        {
                $_SESSION['forgot']="fail";
                header('location:/admin/login.php');
        }
        else
        {
            $subject="Forgot password of Hostel";
            $otp=rand(10000,99999);
            $updateQuery = "UPDATE admin SET otp=$otp WHERE email='$email'";
            mysqli_query($sql, $updateQuery);
            $message="Your OTP: ".$otp;
            $headers="From: minorityhostel@gcoej.ac.in";
            if(mail($email,$subject,$message,$headers))
            {
                $_SESSION['otp']=$email;
                header('Location:/admin/otp.php');
            }
            else
            {
                $_SESSION['forgot']="mailfail"; 
                header('location:/admin/login.php');
            }
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

    <title>AdminPanel Password Forgot</title>
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
        
        <h3>Your Registered email</h3>
        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="email" required="required">
        </div>
       
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-block">Send otp</button>
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