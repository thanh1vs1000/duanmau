
<?php 

  $sql =  "SELECT * FROM sanphamadd  LIMIT 8";
  $query = mysqli_query($conn,$sql);


 ?>



<section class="inspired_product_area section_gap_bottom_custom">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title">
            <h2><span>Sản phẩm</span></h2>
            <p>Những sản phẩm đang được bán</p>
          </div>
        </div>
      </div>

      <div class="row">
        <?php 
          while ($row = mysqli_fetch_array($query)) {
        
         ?>
        <div class="col-lg-3 col-md-6" >
          <div class="single-product">
            <div class="product-img" id="sp" >
              <img class="img-fluid w-100 " src="./admin/img/<?php echo $row['image'] ?>"  />
              <div class="p_icon">
                <a href="#">
                  <i class="ti-eye"></i>
                </a>
                <a href="#">
                  <i class="ti-heart"></i>
                </a>
                <a href="#">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="#" class="d-block">
                <h4><?php echo $row['name']; ?></h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">$25.00</span>
                <del><?php echo $row['price'] ?></del>
              </div>
            </div>
          </div>
        </div>
      <?php }; ?>
      </div>
    </div>
  </section>