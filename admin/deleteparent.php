<?php  
	include("../asset/conn.php");
	$id = $_GET['id'];
	$pq = "SELECT * FROM parent WHERE id =$id";
	$er=mysqli_query($sql,$pq);
    $row=mysqli_fetch_array($er);
    $slug=$row['slug'];

    
	$cq = "SELECT * FROM subchild WHERE p_slug ='$slug'";
	$ecq=mysqli_query($sql,$cq);
    $x=mysqli_num_rows($ecq);
    while($x!=0) 
    {
        $n="";
        $ins="UPDATE subchild SET p_slug='$n' WHERE p_slug='$slug';";
        $update=mysqli_query($sql,$ins);
        $x=$x-1;   
    }
    
                                
	
	$query = "DELETE FROM parent WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
	    
		header("location:/admin/showparentpage.php");
	}  
 ?>