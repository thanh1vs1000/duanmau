 <?php 
 if (isset($_POST["addNew"])) {
    $catName=$_POST["catName"];
    $status=($_POST["status"])?$_POST["status"]:0;
    $sql="INSERT INTO themmoi(catName,status) VALUES('$catName','$status')";
    mysqli_query($conn,$sql) or die("loi ket noi") ;
    header('location: quantri.php?page_layout=loaihang');
 } ?>
 <div class="container-fluid  dashboard-content">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Thêm Loại Hàng </h5>
                <div class="card-body">
                    <form action="#" id="basicform" method="post" data-parsley-validate="">
                        <div class="form-group">
                            <label for="inputUserName">Tên Loại Hàng</label>
                            <input name="catName" id="catName"  type="text"     class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                <label class="be-checkbox custom-control custom-checkbox">
                                    <input type="checkbox" name="status" id="status" class="custom-control-input" value="1"><span class="custom-control-label">Trạng Thái<span>
                                    </label>
                                </div>
                                <div class="col-sm-6 pl-0">
                                    <p class="text-right">
                                        <button type="submit" class="btn btn-space btn-primary" name="addNew">Thêm Mới</button>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>