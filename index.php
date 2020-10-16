<!-- Designed And Developed By Bhavesh & Shreyas-->
<!DOCTYPE html>
<html>
    <head>
        <title>
          Hostel  
        </title>
        <meta charset="UTF-8">
        <meta name="description" content="Minority Hostel,Jalgaon">
        <meta name="keywords" content="Minority Hostel Jalgaon, Gcoej, ">
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
<style>
.scrollbar-deep-purple::-webkit-scrollbar-track {
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #F5F5F5;
border-radius: 10px; }

.scrollbar-deep-purple::-webkit-scrollbar {
width: 12px;
background-color: #F5F5F5; }

.scrollbar-deep-purple::-webkit-scrollbar-thumb {
border-radius: 10px;
-webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.1);
background-color: #512da8; }

.scrollbar-deep-purple {
scrollbar-color: #512da8 #F5F5F5;
}
.bordered-deep-purple::-webkit-scrollbar-track {
-webkit-box-shadow: none;
border: 1px solid #512da8; }

.bordered-deep-purple::-webkit-scrollbar-thumb {
-webkit-box-shadow: none; }

/***/

.square::-webkit-scrollbar-track {
border-radius: 0 !important; }

.square::-webkit-scrollbar-thumb {
border-radius: 0 !important; }

.thin::-webkit-scrollbar {
width: 6px; }

.example-1 {
position: relative;
overflow-y: scroll;
height: 600px;
}
</style>


<div class="container">
    <div class="row" style="margin-top:25px;">
        <div class="col-sm-8"  style="padding-bottom:10px;">
            <div class="card whatsnew">
            <div class="card-header">
                <i class="fa fa-newspaper-o" aria-hidden="true" style="font-size:48px;color:#a166ff;"></i><span style="font-size:32px;margin:10px;color:#9f1918;">What's New</span>
            </div>
                <div class="card-body example-1 scrollbar-deep-purple thin">
                 <?php
                            include('asset/conn.php');
                            $w_query="SELECT * From whatnew ORDER BY pos;";
                            $w_er=mysqli_query($sql,$w_query);
                            while($w_row=mysqli_fetch_array($w_er))
                            {
                ?>
                <div style="display:block;">
                <a target="_blank" href="<?php echo $w_row["url"]; ?>" ><i class="fa fa-angle-right" style="font-size:18px;color:black;margin-right:5px;"></i><?php echo $w_row["name"]; ?></a><br>
                    <?php echo $w_row["des"];?>
                </div><hr>
                <?php 
                            }
                ?>
                </div>
                <div class="card-footer" style="background-color:white;border-top:none;">
                   <a href="viewallnew.php" type="button" class="btn btn-primary" style="float:right;">View All...  <i class="fa fa-external-link-square" style="font-size:18px"></i></a> 
                </div>
            </div>
        </div>
<style>
    img {
  display:block;
  margin-left: auto;
  margin-right: auto;
}
</style>
        <div class="col-sm-4" style="">
        <div class="row" style="padding-left:20px;padding-right:20px;">
         <?php
                include('asset/conn.php');
                $p_query="SELECT * From desig ORDER BY pos;";
                $p_er=mysqli_query($sql,$p_query);
                while($p_row=mysqli_fetch_array($p_er))
                {
        ?>   
            
            <div class="card" style="height:120px;border-radius:0px;width:100%;margin-bottom:5px;">
                <div class="row no-gutters">
                    <div class="col-auto">
                        <img src="<?php echo $p_row["url"];?>" class="img-fluid"  style="height:118px;width:120px;" alt="">
                    </div>
                    <div class="col">
                        <div class="card-block px-2">
                            <h4 class="card-title" style="color:#9f1918;margin-bottom:3px;font-size:20px;"><?php echo $p_row["name"];?></h4>
                            <p class="card-text"><?php echo $p_row["desig"];?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php
                }
            ?>
            
        </div>
        </div>
    </div>
</div>
<div class="container" style="background-color:#fcfcfc;margin-top:10px;margin-bottom:10px;">
    <div class="row">
    <marquee behavior="scroll" direction="left" style="" onmouseover="stop()" onmouseout="start()">
        <div class="row no-gutters">
                    <div class="col-auto">
                        <?php
                include('asset/conn.php');
                $g_query="SELECT * From govlink ORDER BY pos;";
                $g_er=mysqli_query($sql,$g_query);
                while($g_row=mysqli_fetch_array($g_er))
                {
        ?>   
                        <a href="<?php echo $g_row['link'];?>"><img src="<?php echo $g_row['url'];?>" class="img-fluid"  style="height:118px;width:280px;display:inline;padding:10px;padding-right:20px;" alt=""></a>
                    
            <?php
                }
            ?>
                    </div>
        </div>
    </marquee>
  </div>
</div>
<!-- Footer -->
<?php
    include('main/footer.php')
?>
	<!-- ./Footer -->
</body>
</html>