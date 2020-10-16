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
    $id=$_GET['id'];
    include("../asset/conn.php");
    $error = '';
    if(isset($_POST['submit'])){
        
        $name = $_POST['name'];
        $slug = preg_replace('/[^a-z0-9]+/i','-',trim(strtolower($name))); 
        $pwith = $_POST['type'];
        $pslug= $_POST['pslug'];
        $id=$_POST['id'];
                
                $ins="UPDATE subchild SET name='$name',type='$pwith',slug='$slug',p_slug='$pslug' WHERE id='$id';";
                if(mysqli_query($sql,$ins)) 
                {
                    $_SESSION['msg'] = 'success';
                    
                }   
                else
                {
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
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['msg']);
            header("location:/admin/showsubchildwithoutparent.php");
        }
        else {
            echo '<script>alert("Sorry :( Failed Registration)")</script>';
            unset($_SESSION['msg']);
            header("location:/admin/showsubchildwithoutparent.php");
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
            <a>Edit Sub-Child</a>
          </li>
        </ol>
    <form method="POST" action="editsubchildwithoutparent.php">
    <?php
        $qwery="SELECT * FROM subchild WHERE id='$id'";
        $ql=mysqli_query($sql,$qwery);
        $qlrow=mysqli_fetch_array($ql);
    ?>

    <input value="<?php echo $id;?>" name="id" hidden>    

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Sub Child Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control"  placeholder="Sub Child Name" value="<?php echo $qlrow["name"]; ?>" required>
            </div>
        </div>
         <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Sub-Child Page Type </label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="type"  required>
                <option value="<?php echo $qlrow["type"]; ?>"><?php echo $qlrow["type"]; ?></option>
                <option value="file">File</option>
                <option value="text">Text</option>
               </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Parent</label>
            <div class="col-sm-10">
               <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" onchange="uniqueUser()" name="pslug">
                   <option value=""></option>
                <?php
                        $qc="SELECT * FROM parent";  
                        $rc = mysqli_query($sql, $qc);  
                        $rowc = mysqli_num_rows($rc);
                        if($rowc > 0 )  
                        {  
                                while($rowfc = mysqli_fetch_array($rc))
                                {
                                    if($rowfc['type']=="")
                                    {
                                            echo '<option value="'.$rowfc['slug'].'">'.$rowfc['name'].'</option>';
                                
                                        
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