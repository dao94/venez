<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = array();
        if(isset($_POST['tenloai']) && $_POST['tenloai'] !=''){
            $ten = $sp->db->real_escape_string($_POST['tenloai']);
        }else{
            $errors = 'name';
        }
        if(isset($_POST['tenloai']) && $_POST['tenloai'] !=''){
            $mota = $sp->db->real_escape_string($_POST['mota']);
        }else{
            $errors = 'description';
        }
        if(empty($errors)){      
            $q = $sp->Update_Category($_GET['id'],$ten,$mota);
            if($q){
                $mess = "Sửa thành công. nhấn vào <a href='index.php?action=cat'>đây</a> để quay lại ";
            }else{
                $mess = "Lỗi !!!!";
            } 
        }else{
            $mess = "Vui lòng nhập đầy đủ các fields";
        }
    }
?>
<h3 class="text-center">Sửa loại sản phẩm</h3>
          <div class="row">
            <div class="col-md-7">
            <?php if(isset($mess)) echo $mess;?>
              <form class="form-inline form" action="" method="POST">
              <?php 
                if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
                    $cid = $sp->db->real_escape_string($_GET['id']);
                    $data = $sp->Show_Category_By_Id($cid);
                    foreach ($data as $v) {
              ?>

                <div class="group-control">
                  <label for="name">Tên thể loại</label>
                  <input type="text" class="form-control" id="name" name="tenloai" value="<?php echo $v['tenloai'];?>"/>
                </div>
                <div class="group-control">
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" id="description" name="mota" value="<?php echo $v['mota'];?>" />
                </div>

                <div class="group-control">
                  <input type="submit" class="btn btn-primary them" value="Sửa" />
                </div>
              <?php
                    }
                }
              ?>
              </form>
            </div>
            </div>