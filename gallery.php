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
        border-radius:5px;
        box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
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
<?php
    $page = $_GET['page'];
    include('asset/conn.php');
    $query="SELECT * From content where slug='$page';";
    $er=mysqli_query($sql,$query);
    $row=mysqli_fetch_array($er);
?>


<div class="container">
    <div class="row" style="padding:10px;">
        <div class="card" style="margin-top:10px;margin-bottom:20px;width:100%;">
            <div class="card-body">
                <div class="title" style="font-size:36px;font-weight:bold;text-align:center;">Gallery</div><hr>
            </div>
            <div class="card-body">
              
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
 


    <!-- Page Content -->
   <div class="container">


<style>
    .bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}
</style>
        <div class="row" style="padding-top:10px;">
<?php
    include('asset/conn.php');
    $query="SELECT * FROM gallery";
    $gal=mysqli_query($sql,$query);
    while($roww=mysqli_fetch_array($gal))
    {
?>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="<?php echo $roww['url']; ?>" class="fancybox" rel="ligthbox">
                    <img  src="<?php echo $roww['url']; ?>" class="zoom img-fluid "  alt="">
                </a>
            </div>
     <?php
    }
    ?>
        <script>    
           $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});
});
     </script>
           
           
       </div>

     
      

    </div>

<style>


#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }

</style>

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