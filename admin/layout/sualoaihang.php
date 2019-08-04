<!-- sửa danh mục sản phẩm -->

<?php
$id = $_GET["id"];
$sql = "SELECT * FROM themmoi WHERE id='$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST['submit'])) {
    $catName = $_POST['catName'];
    if (isset($catName)) {
        $sql = "UPDATE themmoi SET catName='$catName' WHERE id=$id";
        $query = mysqli_query($conn, $sql);
        header('location: quantri.php?page_layout=loaihang');
    }
}

?>
<div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Sửa Danh Muc </h5>
                <div class="card-body">
                    <form action="#" id="basicform" method="post" data-parsley-validate="">
                        <div class="form-group">
                            <label for="inputUserName">Tên Danh Mục</label>
                            <input name="catName" id="catName" type="text" value="<?php echo $row['catName']; ?> " class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                <label class="be-checkbox custom-control custom-checkbox">
                                    <input type="checkbox" name="status" id="status" class="custom-control-input" value="1"><span class="custom-control-label">Trạng Thái<span>
                                </label>
                            </div>
                            <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="submit" class="btn btn-space btn-primary" name="submit"> Sửa</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>