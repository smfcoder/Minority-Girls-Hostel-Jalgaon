<?php
$slug=$_GET['slug'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
          Hostel  
        </title>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<body>

<!-- Navigation -->
   <?php
   include('main/nav.php');
   ?>
           
<!-- /.navbar -->
<?php
    include('main/roll.php');
?>
<!-- carousel -->
<style>
    .card{
        border-radius:10px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
    }

    .card:hover {
    box-shadow: 0 12px 20px 0 rgba(0,0,0,0.2);
    }
    @media  only screen and (max-width: 600px) {
  .phoneimg {
    height:6rem;
  }
  .whatsnew{
      height:400px;
  }
  
}

}
</style>
<?php
    
    include('asset/conn.php');
    $query="SELECT * From content where slug='$slug';";
    $er=mysqli_query($sql,$query);
    $row=mysqli_fetch_array($er);
    
    $q="SELECT * From parent where slug='$slug';";
    $e=mysqli_query($sql,$q);
    $r=mysqli_fetch_array($e);
    
    $qsc="SELECT * From subchild where slug='$slug';";
    $esc=mysqli_query($sql,$qsc);
    $rsc=mysqli_fetch_array($esc);
    
    if($r['name']!="")
    {
        $head=$r['name'];
    }
    else
    {
        $head=$rsc['name'];
    }
?>


<div class="container">
    <div class="row" style="padding:10px;">
        <div class="card" style="margin-top:10px;margin-bottom:20px;width:100%;">
            <div class="card-body">
                <div class="title" style="font-size:36px;font-weight:bold;text-align:center;"><?php echo $head; ?></div><hr>
                <?php echo $row['content']; ?>
            </div>
        </div>
    </div>
</div>





<!-- Footer -->
<?php
    include('main/footer.php')
?>
	<!-- ./Footer -->

</body>
</html>