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
    
    if($fsec['addtext']==0)
    {
        header('location:/admin/index.php');
    }

?>
<?php
    $slug=$_GET['slug'];
    include("../asset/conn.php");
    $error = '';
    if(isset($_POST['submit']))
    {
        $slug =$_POST['id']; 
        $content=$_POST['editor1'];
       
        $sql_u = "SELECT * FROM content where slug='$slug'";
        
        $res_u = mysqli_query($sql, $sql_u);
        if (mysqli_num_rows($res_u) != 0) {
            $_SESSION['msg'] = 'already';
        }
        else{
            $ins="INSERT INTO content(content,slug) values('$content','$slug');";
            if(mysqli_query($sql,$ins)) {
                $_SESSION['msg'] = 'success';
                header('location:/admin/selectortext.php');
            }   
            else {
                $_SESSION['msg'] = 'failed';
                header('location:/admin/selectortext.php');

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
            <a>Add Text</a>
          </li>
        </ol>
    
    <form method="POST" action="addtext.php">
        <input value="<?php echo $slug;?>" name="id" hidden>
        <div class="form-group">
                <textarea name="editor1"></textarea>
                    <script>
                            CKEDITOR.replace( 'editor1',{
                                                    filebrowserUploadUrl: 'https://minorityhostel.gcoej.ac.in/editor/ckeditor/ck_upload.php',
                                                    filebrowserUploadMethod: 'form'
                                                });
                            
                            
                            
                    </script>
            </div>
        
       
       
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
    <label>Note :<br>1) If you want to add table through the ckeditor then after selecting rows and columns goto => Advanced => in Stylesheet classes add : "table" and in Style remove width(keep it empty) </label>
                  
    
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

   <!--Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   <!--Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
 
</body>

</html>