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
    $id=$_GET['id'];
    include("../asset/conn.php");
    $error = '';
    
    
    
    if(isset($_POST['submit']))
    {
        $email=$_POST['email'];
        $old=$_POST['old'];
        
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        $type = $_POST['type'];
        $id=$_POST['id'];
        
        $qu="SELECT * FROM admin where username='$name';";
        $equ=mysqli_query($sql,$qu);
        $nor=mysqli_num_rows($equ);
        
        if($name==$old)
        {
            if($pass==$cpass)
            {
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
                
                $query = "UPDATE admin SET username='$name',password='$pass',email='$email',news='$newss',slider='$sliderr',whatnew='$whatsneww',quicklink='$quicklinkss',gallery='$galleryy',addpeople='$addpeoplee',govlink='$govlinkss',parent='$parentmenuu',subchild='$submenuu',addfile='$addfiless',addtext='$addtextt',user='$adduserr',copy='$copy' where id='$id';";
                if(mysqli_query($sql,$query))
                {
                    $_SESSION['msg']='success';
                    header('location:/admin/allusers.php');
                }
                else
                {
                    $_SESSION['msg']='fail';
                    header('location:/admin/allusers.php');
                }
            }
            else
            {
                $_SESSION['msg']='pass';
                header('location:/admin/allusers.php');
            }
        }
        else
        {
            if($nor<1)
            {
                if($pass==$cpass)
                {
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
        
        
        
                $query = "UPDATE admin SET username='$name',password='$pass',email='$email',news='$newss',slider='$sliderr',whatnew='$whatsneww',quicklink='$quicklinkss',gallery='$galleryy',addpeople='$addpeoplee',govlink='$govlinkss',parent='$parentmenuu',subchild='$submenuu',addfile='$addfiless',addtext='$addtextt',user='$adduserr',copy='$copy' where id='$id';";
                if(mysqli_query($sql,$query))
                {
                    $_SESSION['msg']='success';
                    header('location:/admin/allusers.php');
                }
                else
                {
                    $_SESSION['msg']='fail';
                    header('location:/admin/allusers.php');
                }
                }
            
                else
                {
                    $_SESSION['msg']='pass';
                    header('location:/admin/allusers.php');
                }
                
            }
            else
            {
                //  $_SESSION['msg']='user';
                // header('location:/admin/allusers.php');
            }
                
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
            <a>Edit User</a>
          </li>
        </ol>
    <form method="POST" action="edituser.php">

<?php
    include("../asset/conn.php");
    $qwy="Select * from admin where id='$id';";
    $qq=mysqli_query($sql,$qwy);
    $row=mysqli_fetch_array($qq);
?>
    <input value="<?php echo $row['id']; ?>"  name="id" hidden>
    <input value="<?php echo $row['username']; ?>"  name="old" hidden>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control"  placeholder="Username" value="<?php echo $row['username']; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="text" name="pass" class="form-control"  placeholder="Password" value="<?php echo $row['password']; ?>" required>
            </div>
        </div>
        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="text" name="cpass" class="form-control"  placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
            </div>
        </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>"  placeholder="Email" >
            </div>
        </div>
    <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Previliges</label>
            <div class="col-sm-10">
    <div class="form-check">
         <input type="hidden" class="form-check-input" name="news" value="0">
        <input type="checkbox" class="form-check-input" name="news" value="1" <?php if($row['news']==1){echo 'checked';}?> >
        <label class="form-check-label">News</label>
    </div>
    <div class="form-check">
      
          <input type="hidden" class="form-check-input" name="slider" value="0">
        <input type="checkbox" class="form-check-input" name="slider" value="1" <?php if($row['slider']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Slider</label>
    </div>
    <div class="form-check">
      
        <input type="hidden" class="form-check-input" name="whatsnew" value="0">
        <input type="checkbox" class="form-check-input" name="whatsnew" value="1" <?php if($row['whatnew']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">WhatsNew</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input"  name="quicklinks" value="0">
        <input type="checkbox" class="form-check-input" name="quicklinks" value="1" <?php if($row['quicklink']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">QuickLinks</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="gallery" value="0">
        <input type="checkbox" class="form-check-input" name="gallery" value="1" <?php if($row['gallery']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Gallery</label>
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="addpeople" value="0">
        <input type="checkbox" class="form-check-input" name="addpeople" value="1" <?php if($row['addpeople']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Add People</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="govlinks" value="0">
        <input type="checkbox" class="form-check-input" name="govlinks" value="1" <?php if($row['govlink']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Government Links</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="parentmenu" value="0">
        <input type="checkbox" class="form-check-input" name="parentmenu" value="1" <?php if($row['parent']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Add Parent Menu in Navigation Bar</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="submenu" value="0">
        <input type="checkbox" class="form-check-input" name="submenu" value="1" <?php if($row['subchild']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Add Sub-Menu to the Parent Menu in navigation bar</label>
    </div>
    <div class="form-check">
          <input type="hidden" class="form-check-input" name="addfiles" value="0">
        <input type="checkbox" class="form-check-input" name="addfiles" value="1" <?php if($row['addfile']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Add files</label>
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="addtext" value="0">
        <input type="checkbox" class="form-check-input" name="addtext" value="1" <?php if($row['addtext']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Add Text</label>
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="adduser" value="0">
        <input type="checkbox" class="form-check-input" name="adduser" value="1" <?php if($row['user']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Add user</label>
    </div>
    <div class="form-check">
        <input type="hidden" class="form-check-input" name="copy" value="0">
        <input type="checkbox" class="form-check-input" name="copy" value="1" <?php if($row['copy']==1){echo 'checked';}?>>
        <label class="form-check-label" for="check2">Copy Right links</label>
    </div>
    </div>
        </div>
        
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
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