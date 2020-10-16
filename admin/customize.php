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
    $username=$_GET['user'];
    include("../asset/conn.php");
    $error = '';
    
    if(isset($_POST['submit']))
    {
        $userr=$_POST['slug'];
        $news=$_POST['news'];
        $slider=$_POST['slider'];
        $whatsnew=$_POST['whatsnew'];
        $quicklinks=$_POST['quicklinks'];
        $gallery=$_POST['gallery'];
        $addpeople=$_POST['addpeople'];
        $govlinks=$_POST['govlinks'];
        $parentmenu=$_POST['parentmenu'];
        $submenu=$_POST['submenu'];
        $addfiles=$_POST['addfiles'];
        $addtext=$_POST['addtext'];
        $adduser=$_POST['adduser'];
        
        $copy=$_POST['copy'];
        
        function chkstatus($a)
        {
            if($a==1)
            {
                $aa=1;
            }
            else
            {
                $aa=0;
            }
            return($aa);
        }
        $newss=chkstatus($news);
        $sliderr=chkstatus($slider);
        $whatsneww=chkstatus($whatsnew);
        $quicklinkss=chkstatus($quicklinks);
        $galleryy=chkstatus($gallery);
        $addpeoplee=chkstatus($addpeople);
        $govlinkss=chkstatus($govlinks);
        $parentmenuu=chkstatus($parentmenu);
        $submenuu=chkstatus($submenu);
        $addfiless=chkstatus($addfiles);
        $addtextt=chkstatus($addtext);
        $adduserr=chkstatus($adduser);
        $copy=chkstatus($copy);
        
        
        
        $query = "UPDATE admin SET news='$newss',slider='$sliderr',whatnew='$whatsneww',quicklink='$quicklinkss',gallery='$galleryy',addpeople='$addpeoplee',govlink='$govlinkss',parent='$parentmenuu',subchild='$submenuu',addfile='$addfiless',addtext='$addtextt',user='$adduserr',copy='$copy' where username='$userr';";
        if(mysqli_query($sql,$query))
        {
            $_SESSION['msg']='success';
        }
        else
        {
            $_SESSION['msg']='fail';
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">

 <?php
        include('main/head.php');
  ?>


<body id="page-top">
<?php

    if(isset($_SESSION['msg'])) {
        if($_SESSION['msg']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            header('location:/admin/adduser.php');
            unset($_SESSION['msg']);
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration)")</script>';
            header('location:/admin/adduser.php');
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
            <a>Customize User</a>
          </li>
        
        </ol>
<style>
    .form-check-input{
        height:25px;
        width:25px;
        margin:10px;
    }
    .form-check-label{
        margin:5px;
        margin-left:45px;
        font-size:20px;
    }
</style>
        <!-- Icon Cards-->
        <form method="POST" action="customize.php">
    <input value="<?php echo $username; ?>"  name="slug" hidden>
    <div class="form-check">
         <input type="hidden" class="form-check-input" name="news" value="0">
        <input type="checkbox" class="form-check-input" name="news" value="1">
        <label class="form-check-label">News</label>
    </div>
    <div class="form-check">
      
          <input type="hidden" class="form-check-input" name="slider" value="0">
        <input type="checkbox" class="form-check-input" name="slider" value="1">
        <label class="form-check-label" for="check2">Slider</label>
    </div>
    <div class="form-check">
      
        <input type="hidden" class="form-check-input" name="whatsnew" value="0">
        <input type="checkbox" class="form-check-input" name="whatsnew" value="1">
        <label class="form-check-label" for="check2">WhatsNew</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input"  name="quicklinks" value="0">
        <input type="checkbox" class="form-check-input" name="quicklinks" value="1">
        <label class="form-check-label" for="check2">QuickLinks</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="gallery" value="0">
        <input type="checkbox" class="form-check-input" name="gallery" value="1">
        <label class="form-check-label" for="check2">Gallery</label>
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="addpeople" value="0">
        <input type="checkbox" class="form-check-input" name="addpeople" value="1">
        <label class="form-check-label" for="check2">Add People</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="govlinks" value="0">
        <input type="checkbox" class="form-check-input" name="govlinks" value="1">
        <label class="form-check-label" for="check2">Government Links</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="parentmenu" value="0">
        <input type="checkbox" class="form-check-input" name="parentmenu" value="1">
        <label class="form-check-label" for="check2">Add Parent Menu in Navigation Bar</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="submenu" value="0">
        <input type="checkbox" class="form-check-input" name="submenu" value="1">
        <label class="form-check-label" for="check2">Add Sub-Menu to the Parent Menu in navigation bar</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="addfiles" value="0">
        <input type="checkbox" class="form-check-input" name="addfiles" value="1">
        <label class="form-check-label" for="check2">Add files</label>
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="addtext" value="0">
        <input type="checkbox" class="form-check-input" name="addtext" value="1">
        <label class="form-check-label" for="check2">Add Text</label>
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="adduser" value="0">
        <input type="checkbox" class="form-check-input" name="adduser" value="1">
        <label class="form-check-label" for="check2">Add user</label>
    </div>
    
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="copy" value="0">
        <input type="checkbox" class="form-check-input" name="copy" value="1">
        <label class="form-check-label" for="check2">Copy Right Links</label>
    </div>
    
    <center>
        <button type="submit" name="submit" class="btn btn-primary" style="margin:10px;text-align:center;">Submit</button>
    </center>
  </form>

        
      </div>
      <!-- /.container-fluid -->

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