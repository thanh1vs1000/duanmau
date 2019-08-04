<?php 

$sqlselect="SELECT * FROM themmoi";
$resultCat=Mysqli_query($conn,$sqlselect) or die("Lỗi truy vấn Danh Mục");
if(isset($_POST['addNew'])){
    $name=$_POST['name'];
    $price=$_POST['price'];
    $sale_Off=$_POST['sale_Off'];
    $description=$_POST['description'];
    //echo $_POST['description'],$_POST['status'];die;
    $status=($_POST['status'])?$_POST['status']:0;
    if($_POST['cat_id']=='unselect'){
        $error_cat_id='<span style="color: red;">(*)</span>';
    }
    else{
        $cat_id=$_POST['cat_id'];
    }
    $path="img/";

    if(isset($_FILES["image"])){
        $image=$_FILES["image"]["name"];
        if ($_FILES["image"]["type"]=="image/jpeg"||$_FILES["image"]["type"]=="image/jpg"||$_FILES["image"]["type"]=="image/png"||$_FILES["image"]["type"]=="image/gif") {
          if ($_FILES["image"]["size"]<1000000) {
              if ($_FILES["image"]["error"]==0) {
                 //tiến hành đưa file vào sever
                $fileName=$_FILES["image"]["tmp_name"];
                move_uploaded_file( $fileName, $path.$_FILES["image"]["name"]);
                $fileName="img/";

            }else{
                echo "lỗi file";
            }
        }else{
            echo "chỏ dk phép up len là 2 mb";
        }
    }else{
        echo "file ko đúng định dạng";
    }
}
$sql="INSERT INTO sanphamadd(name,price,description,cat_id,sale_Off ,image,status)
VALUES('$name','$price','$description','$cat_id','$sale_Off','$image','$status')";
mysqli_query($conn,$sql) or die("loi them moi san pham"."</br>".$sql);
header('location: quantri.php?page_layout=hanghoa');
}
?>
<form method="post" role="form" style="width: 100%;" enctype="multipart/form-data">
    <div class="col-md-6">

        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" class="form-control" placeholder="Nhập Tên sản Phẩm"  name="name" id="name" required="">
        </div>
        <div class="form-group">
            <label>Loại sản phẩm</label><?php if(isset($error_cat_id)){echo $error_cat_id;} ?>
            <select name="cat_id" id="cat_id" class="form-control">
                <option value="" >--Chọn Lại Sản Phẩm--</option>
                <?php 
                while ($rowcat=mysqli_fetch_assoc($resultCat)) {
                    ?>
                    <option value="<?php echo($rowcat["id"]) ?>"><?php echo($rowcat["catName"]) ?></option>
                    <?php
                }

                ?>
            </select>
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input type="text" id="price" name="price" class="form-control" name="" required="">
        </div>
        <div class="form-group">
            <label>Sale_Off</label>
            <input type="text" id="sale_Off" name="sale_Off" class="form-control" name="" required="">
        </div>
        <div class="form-group">
            <label>Mô Tả</label><br/>
            <textarea name="description" id="description" cols="50" rows="10"></textarea>
        </div>
        <div class="form-group">
           <label class="be-checkbox custom-control custom-checkbox">
            <input type="checkbox" name="status" id="status" class="custom-control-input" checked value="1"><span class="custom-control-label">Đặc Biệt<span>
            </label>
        </div>


        <div class="form-group">
            <label>Ảnh Sản Phẩm</label>                 
            <input type="file" id="image" name="image">
        </div>
        


    </div>
</div>
</div>
</div>

<button type="submit" class="btn btn-primary" name="addNew">Thêm mới</button>
<button type="reset" class="btn btn-default" name="reset">Làm mới</button>


</form>