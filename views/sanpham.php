<div class="main-page container">
      <div class="row"> 
        <div class="col-md-9">
          <?php
            $data = $view->show_product("WHERE masp = $_GET[id]");
            $item = $data[0];
          ?>
          <div class="row">
            <div class="menu-introduction">
                <h4><a href="index.php">Trang Chủ</a>/<a href="index.php?page=danhsachsp&id=<?php echo $item['maloai'];?>"><?php echo $item['tenloai'];?></a>/<em><?php echo $item['tensp'];?></em></h4>
            </div><!--menu-introduction-->
          </div>
          <div class="row produce-wp">
            <div class="col-md-4 anh-introduction">
                <img class="img-responsive" src="uploads/product/<?php echo $item['hinhanh'];?>"/>
            </div>
            <div class="col-md-8 sp-introduction">
                <h2 class="title-production"><?php echo $item['tensp'];?></h2>
                <img class="img-responsive" src="images/like_bg.png"/>
                <p><?php echo html_entity_decode($item['motasp']);?></p>
                <div class="line-production"></div>
            <div class="row">
              <div class="col-md-6 colum-left">
                  <p>Giá : <?php echo number_format($item['gia']);?> vnđ</p>
                  <p>Size : <?php echo $item['size'];?></p>
                  <p class="text-soluong">Số lượng :
                    <form method="POST" action="index.php?page=add_cart" >
                    <input type="number" min="1" max="50" value="1" name="qty" />
                    <input type="hidden" value="<?php echo $item['masp'];?>" name="masp"/>
                  </p>
                  <div class="clearfix"></div>
                  <p class="tinhtrang">Tình trạng :<?php echo $view->product_status($item['trangthai']);?> </p>
                  <div class="clearfix"></div>
                  <button type="submit" class="btn btn-primary">Mua ngay  &nbsp;<span class="glyphicon glyphicon-arrow-right"></span></button>
                    </form>
              </div>
              <div class="col-md-6 colum-right">
                <h4>Phương thức thanh toán</h4>
                <p>Cơ sở : Ngõ 144, An Dương Vương, Hà Nội , Vietnam</p>
                <p>HOTLINE : 0166.572.6864</p>
                <p>Email : pthuymkt@gmail.com</p>
              </div><!--end .colum-right-->
            </div>
            </div><!--end.sp-introduction-->
          </div><!--end .produce-wp-->
          <ul class="nav nav-tabs" id="myTab" style="margin-top:10px">
            <li class="active"><a href="#home" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li><a href="#comment" data-toggle="tab">Bình luận</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="home">
              <p class="chitietsanpham">
                <?php echo $item['motasp'];?>
              </p>
          </div>
          <div class="tab-pane" id="comment">
              <div class="fb-comments" data-href="https://www.facebook.com/Venez-beaut%C3%A9s-828170213946960/timeline/" data-width="100%" data-numposts="10"></div>
          </div>
        </div>
          <div class="row">
          <div class="product-list">
            <div class="title">
              <h3>Sản phẩm liên quan</h3>
            </div><!-- end title-->
            <div class="list">

              <div class="product-item col-md-3 col-sm-4 col-sx-6">
                <div class="thumb">
                  <a href=""><img src="images/product.jpg" alt="alt" class="img-responsive" /></a>
                  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Xem ngay</button>
                  <span class="status"><i class="glyphicon glyphicon-shopping-cart"></i> Còn hàng</span>
                </div>
                <h2 class="product-name"><a href="">Đầm Vintage Chấm Bi</a></h2>
                <div class="row">
                  <div class="col-md-6 price">50.000 vnđ</div>
                  <div class="col-md-6 product-code">Mã : D001</div>
                </div>
              </div><!-- end product-item-->

            </div><!-- end list-->
          </div><!-- end product-->
          </div>
        </div><!-- main-content-->