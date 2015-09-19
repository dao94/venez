<div class="main-page container">
      <div class="row"> 
        <div class="col-md-9">

          <?php
            $data = $view->show_product("WHERE masp = $_GET[id]");
            if($data) {
              $item = $data[0];
            } else {
              echo 'not ok !';
              exit();
            }
          ?>
          <div class="row">
            <div class="menu-introduction">
                <h4><a href="index.php">Trang Chủ</a>/<a href="index.php?page=danhsachsp&id=<?php echo $item['maloai'];?>"><?php echo $item['tenloai'];?></a>/<em><?php echo $item['tensp'];?></em></h4>
            </div><!--menu-introduction-->
          </div>
          <div class="row produce-wp" style="padding-bottom:15px">
            <div class="col-md-4 anh-introduction">
                <img class="img-responsive" src="<?php echo $curentUrl;?>/uploads/product/<?php echo $item['hinhanh'];?>"/>
            </div>
            <div class="col-md-8 sp-introduction">
                <h2 class="title-production"><?php echo $item['tensp'];?></h2>
                <div class="fb-like" data-href='<?php echo $curentUrl?>/sanpham/<?php echo $item['masp']?>' data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                <p><?php echo html_entity_decode($item['motasp']);?></p>
                <div class="line-production"></div>
            <div class="row">
              <div class="col-md-6 colum-left">
                  <p>Giá : <?php echo number_format($item['gia']);?> vnđ</p>
                  <p>Size : <?php echo $item['size'];?></p>
                  <p class="text-soluong">Số lượng :
                    <form method="POST" action="<?php echo $curentUrl?>/add_cart" >
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
                <?php echo html_entity_decode($item['motasp']);?>
              </p>
          </div>
          <div class="tab-pane" id="comment">
              <div class="fb-comments" data-href="https://www.facebook.com/Venez-beaut%C3%A9s-828170213946960/" data-width="100%" data-numposts="10"></div>
          </div>
        </div>
          <div class="row">
          <div class="product-list">
            <div class="title">
              <h3>Sản phẩm liên quan</h3>
            </div><!-- end title-->
            <div class="list">
            <?php
              $ecs = $view->show_product("WHERE maloai = {$item['maloai']}");
              if($ecs) {
                foreach ($ecs as $val) {
               ?>
              <div class="product-item col-md-3 col-sm-4 col-sx-6">
                <div class="thumb">
                  <a href="<?php echo $curentUrl;?>/sanpham/<?php echo $val['masp']?>"><img src="<?php echo $curentUrl;?>/uploads/product/<?php echo $val['hinhanh'];?>" alt="alt" class="img-responsive" /></a>
                  <button class="btn btn-primary btnPreview" data-toggle="modal" data-target="#myModal" data-id="<?php echo $val['masp'];?>" data-name="<?php echo $val['tensp'];?>" data-price="<?php echo number_format($val['gia']);?> " data-img="<?php echo $val['hinhanh'];?>">Xem ngay</button>
                  <span class="status"><i class="glyphicon glyphicon-shopping-cart"></i><?php echo $view->product_statusIndex($val['trangthai']);?></span>
                </div>
                <h2 class="product-name"><a href=""><?php echo $val['tensp'];?></a></h2>
                <div class="row">
                  <div class="col-md-6 price"><?php echo number_format($val['gia']);?> vnđ</div>
                  <div class="col-md-6 product-code">Mã : <?php echo $val['masp'];?></div>
                </div>
              </div><!-- end product-item-->
              <?php  } } ?>
            </div><!-- end list-->
          </div><!-- end product-->
          </div>
        </div><!-- main-content-->