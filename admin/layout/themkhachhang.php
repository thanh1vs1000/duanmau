<?php 
if (isset($_POST["submit"])) {
	$name_kh=$_POST["name_kh"];
	$email=$_POST["email"];
	$diachi=$_POST["diachi"];
	$sdt=$_POST["sdt"];
	$sql="INSERT INTO khachhang(name_kh,email,diachi,sdt) 
	VALUES('$name_kh','$email','$diachi','$sdt')";
	mysqli_query($conn,$sql) or die("loi ket noi".$sql) ;
	header('location: quantri.php?page_layout=khachhang');
	
} ?>
<div class="form-group">
	<label>Khách Hàng</label>
	<form method="POST">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Nhập Tên "  name="name_kh" id="name_kh" required="">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Nhập email "  name="email" id="email" required="">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Nhập Địa Chỉ "  name="diachi" id="diachi" required="">
			</div>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Nhập SDT "  name="sdt" id="sdt" required="">
			</div>
			<button type="submit" name="submit">them moi</button>
		</div>
	</form>
</div>