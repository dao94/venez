
    
        <div class="col-md-3">
          <div class="sidebar-right">
            <div class="title-sidebar">
                <a href="#">Danh mục sản phẩm</a>
            </div>
                <ul class="list-unstyled list-style ">
                <?php
                    $data = $view->Show_Category();
                    foreach ($data as $v) {
                ?>
                      <li><a href="index.php?page=danhsachsp&id=<?php echo $v['maloai'];?>"><?php echo $v['tenloai'];?></a></li>
                <?php                    
                    }
                 ?>
                </ul>
            </div><!--sibar right-->
            <div class="sidebar-right">
                <div class="title-sidebar">
                    <a href="#">Tin tức</a>
                </div>
                <?php
                    $data = $view->getNews('LIMIT 5');
                    foreach ($data as $item) {
                ?>
                
                <div class="media">
                    <a class="pull-left" href="index.php?page=chitiettin&id=<?php echo $item['matin'];?>">
                      <img class="media-object sidebar-image" src="uploads/news/<?php echo $item['hinhanh'];?>" alt="anh1" width="50"/>
                    </a>
                    <div class="media-body">
                      <a href="index.php?page=chitiettin&id=<?php echo $item['matin'];?>"><?php echo $item['tieude']; ?></a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div><!--sibar right-->
            <div class="sidebar-right muahang">
              <p style="text-transform: uppercase;">HƯỚNG DẪN MUA HÀNG TẠI Venez beautés</p>
              <img  class="img-responsive" src="images/tui_bg.png">
              <img  class="tui2" src="images/tui2_bg.png">
            </div><!--sidebar-right muahang-->
            <div class="clearfix"></div>
            <div class="facebook ">
              <div class="fb-page" data-href="https://www.facebook.com/Venez-beaut%C3%A9s-828170213946960" data-width="262" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"></div>
            </div><!--facebook-->
        </div><!--end col-md-3-slide-bar-->
      </div>
       <div class="col-md-12">
          <div class="dathang">
              <img class="img-responsive" src="images/anh5_bg.png"/>
          </div><!--end.dathang-->
        </div>
    </div>