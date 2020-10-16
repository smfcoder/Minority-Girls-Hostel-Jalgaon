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
    
    if($fsec['subchild']==0)
    {
        header('location:/admin/index.php');
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
            unset($_SESSION['msg']);
        }
        else if($_SESSION['msg']=='already') {
            echo '<script>alert("Page Already registered")</script>';
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
            <a>Sub-Menus With Parent</a>
          </li>
        
        </ol>

        <!-- Icon Cards-->
        
              <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Sub-Menus</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    
                    <th width="11%">id</th>
                    <th width="11%">Sub-Menu Name</th>
                    <th width="11%">Type</th>
                    <th width="11%">Menu</th>
                    <th width="11%">Edit</th>
                    <th width="11%">Delete</th>
                  </tr>
                </thead>
                
                   <?php
                            include('../asset/conn.php');
                            $query="SELECT * From subchild WHERE p_slug!='';";
                            $er=mysqli_query($sql,$query);
                            
                                while($row=mysqli_fetch_array($er))
                                {
                                    $comp=$row['p_slug'];
                                    $qu = "SELECT * from parent WHERE slug='$comp';";
                                    $qry = mysqli_query($sql,$qu);
                                    $roww=mysqli_fetch_array($qry)
                    ?>
                                    <tr>  
                                        <td><?php echo $row["id"]; ?></td>
                                        <td><?php echo $row["name"]; ?></td>
                                        <td><?php echo $row["type"]; ?></td>
                                        <td><?php echo $roww["name"]; ?></td>
                                        <td><a class="btn btn-primary" href="editsubchildwithparent.php?id=<?php echo $row['id'];?>">edit</a></td> 
                                        <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="delsubchild.php?id=<?php echo $row['id'];?>">X</a></td>  
                                   <script>
                                       function ConfirmDelete() {
                                          return confirm("Are you sure you want to delete?");
                                        }
                                   </script>
                                    </tr>      
                                        
                    <?php        
                                   
                                    
                                }
                            
                    ?>
                <tfoot>
                  <tr>
                    
                    <th width="11%">id</th>
                    <th width="11%">Sub-Menu Name</th>
                    <th width="11%">Type</th>
                    <th width="11%">Menu</th>
                    <th width="11%">Edit</th>
                    <th width="11%">Delete</th>
                  </tr>
                </tfoot>
                <tbody>
                  
                       
                </tbody>
              </table>
            </div>
          </div>
          
        </div>

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