<?php  
	include("../asset/conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM quicklink WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
	    $e=mysqli_query($sql,$q);
		header("location:/admin/quicklinks.php");
	}  
 ?>