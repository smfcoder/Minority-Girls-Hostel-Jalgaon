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
    
    if($fsec['quicklink']==0)
    {
        header('location:/admin/index.php');
    }

?>
<?php
    $id=$_GET['id'];
    include("../asset/conn.php");
    $error = '';
    
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $link=$_POST['link'];
        $id=$_POST['id'];

            $ins="UPDATE quicklink SET name='$name',link='$link' where id=$id;";

            if(mysqli_query($sql,$ins)) {
                $_SESSION['msg'] = 'success';
            }   
            else {
                $_SESSION['msg'] = 'failed';

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
            echo '<script>alert("Edit Success")</script>';
            unset($_SESSION['msg']);
            header("location:/admin/quicklinks.php");
        }
        else if($_SESSION['msg']=='already') {
            echo '<script>alert("Page Already registered")</script>';
            unset($_SESSION['msg']);
            header("location:/admin/quicklinks.php");
        }
        else if($_SESSION['msg']=='double') {
            echo '<script>alert("You should either file or Link")</script>';
            unset($_SESSION['msg']);
            header("location:/admin/quicklinks.php");
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration)")</script>';
            unset($_SESSION['msg']);
            header("location:/admin/quicklinks.php");
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
            <a>Edit Quicklink</a>
          </li>
        </ol>
    <form method="POST" action="editquicklinks.php">
    <?php
        $qwery="SELECT * FROM quicklink WHERE id='$id'";
        $ql=mysqli_query($sql,$qwery);
        $qlrow=mysqli_fetch_array($ql);
    ?>

    <input value="<?php echo $id;?>" name="id" hidden>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Link Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control"  placeholder="Name" value="<?php echo $qlrow["name"]; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Link</label>
            <div class="col-sm-10">
              <input type="text" name="link" class="form-control"  placeholder="http://website.com" value="<?php echo $qlrow["link"]; ?>" required>
            </div>
        </div>
        
        
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
    
    
          
        
            </div> 
                  
    
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