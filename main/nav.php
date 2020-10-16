<!--title name -->
<div class="container-fluid" style="vertical-align: middle;">
    <div class="row justify-content-center">
        <img class="img-fluid" src="img/headerlogo.PNG" style="height:105px;width:800px;">

            <div id="google_translate_element"></div>
            <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
            </script>
            
            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    </div>
</div>
<!--title name -->
 <nav class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: #003366;">
    <div class="container-fluid">
        <a class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive" style="font-weight:700; color:white;font-size:17px;padding-left:0px;" href="index.php">Minority Hostel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" style="background-color:white;">
            <span class="navbar-toggler-icon" style="font-size:15px;"></span>
        </button>
        <div class="collapse navbar-collapse linkbckcolor" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color:white;">Home</a>
                </li>
               
                <?php
                    include_once('asset/conn.php');
                    $query="SELECT * From parent";
                    $er=mysqli_query($sql,$query);
                    while($row=mysqli_fetch_array($er))
                    {
                        if($row['child']=="nochild")
                        {
                            if($row['type']=="file")
                            {
                ?>            
                                <li class="nav-item active">
                                    <a class="nav-link" href="downloads.php?slug=<?php echo $row["slug"]; ?>" style="color:white;"><?php echo $row["name"]; ?></a>
                                </li>
                        <?php
                            }
                            else
                            {
                        ?>
                                <li class="nav-item active">
                                    <a class="nav-link" href="content.php?slug=<?php echo $row["slug"]; ?>" style="color:white;"><?php echo $row["name"]; ?></a>
                                </li>
                        
                        <?php
                            }
                        ?>
            
                <?php    
                        }
                        else
                        {
                            $comp=$row['slug'];
                            $queryy="SELECT * From subchild WHERE p_slug='$comp'";
                            $err=mysqli_query($sql,$queryy);
                            $x=mysqli_num_rows($err);
                            
                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" style="color:white;" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $row["name"];?>
                        </a>
                        <?php
                            if($x!=0)
                            {
                        ?>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <?php
                            while($roww=mysqli_fetch_array($err))
                            {
                                if($roww['type']=="file")
                                {
                        ?>
                                    <a class="dropdown-item" href="downloads.php?slug=<?php echo $roww["slug"]; ?>"><?php echo $roww["name"];?></a>
                            <?php
                                }
                                else
                                {
                            ?>        
                                    <a class="dropdown-item" href="content.php?slug=<?php echo $roww["slug"]; ?>"><?php echo $roww["name"];?></a>
                                
                            <?php
                                }
                                
                            }
                          ?>
                        </div>
                        <?php
                        }                
                            ?>
                    </li>
                
                <?php
                            
                        }
                    }
                    
                ?>

                
                
                
                
                
                <li class="nav-item active">
                        <a class="nav-link" href="gallery.php" style="color:white;">Gallery</a>
                </li>
                
    </ul>
  </div>
                
                
            </ul>
        </div>
    </div>
</nav>
<style>
    .dropdown:hover>.dropdown-menu {
  display: block;
}
 .dropdown{
     font-size:17px;
     font:white;
 }
 .nav-item{
     font-size:17px;
 }
      
</style>
