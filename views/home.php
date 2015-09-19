<div class="main-page container">
      <div class="row">
        <div class="col-md-9">
          <div class="product-list">
            <div class="title">
              <h3>Sản phẩm nổi bật</h3>
            </div><!-- end title-->
            <div class="list">
            <?php 
                $data = $view->show_product('ORDER BY rand() LIMIT 4');
                foreach ($data as $p) {
            ?>
            
            
              <div class="product-item col-md-3 col-sm-4 col-sx-6">
                <div class="thumb text-center">
                  <a href="index.php?page=sanpham&id=<?php echo $p['masp'];?>"><img src="uploads/product/<?php echo $p['hinhanh'];?>" alt="alt" class="img-responsive" /></a>
                  <button class="btn btn-primary btnPreview" data-toggle="modal" data-target="#myModal" data-id="<?php echo $p['masp'];?>" data-name="<?php echo $p['tensp'];?>" data-price="<?php echo number_format($p['gia']);?> " data-img="<?php echo $p['hinhanh'];?>">Xem ngay</button>
                  <span class="status"><i class="glyphicon glyphicon-shopping-cart"></i> <?php echo $view->product_statusIndex($p['trangthai']);?></span>
                </div>
                <h2 class="product-name"><a href="index.php?page=sanpham&id=<?php echo $p['masp'];?>"><?php echo $p['tensp'];?></a></h2>
                <div class="row">
                  <div class="col-md-6 price"><?php echo number_format($p['gia']);?> vnđ</div>
                  <div class="col-md-6 product-code">Mã : <?php echo $p['masp'];?></div>
                </div>
              </div><!-- end product-item-->
            <?php
                }
            ?>
            </div><!-- end list-->
          </div><!-- end product-->
          <div class="product-list">
            <div class="title">
              <h3>Váy , đầm</h3>
            </div><!-- end title-->
            <div class="list">
              <?php 
                $data = $view->show_product('WHERE maloai = 10 LIMIT 4');
                foreach ($data as $p) {
            ?>
            
            
              <div class="product-item col-md-3 col-sm-4 col-sx-6">
                <div class="thumb text-center">
                  <a href="index.php?page=sanpham&id=<?php echo $p['masp'];?>"><img src="uploads/product/<?php echo $p['hinhanh'];?>" alt="alt" class="img-responsive" /></a>
                  <button class="btn btn-primary btnPreview" data-toggle="modal" data-target="#myModal" data-id="<?php echo $p['masp'];?>" data-name="<?php echo $p['tensp'];?>" data-price="<?php echo number_format($p['gia']);?> " data-img="<?php echo $p['hinhanh'];?>">Xem ngay</button>
                  <span class="status"><i class="glyphicon glyphicon-shopping-cart"></i> <?php echo $view->product_statusIndex($p['trangthai']);?></span>
                </div>
                <h2 class="product-name"><a href="index.php?page=sanpham&id=<?php echo $p['masp'];?>"><?php echo $p['tensp'];?></a></h2>
                <div class="row">
                  <div class="col-md-6 price"><?php echo number_format($p['gia']);?> vnđ</div>
                  <div class="col-md-6 product-code">Mã : <?php echo $p['masp'];?></div>
                </div>
              </div><!-- end product-item-->
            <?php
                }
            ?>
            </div><!-- end list-->
          </div><!-- end product-->
          <div class="product-list">
            <div class="title">
              <h3>Quần áo công sở</h3>
            </div><!-- end title-->
            <div class="list">
              <?php 
                $data = $view->show_product('WHERE maloai = 17 LIMIT 4');
                foreach ($data as $p) {
            ?>
            
            
              <div class="product-item col-md-3 col-sm-4 col-sx-6">
                <div class="thumb text-center">
                  <a href="index.php?page=sanpham&id=<?php echo $p['masp'];?>"><img src="uploads/product/<?php echo $p['hinhanh'];?>" alt="alt" class="img-responsive" /></a>
                  <button class="btn btn-primary btnPreview" data-toggle="modal" data-target="#myModal" data-id="<?php echo $p['masp'];?>" data-name="<?php echo $p['tensp'];?>" data-price="<?php echo number_format($p['gia']);?> " data-img="<?php echo $p['hinhanh'];?>">Xem ngay</button>
                  <span class="status"><i class="glyphicon glyphicon-shopping-cart"></i> <?php echo $view->product_statusIndex($p['trangthai']);?></span>
                </div>
                <h2 class="product-name"><a href="index.php?page=sanpham&id=<?php echo $p['masp'];?>"><?php echo $p['tensp'];?></a></h2>
                <div class="row">
                  <div class="col-md-6 price"><?php echo number_format($p['gia']);?> vnđ</div>
                  <div class="col-md-6 product-code">Mã : <?php echo $p['masp'];?></div>
                </div>
              </div><!-- end product-item-->
            <?php
                }
            ?>
            </div><!-- end list-->
          </div><!-- end product-->
        </div><!-- main-content-->