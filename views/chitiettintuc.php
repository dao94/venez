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
                $id       = !empty($_GET['id']) ? $_GET['id'] : 0;
                if(empty($page)){
                     echo 'Không tìm thấy bài viết phù hợp';
                }else {
                    $data = $view->getNews('WHERE matin='.$id);
                    if(!empty($data)){

                    
                    
            ?>

            <h4 class="text-info"><?php echo $data[0]['tieude'];?></h4> 
            <p>
                <?php echo html_entity_decode($data[0]['noidung']);?>
            </p>

            <div class="tab-pane" id="comment">
            <script>
                var str ="<?php echo $data[0]['tieude'];?>";
                document.title = str;                

                document.write("<div class='fb-comments' data-href='" + window.location.href + "' data-num-posts='10' data-width='100%'></div>");
            </script>
            </div>

            <?php  
                }else {
                    echo 'Không tìm thấy bài viết phù hợp';
                }
            }

          ?>


          </div><!--end .produce-wp-->
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