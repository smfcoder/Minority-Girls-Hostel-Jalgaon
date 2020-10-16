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
/*@media  only screen and (min-width: 600px) {*/
/*  .whatsnew{*/
/*      height:80%;*/
/*  }*/
  
}
</style>



<div class="container">
    <div class="row" style="padding:10px;">
        <div class="card" style="margin-top:10px;margin-bottom:20px;width:100%;">
            <div class="card-header">
                <div class="title" style="font-size:36px;font-weight:bold;text-align:center;">View All</div>
            </div>
            <div class="card-body">
                <?php
                            include('asset/conn.php');
                            $w_query="SELECT * From whatnew;";
                            $w_er=mysqli_query($sql,$w_query);
                            while($w_row=mysqli_fetch_array($w_er))
                            {
                ?>    
                <div style="display:block;">
                <a href="<?php echo $w_row["url"]; ?>" ><i class="fa fa-angle-right" style="font-size:18px;color:black;margin-right:5px;"></i><?php echo $w_row["name"]; ?></a><br>
                    <?php echo $w_row["des"];?>
                </div><hr>
                <?php 
                            }
                ?>
                
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