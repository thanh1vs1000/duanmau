<script>
    function xoaDanhMuc(){
        var conf=confirm("Bạn có chắc chắn muốn xóa danh mục này hay không?");
        return conf;
    }
</script>
<?php 

if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}

$rowsPerPage=5;
$perRow=$page*$rowsPerPage-$rowsPerPage;

$sqlselect = "SELECT * FROM sanphamadd ORDER BY id ASC LIMIT $perRow,$rowsPerPage";
$result = mysqli_query($conn, $sqlselect);
$i = 0;

$totalRows= mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanphamadd"));
$totalPages= ceil($totalRows/$rowsPerPage);

$listPage="";
for($i=1;$i<=$totalPages;$i++){
    if($page==$i){
        $listPage.='<li class="active"><a class="page-link" href="quantri.php?page_layout=hanghoa&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listPage.='<li><a class="page-link" href="quantri.php?page_layout=hanghoa&page='.$i.'">'.$i.'</a></li>';
    }
}
?>

<h2>QUẢN LÝ HÀNG HÓA</h2>
<a href="quantri.php?page_layout=themhh"class="btn btn-outline-secondary" style="width: 150px;">THÊM MỚI</a><br/>
<br/>
<div class="container-fluid  dashboard-content">
    <div class="row">
        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Basic Table</h5>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered first">

                          <tr>

                            <th>Tên Sản Phẩm</th> 
                            <th> Giá</th>
                            <th>Giảm Giá</th>
                            <th>Ảnh</th>
                            <th>Mã Loại</th>
                            <th>Ngày nhập</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                        <?php 
                        while ($row = mysqli_fetch_assoc($result)) {

                            $i++;
                            ?>
                            <tr>

                                <td><?php echo $row["name"] ?></td>
                                <td><?php echo $row["price"] ?></td>
                                <td><?php echo $row["sale_Off"] ?></td> 
                                <td><img src="img/<?php echo $row["image"];?>" style="width:60px; height: 60px;"></td>
                                <td><?php echo $row['cat_id']; ?></td>
                                <td><?php echo $row["date1"]; ?></td>
                                

                                <td><a href="quantri.php?page_layout=suahh&id=<?php echo $row["id"] ?>"><i class="far fa-edit fa-lg"></i></a></td>
                                <td><a onClick="return xoaDanhMuc();" href="quantri.php?page_layout=xoahh&id=<?php echo $row["id"] ?>"><i class="fas fa-trash-alt fa-lg"></i></a></td>
                            </tr>
                        <?php } ?>

                    </table>
                    
                      <ul class="pagination" style="float: right;">
                            <?php 
                            echo $listPage;
                             ?>
                    </ul>
              
            </div>
        </div>
    </div>
</div>
