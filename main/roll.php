<div class="container sliderpadd">
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 350px;
  }
    @media  only screen and (max-width: 600px) {
  .carousel-inner img {
    height:15rem;
  }
    .sliderpadd{
      padding:0px;
  }
}

  </style>
  
  <?php
        include_once('asset/conn.php');
        $r_query="SELECT * From slider ORDER BY pos;";
        $r_er=mysqli_query($sql,$r_query);
        $no=mysqli_num_rows($r_er);   
        $no=$no-1;
        $k=1;
  ?>
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    
    
  <?php
    while($no!=0)
    {
  ?>
        <li data-target="#demo" data-slide-to="<?php echo $k;?>"></li>
    <?php
        $no=$no-1;
        $k=$k+1;
    }
    ?>
        
    
  </ul>
  <div class="carousel-inner">
      
    <?php
        $i=1;
        while($r_row=mysqli_fetch_array($r_er))
        {
            if($i==1)
            {
                $i=$i-1;
    ?>  
      
    <div class="carousel-item active">
      <img class="img-fluid" src="<?php echo $r_row["url"];?>" alt="image">
      <div class="carousel-caption">
        <h2><?php echo $r_row["caption"];?></h2>
        
      </div>   
    </div>
    
    <?php
            }
            else
            {
    ?>
    
    
    
    <div class="carousel-item">
      <img src="<?php echo $r_row["url"];?>" alt="caption">
      <div class="carousel-caption">
        <h2><?php echo $r_row["caption"];?></h2>
        
      </div>   
    </div>
   
        
    <?php
    
            }
        }
    ?>
   
   
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
<!-- Marquee --> 
<style>


@media screen and (max-width: 600px) {
  .marq{
      font-size:17px;
  }
  .column {
    width: 100%;
  }
    
}
.marq{
    background-color:#161d2b;
    color:white;
    font-size:20px;
    font-style:italic;
    font-weight:900;
    
}
ul{
    font-weight:600;
    padding:0px 10px 0px 10px;
}
.column {
  float: left;
  width: 33.33%;
  padding: 5px;
}


.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<div class="marq">
                <marquee behavior="scroll" onmouseover="stop()" onmouseout="start()"> <?php
                    include('asset/conn.php');
                    $query="SELECT * From marque ORDER BY pos";
                    $er=mysqli_query($sql,$query);
                    while($row=mysqli_fetch_array($er))
                    {
                        if($row["url"]!="")
                        {
                ?>            
                                           
                       <img src="../img/new.gif" style="display:inline;margin-left:20px;" width="45px" height="20px"/><a style="display:inline;color:#ffff;padding:left:0px;margin-left:0px;padding-right:10px;"  href="<?php echo $row["url"]; ?>" style="color:white;"><?php echo $row["name"]; ?></a>
            
                <?php    
                        }
                        else
                        {
                ?>
                <img src="../img/new.gif" style="display:inline;margin-left:20px;" width="45px" height="20px"/><?php echo $row["name"]; ?>
            
                <?php
                        }
                    }
                ?></marquee>
</div>
</div>