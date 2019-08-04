<?php
$id = $_GET['id'];

$sqlselect = "SELECT * FROM themmoi";
$resultCat = Mysqli_query($conn, $sqlselect) or die("Lỗi truy vấn Danh Mục");
$sql = "SELECT * FROM sanphamadd WHERE id=$id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST['addNew'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale_Off = $_POST['sale_Off'];
    
    $description = $_POST['description'];
    $status = ($_POST['status']) ? $_POST['status'] : 0;
    if ($_POST['cat_id'] == 'unselect') {
        $error_cat_id = '<span style="color: red;">(*)</span>';
    } else {
        $cat_id = $_POST['cat_id'];
    }
    $path = "img/";
    $fileName = "anh/";
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"]["name"];
        if ($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/jpg" || $_FILES["image"]["type"] == "image/png" || $_FILE["image"]["type"] == "image/gif") {
            if ($_FILES["image"]["size"] < 1000000) {
                if ($_FILES["image"]["error"] == 0) {
                    //tiến hành đưa file vào sever
                    $fileName = $_FILES["image"]["tmp_name"];
                    move_uploaded_file($fileName, $path . $_FILES["image"]["name"]);
                    $fileName = "img/";
                } else {
                    echo "lỗi file";
                }
            } else {
                echo "chỏ dk phép up len là 2 mb";
            }
        } else {
            echo "file ko đúng định dạng";
        }
    }
    $sql = "UPDATE sanphamadd SET name='$name',price='$price',sale_Off='$sale_Off',description='$description',image='$image',status='$status' WHERE id=$id";
    mysqli_query($conn, $sql) or die("loi them moi san pham" . "</br>" . $sql . $cat_id);
    header('location: quantri.php?page_layout=hanghoa');
}
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Sửa Hàng Hóa</h1>
    </div>
</div>
<!--/.row-->

<?php  ?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
             </div>
            <div class="panel-body">

                <form method="post" enctype="multipart/form-data" role="form">
                    <div class="row container-fluid">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" value="<?php if (isset($_POST['name'])) {
                                    echo $_POST['name'];
                                    } else {
                                        echo $row['name'];
                                    } ?>" name="name" id="name" required="">
                                </div>
                                <div class="form-group">
                                    <label>Loại Danh Mục</label><?php if (isset($error_cat_id)) {
                                        echo $error_cat_id;
                                    } ?>
                                    <select name="cat_id" id="cat_id" class="form-control">
                                        <option value="">--Chọn Loại Danh Mục--</option>
                                        <?php
                                        while ($rowcat = mysqli_fetch_assoc($resultCat)) {
                                            ?>
                                            <option value="<?php echo ($rowcat["id"]) ?>"><?php echo ($rowcat["catName"]) ?></option>
                                            <?php
                                        }

                                        ?>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Giá</label>
                                    <input type="text" id="price" name="price" value="<?php if (isset($_POST['price'])) {
                                        echo $_POST['price'];
                                        } else {
                                            echo $row['price'];
                                        } ?>" class="form-control" name="" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Giảm giá</label>
                                        <input type="text" id="sale_Off" value="<?php if (isset($_POST['sale_Off'])) {
                                            echo $_POST['sale_Off'];
                                            } else {
                                                echo $row['sale_Off'];
                                            } ?>" name="sale_Off" class="form-control" name="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Mô Tả</label><br/>
                                            <textarea name="description" id="description" cols="50" rows="10"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="be-checkbox custom-control custom-checkbox">
                                                <input type="checkbox" name="status" id="status" class="custom-control-input" value="<?php if (isset($_POST['status'])) {
                                                    echo $_POST['status'];
                                                    } else {
                                                        echo $row['status'];
                                                    } ?>"><span class="custom-control-label">remember me<span>
                                                    </label>
                                                </div>


                                                <div class="form-group">
                                                    <label>Ảnh sản phẩm</label><br/>
                                                    <input type="file" id="image" name="image">
                                                </div>
                                                <button type="submit" class="btn btn-primary" id="addNew" name="addNew">Lưu Thay Đổi</button>
                                                <button type="reset" class="btn btn-primary">làm mới</button>
                                                


                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div><!-- /.col-->
</div><!-- /.row -->