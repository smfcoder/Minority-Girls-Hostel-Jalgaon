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
    
    if($fsec['slider']==0)
    {
        header('location:/admin/index.php');
    }
        

?>
<?php
    include("../asset/conn.php");
    $error = '';
    
    if(isset($_POST['submit']))
    {
        $filename = $_FILES['myfile']['name'];
        $caption=$_POST['caption'];
        
        $url="https://minorityhostel.gcoej.ac.in/uploads/".$filename;
        $destination = '../uploads/' . $filename;
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file = $_FILES['myfile']['tmp_name'];
        $size = $_FILES['myfile']['size'];
        if(!$filename=="")
        {
            if (!in_array($extension, ['jpg','jpeg','png','JPG','JPEG','PNG'])) 
            {
                $_SESSION['msg'] = 'img';
            } 
            else 
            {
                if (move_uploaded_file($file, $destination)) 
                {
                    
                    $caption = $_POST['caption'];
                    
                    $posi="SELECT * FROM slider;";
                    $qposi_e=mysqli_query($sql,$posi);
                    $qposi=mysqli_num_rows($qposi_e);
                    $cpos=$qposi+1;
                    
                    $ins='INSERT INTO slider(caption,url,pos) values("'.$caption.'","'.$url.'","'.$cpos.'");';
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
                    $_SESSION['msg'] = 'failed';
                    
                }
            }
        }
        else
        {
            $_SESSION['msg'] = 'req';
            
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
     <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

</head>

<body id="page-top">
 <?php

    if(isset($_SESSION['msg'])) {
        if($_SESSION['msg']=='success')   {
            echo '<script>alert("Registration Success")</script>';
            unset($_SESSION['msg']);
        }
        else if($_SESSION['msg']=='img') {
            echo '<script>alert("Please upload image");</script>';
            unset($_SESSION['msg']);
        }
        else if($_SESSION['msg']=='req') {
            echo '<script>alert("Upload file required");</script>';
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
            <a>Slider Images</a>
          </li>
        </ol>
    <form method="POST" action="slider.php" enctype="multipart/form-data">


        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Caption</label>
            <div class="col-sm-10">
              <input type="text" name="caption" class="form-control"  placeholder="Information about image">
            </div>
        </div>
    
        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Add Image</label>
            <div class="col-sm-10">
                <input type="file" name="myfile" required>
            </div>
        </div>
        
        <div class="text-center" style="padding-bottom:30px;">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
    </form>
          
<style>
    .table{
        border:1px solid black;
    }
    td,tr,th,thead{
        border:1px solid black;
    }
    .table thead th {
    border: 1px solid #000000;
}
</style>

    <div class="table-responsive">
     <table class="table pagin-table" width="100%">
        <thead>
            <tr>
                    <th>id</th>
                    <th>Caption</th>
                    <th>View Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
            </tr>
        </thead>
        <tbody class="row_position">
            <?php
                            include('../asset/conn.php');
                            $query="SELECT * From slider ORDER BY pos;";
                            $er=mysqli_query($sql,$query);
                           
                            
                                while($row=mysqli_fetch_array($er))
                                {
                                    
             ?>
                                    <tr id="<?php echo $row['id'] ?>">  
                                        <td><?php echo $row["pos"]; ?></td>
                                        <td><?php echo $row["caption"]; ?></td>
                                        <td><a href="<?php echo $row["url"]; ?>">View Photo</a></td>
                                        <td><a class="btn btn-primary" href="editslider.php?id=<?php echo $row['id'];?>">Edit</a></td>
                                        <td><a class="btn btn-danger" Onclick="return ConfirmDelete()" href="deleteslider.php?id=<?php echo $row['id'];?>">X</a></td>  
                                   <script>
                                       function ConfirmDelete() {
                                          return confirm("Are you sure you want to delete?");
                                        }
                                   </script>
                                    </tr>      
                                        
                   <?php        
                                   
                                    
                               }
                            
                    ?>
        </tbody>
        <tfoot>
                  <tr>
                    <th>id</th>
                    <th>Caption</th>
                    <th>View Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
        </tfoot>
    </table>
</div>	

<script type="text/javascript">
//   $('tbody').sortable();
 </script>
<script type="text/javascript">
    $( ".row_position" ).sortable({
        delay: 150,
        stop: function() {
            var selectedData = new Array();
            $('.row_position>tr').each(function() {
                selectedData.push($(this).attr("id"));
            });
            updateOrder(selectedData);
        }
    });


    function updateOrder(data) {
        $.ajax({
            url:"slider.php",
            type:'post',
            data:{position:data},
            success:function(){
                alert('your change successfully saved');
            }
        })
    }
</script>
<?php 
$position = $_POST['position'];
$i=1;
foreach($position as $k=>$v){
    $sq = "Update slider SET pos=".$i." WHERE id=".$v;
    $qu=mysqli_query($sql,$sq);
	$i++;
}
?>          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
        </div>
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