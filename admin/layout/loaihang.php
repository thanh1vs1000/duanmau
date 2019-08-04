<script>
    function xoaDanhMuc(){
        var conf=confirm("Bạn có chắc chắn muốn xóa danh mục này hay không?");
        return conf;
    }
</script>
<?php 
$sql = "SELECT * FROM loai ";
$query = mysqli_query($conn,$sql);


?>
<h2>QUẢN LÝ LOẠI HÀNG</h2>
<a href="quantri.php?page_layout=themloaihang"class="btn btn-outline-secondary" style="width: 150px;">THÊM MỚI</a><br/>
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
                        <table class="table table-striped table-bordered first" id="bang">

                            <tr>
                                <th>ID<i class="fas fa-dharmachakra fa-spin"></i></th>
                                <th>TÊN LOẠI HÀNG</th>
                                <th>TRẠNG THÁI</th>
                                <th>SỬA</th>
                                <th>XÓA</th>
                            </tr>
                            <?php 
                            $sqlselect= "SELECT * FROM themmoi";
                            $result=mysqli_query($conn,$sqlselect)or die("lỗi truy vấn danh mục");
                            if(mysqli_num_rows($result)>0){
                                $count=0;
                                while($row=mysqli_fetch_assoc($result)){
                                    $count ++;
                                    ?>
                                    <tr>
                                        <td><?php echo $count ?></td>
                                        <td><?php echo $row["catName"] ?></td>
                                        <td><?php echo ($row["status"])?"Hiển Thị":"Ẩn" ?></td>
                                        <td>
                                            <a href="quantri.php?page_layout=sualoaihang&id=<?php echo $row["id"] ?> "><i class="far fa-edit fa-lg"></i></a></td>
                                            <td><a onClick="return xoaDanhMuc();" href="quantri.php?page_layout=xoaloaihang&id=<?php echo $row["id"] ?>" ><i class="fas fa-trash-alt fa-lg"></i></a></td>
                                        </tr>
                                    <?php } 
                                }?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>
    </div>
