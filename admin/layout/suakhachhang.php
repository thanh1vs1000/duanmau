<?php 
$id = $_GET["id"];
$sql = "SELECT * FROM khachhang WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST["submit"])) {
	$name_kh=$_POST["name_kh"];
	$email=$_POST["email"];
	$diachi=$_POST["diachi"];
	$sdt=$_POST["sdt"];
	$sql=" UPDATE khachhang SET name_kh='$name_kh',email='$email',diachi='$diachi',sdt='$sdt'
	 WHERE id=$id";
	mysqli_query($conn,$sql) or die("loi ket noi".$sql) ;
	 header('location: quantri.php?page_layout=khachhang');
} ?>
<div class="form-group">
	<label>Khách Hàng</label>
	<form method="POST">
		<div class="col-md-6">
			<div class="form-group">
				<input type="text" class="form-control"   name="name_kh" id="name_kh"  value="<?php echo $row['name_kh']; ?> " required="">
			</div>
			<div class="form-group">
				<input type="text" class="form-control"  value="<?php echo $row['email']; ?> "  name="email" id="email" required="">
			</div>
			<div class="form-group">
				<input type="text" class="form-control"  value="<?php echo $row['diachi']; ?> "  name="diachi" id="diachi" required="">
			</div>
			<div class="form-group">
				<input type="text" class="form-control"  value="<?php echo $row['sdt']; ?> "  name="sdt" id="sdt" required="">
			</div>
			<button type="submit" name="submit">sửa</button>
		</div>
	</form>
</div>