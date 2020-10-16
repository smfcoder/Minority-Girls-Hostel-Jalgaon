<?php  
	include("../asset/conn.php");
	$id = $_GET['id'];
	$query = "DELETE FROM whatnew WHERE id =$id";
	if(mysqli_query($sql, $query))  
	{
	    $e=mysqli_query($sql,$q);
		header("location:/admin/whatsnew.php");
	}  
 ?>