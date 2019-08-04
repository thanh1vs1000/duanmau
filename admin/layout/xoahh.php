<?php 


	$id=$_GET["id"];
	$query="DELETE FROM sanphamadd where id={$id}";
$result=mysqli_query($conn,$query);
 
	header('location:quantri.php?page_layout=hanghoa');

 ?>