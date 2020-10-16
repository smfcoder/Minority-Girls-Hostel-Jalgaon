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
    
    if($fsec['parent']==0)
    {
        header('location:/admin/index.php');
    }


?>
<?php
    
    include("../asset/conn.php");
    $error = '';
    if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $slug = preg_replace('/[^a-z0-9]+/i','-',trim(strtolower($name))); 
        $pwith = $_POST['pwith'];
        
        $sql_u = "SELECT * FROM parent where slug='$slug'";
        
        $res_u = mysqli_query($sql, $sql_u);
        if (mysqli_num_rows($res_u) != 0) {
            $_SESSION['msg'] = 'already';
        }
        else
        {
            if($pwith=="child")
            {
                $type="";
                $ins="INSERT INTO parent(name,child,type,slug) values('$name','$pwith','$type','$slug');";
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
                 header('location:/admin/ptype.php?name='.$name.'&pw='.$pwith);
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

    if(isset($_SESSION['msg'])) {
        if($_SESSION['msg']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['msg']);
        }
        else if($_SESSION['msg']=='already') {
            echo '<script>alert("Parent Page Already registered")</script>';
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
            <a>Add Menu to Navigation Bar</a>
          </li>
        </ol>
    <form method="POST" action="parentpage.php">


        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Parent Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control"  placeholder="Parent Name" required>
            </div>
        </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Parent with </label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="pwith" required>
                <option value="">Choose...</option>
                <option value="child">With Dropdown</option>
                <option value="nochild">Without Dropdown</option>
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