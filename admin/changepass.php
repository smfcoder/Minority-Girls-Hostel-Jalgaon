<?php
session_start();
 $sname=$_SESSION['adminId'];
if(!isset($_SESSION['adminId']))
{
    header('location:/admin/login.php');
    exit();
   
}

?>
<?php
    include("../asset/conn.php");
    $error = '';
    
    if(isset($_POST['submit']))
    {
        $oldpass=$_POST['oldpass'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $sname=$_POST['old'];
        $qu="SELECT * FROM admin where username='$sname';";
        $equ=mysqli_query($sql,$qu);
        $fe=mysqli_fetch_array($equ);
        if($oldpass==$fe['password'])
        {
                if($pass==$cpass)
                {
                    $ins="UPDATE admin SET password='$pass' WHERE username='$sname';";
                    if(mysqli_query($sql,$ins)) 
                    {
                         echo '<script>alert("Update success")</script>';
                    }   
                    else 
                    {
                         echo '<script>alert("fail")</script>';
                    }
                    
                }
                else
                {
                     echo '<script>alert("Check Password and Confirm Password")</script>';
                }
         }
         else
         {
              echo '<script>alert("Check old Password")</script>';
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
            <a>Change Password</a>
          </li>
        </ol>
    <form method="POST" action="changepass.php">

    <input value="<?php echo $sname;?>" name="old" hidden>        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Old Password</label>
            <div class="col-sm-10">
              <input type="password" name="oldpass" class="form-control"  placeholder="Password" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">New Password</label>
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