<div class="main-page container">
      <div class="row"> 
        <div class="col-md-9">
          <div class="row">
            <div class="menu-introduction">
                <h4><a href="index.php">Trang Chủ</a>/<a href="">Tin tức</a></h4>
            </div><!--menu-introduction-->
          </div>
          <div class="row produce-wp">
          <?php
                $page       = !empty($_GET['paging']) ? $_GET['paging'] : 1;
                $item_page  = 20;
                $offset     = ($page - 1) * $item_page;
                $total      = $view->countNews();
                $total      = $total[0]['total'];

                $TotalPage = ceil($total / $item_page);

                $data = $view->getNews('LIMIT '.$item_page.' OFFSET '.$offset.' ');

                    foreach ($data as $item) {
            ?>
                <div class="media">
                    <a class="pull-left" href="index.php?page=chitiettin&id=<?php echo $item['matin'];?>" >
                      <img class="media-object " style='width:130px;' src="uploads/news/<?php echo $item['hinhanh'];?>" alt="anh1" />
                    </a>
                    <div class="media-body">
                      <a href="index.php?page=chitiettin&id=<?php echo $item['matin'];?>"><h5><?php echo $item['tieude']; ?></h5></a>
                      <p class="text-left"><?php echo strip_tags($item['excerpt']);?></p>
                    </div>
                </div>
            <?php
                }
            ?>

          </div><!--end .produce-wp-->
          <div class="pull-right">

              <nav>
                  <ul class="pagination">
                  <li><a href="index.php?page=tintuc&paging=1" class="<?php if( empty($_GET['paging']) || $_GET['paging'] == 1 ) echo 'disabled';?>">Sau</a></li>
                  <?php 
                    for ($i=1; $i < (int)$TotalPage + 1; $i++) { 
                    ?>
                         <li class="<?php if( !empty($_GET['paging']) && $_GET['paging'] == $i ) echo 'active';?>">
                            <a href="index.php?page=tintuc&paging=<?php echo $i;?>" class="<?php if( !empty($_GET['paging']) && $_GET['paging'] == $i ) echo 'disabled';?>"><?php echo $i;?></a>
                         </li>
                    <?php
                        }
                    ?>
                  <li ><a href="index.php?page=tintuc&paging=<?php echo $TotalPage;?>" class="<?php if( !empty($_GET['paging']) && $_GET['paging'] == $TotalPage ) echo 'disabled';?>">Tiếp</a></li> 
                    
                  </ul>
                </nav>
          </div>
        </div><!-- main-content-->
<style type="text/css">
    .produce-wp a h5 {
        color:black;
        font-weight: bold;
        text-decoration: none;
    }
    .produce-wp a:hover h5{
        color: #43b8b4;
    }
</style>