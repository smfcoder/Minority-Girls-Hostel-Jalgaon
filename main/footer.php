	<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4 offset-md-1">
					<h5>Government College of Engineering Jalgaon</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>NH - 6, Vidyut Colony, Jalgaon - 425001</a></li>
						
					</ul>
				</div>
				<div class="col-xs-12 col-md-3 offset-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
					    <?php
                            include_once('asset/conn.php');
                            $q_query="SELECT * From quicklink ORDER BY pos;";
                            $q_er=mysqli_query($sql,$q_query);
                            while($q_row=mysqli_fetch_array($q_er))
                            {
                        ?>
					    
					    
						<li><a href="<?php echo $q_row["link"]; ?>"><i class="fa fa-angle-double-right"></i><?php echo $q_row["name"]; ?></a></li>
					
    				<?php
    				
                            }
    				?>
    				
    				</ul>
				</div>
			
			</div>
			
		<?php
		                    include_once('asset/conn.php');
		                    
		                    $update="UPDATE visitor SET visitor = visitor+1 WHERE id = 1;";
		                    $up=mysqli_query($sql,$update);
                            $v_query="SELECT * From visitor;";
                            $v_er=mysqli_query($sql,$v_query);
                            $v_row=mysqli_fetch_array($v_er);
                            
                            
                            $copy="SELECT * FROM copy ORDER BY pos;";
		                    $copy_e=mysqli_query($sql,$copy);
		?>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
				    <hr style="background-color:white;">
				    <p>Developed & Managed by Software Development Cell, Government College of Engineering, Jalgaon.</p>
					<p class="h6">Website Developers/Maintainers: <a>Mr. Harish Gadade</a> (Asst. Prof. in Computer Engg.) , <a href="https://www.linkedin.com/in/shreyas-fegade-b751ab138/">Mr. Shreyas Fegade</a> & <a href="https://www.linkedin.com/in/bhavesh-wani-507107168/">Mr. Bhavesh Wani</a> </p>
				    <div>
				        <?php
				            while($copy_row=mysqli_fetch_array($copy_e))
				            {
				        ?>
				        <a target="_blank" href="<?php echo $copy_row['url']; ?>"  class="h6"  style="display:inline;color:white; "><?php echo $copy_row['name']; ?> |  </a>
				        
				        <?php
				            }
				        ?>
				    </div>
				    <p class="h6">&copy;  GCOEJ | All rights reserved.</p>
				    <p class="h6">Visitors : <?php echo $v_row['visitor'];?></p>
				     
				</div>
				</hr>
			</div>	
		</div>
	</section>
	<style>
    /* Footer */
@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
section {
    padding: 50px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 10px;
    text-transform: uppercase;
}
#footer {
    background:#021e3a !important;
}
#footer h5{
	padding-left: 10px;
    border-left: 3px solid #eeeeee;
    padding-bottom: 6px;
    margin-bottom: 20px;
    color:#7c36ff;
}
#footer a {
    /*color: #ffffff;*/
    text-decoration: none !important;
    background-color: transparent;
    -webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
    margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
    font-weight: 700;
}

@media (max-width:767px){
	#footer h5 {
    padding-left: 0;
    border-left: transparent;
    padding-bottom: 0px;
    margin-bottom: 10px;
}
}

</style>