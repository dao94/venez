<div class="main-page container" style="margin-top:15px">
      <div class="row">
        <div class="col-md-9">
        <ol class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li class="active">Sản phẩm</li>
            </ol>
          <div class="product-list">
            <br />
            <div class="list">
            <?php 
                if (isset($_GET['id'])) {
                $id = $view->db->real_escape_string($_GET['id']);
                $data = $view->show_product("WHERE maloai = $id ORDER BY masp DESC");                
                }else{
                    $data = $view->show_product(" ORDER BY masp DESC");
                }
                if(!empty($data)){
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
                }else{
                    echo '<p style="margin-left:10px">Không có sản phẩm nào trong mục này</p>'; 
                }
            ?>
            </div><!-- end list-->
          </div><!-- end product-->
        </div><!-- main-content-->