<?php
session_start();
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:/admin/login.php');
    exit();
   
}
    include("../asset/conn.php");
    $sec="SELECT * FROM admin where username='$sname';";
    $esec=mysqli_query($sql,$sec);
    $fsec=mysqli_fetch_array($esec);
    
    if($fsec['user']==0)
    {
        header('location:/admin/index.php');
    }

?>
<?php
    include("../asset/conn.php");
    $error = '';
    
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $type = $_POST['type'];
        $q="SELECT * FROM admin where username='$name';";
        $eq=mysqli_query($sql,$q);
        $no=mysqli_num_rows($eq);
        if($no==0)
        {
            if($pass==$cpass)
            {
                if($type=="all")
                {
                    $news=1;
                    $slider=1;
                    $whatnew=1;
                    $quicklink=1;
                    $gallery=1;
                    $addpeople=1;
                    $govlink=1;
                    $parent=1;
                    $subchild=1;
                    $addfile=1;
                    $addtext=1;
                    $user=1;
                    $ins="INSERT INTO admin(username,password,email,news,slider,whatnew,quicklink,gallery,addpeople,govlink,parent,subchild,addfile,addtext,user) values('$name','$pass','$email','$news','$slider','$whatnew','$quicklink','$gallery','$addpeople','$govlink','$parent','$subchild','$addfile','$addtext','$user');";
                    if(mysqli_query($sql,$ins)) 
                    {
                        $_SESSION['msg'] = 'success';
                    }   
                    else 
                    {
                        $_SESSION['msg'] = 'failed';
                    }
                }
                else
                {
                    $news=0;
                    $slider=0;
                    $whatnew=0;
                    $quicklink=0;
                    $gallery=0;
                    $addpeople=0;
                    $govlink=0;
                    $parent=0;
                    $subchild=0;
                    $addfile=0;
                    $addtext=0;
                    $user=0;
                    $ins="INSERT INTO admin(username,password,email,news,slider,whatnew,quicklink,gallery,addpeople,govlink,parent,subchild,addfile,addtext,user) values('$name','$pass','$email','$news','$slider','$whatnew','$quicklink','$gallery','$addpeople','$govlink','$parent','$subchild','$addfile','$addtext','$user');";
                    if(mysqli_query($sql,$ins)) 
                    {
                        header('location:/admin/customize.php?user='.$name);
                    }   
                    else 
                    {
                        $_SESSION['msg'] = 'failed';
                    }
                    
                }
            }
            else
            {
                $_SESSION['msg'] = 'pass';
            }
        }
        else
        {
            $_SESSION['msg'] = 'user';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Admin Panel</title>

  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="css/sb-admin.css" rel="stylesheet">
 <script src="../editor/ckeditor/ckeditor.js"></script>

</head>

<body id="page-top">
 <?php

    if(isset($_SESSION['msg'])) {
        if($_SESSION['msg']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['msg']);
        }
        else if($_SESSION['msg']=='pass')   {
            echo '<script>alert("Check Password and Confirm Password")</script>';
            unset($_SESSION['msg']);
        }
        else if($_SESSION['msg']=='user')   {
            echo '<script>alert("Username already Register")</script>';
            unset($_SESSION['msg']);
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration)")</script>';
            unset($_SESSION['msg']);
        }
    }
?> 





  <?php
        include('main/nav.php');
  ?>

  <div id="wrapper">

   <?php
        include('main/side.php');
  ?>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>ADD User</a>
          </li>
        </ol>
    <form method="POST" action="adduser.php">


        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control"  placeholder="Username" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="pass" class="form-control"  placeholder="Password" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" name="cpass" class="form-control"  placeholder="Confirm Password" required>
            </div>
        </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control"  placeholder="Email" >
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Permission</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="type" required>
                <option value="">Choose...</option>
                <option value="all">All</option>
                <option value="cust">Customize</option>
               </select>
            </div>
        </div>
        
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
    
        
    
      <!-- Sticky Footer -->
      <?php
            include("main/footer.php");
      ?>
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>
 
</body>

</html>