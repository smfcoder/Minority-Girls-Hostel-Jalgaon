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
    
    include("../asset/conn.php");
    $error = '';
    if(isset($_POST['submit']))
    {
        $slug = $_POST['slug'];
        header('location:/admin/edittext.php?slug='.$slug);
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
            <a>Edit Text</a>
          </li>
        </ol>
    <form method="POST" action="selectedittext.php">


        
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Select to edit content</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" onchange="uniqueUser()" name="slug" required>
                   <option value="">Choose...</option>
                <?php
                        $pq="SELECT * FROM parent";  
                        $ep = mysqli_query($sql, $pq);  
                        $no = mysqli_num_rows($ep);
                        
                        
                        
                        if($no > 0 )  
                        {  
                                while($row = mysqli_fetch_array($ep))
                                {
                                    $s=$row['slug'];
                                    $parent="SELECT * FROM content where slug='$s'";  
                                    $eparent = mysqli_query($sql, $parent);  
                                    $noc = mysqli_num_rows($eparent);
                                    
                                    if($row['type']=="text" && $noc!=0)
                                    {
                                            echo '<option value="'.$row['slug'].'">'.$row['name'].'</option>';
                                    }
                                }       
                        }
                        $sub="SELECT * FROM subchild";  
                        $ec = mysqli_query($sql,$sub);  
                        $no1 = mysqli_num_rows($ec);
                        if($no1 > 0 )  
                        {  
                                while($rows = mysqli_fetch_array($ec))
                                {
                                    
                                    $s=$rows['slug'];
                                    $child="SELECT * FROM content where slug='$s'";  
                                    $echild = mysqli_query($sql, $child);  
                                    $noc = mysqli_num_rows($echild);
                                    
                                    if($rows['type']=="text" && $noc!=0)
                                    {
                                            echo '<option value="'.$rows['slug'].'">'.$rows['name'].'</option>';
                                    }
                                }
                        }
                        
                
                ?>

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

   <!--Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
   <!--Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>
</body>

</html>