<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errors = array();
        if(empty($_POST['loaisp'])){
            $errors = 'loai';
        }else{
            $loaisp = $sp->db->real_escape_string($_POST['loaisp']);
        }// END VALIEDATE LOAI;
        if(empty($_POST['tensp'])){
            $errors = 'tensp';
        }else{
            $tensp = htmlentities(strip_tags($_POST['tensp']));
        }
        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != '') {
            $allowExt = array('jpg','png','jpeg');
            $Ext = end(explode('.',$_FILES['hinhanh']['name']));
            if (in_array($Ext,$allowExt)) {
                $newName = md5(time()).".".$Ext;
                move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../uploads/product/".$newName);
            }
        }else{
            $errors['hinhanh'];
        }
        if(empty($_POST['price'])){
            $errors = 'price';
        }else{
            $price = $sp->db->real_escape_string($_POST['price']);
        }// END VALIEDATE LOAI;
        if(empty($_POST['status'])){
            $errors = 'trangthai';
        }else{
            $trangthai = $sp->db->real_escape_string($_POST['status']);
        }// END VALIEDATE LOAI;
        if(empty($_POST['size'])){
            $errors = 'size';
        }else{
            $size = $sp->db->real_escape_string($_POST['size']);
        }
        if(empty($_POST['mota'])){
            $errors = 'mota';
        }else{
            $mota = htmlentities(strip_tags($_POST['mota']));
        }// END VALIEDATE LOAI;
        
        if(empty($errors)){      
            $q = $sp->add_product($loaisp,$tensp,$mota,$price,$size,$newName,$trangthai);
            if($q){
                $mess = $sp->message("Thêm thành công vào cơ sở dữ liệu",1);
            }else{
                $mess = $sp->message("Lỗi !!!!",0);
            } 
        }else{
            $mess = $sp->message("Vui lòng nhập đầy đủ các fields",0);
        }
        

    }
?>
<h3 class="text-center" >Loại sản phẩm</h3>
          <div class="row">
            <div class="col-md-6">
            <?php if(isset($mess)) echo $mess;?>
              <form class="form-inline form" action="" method="POST" enctype="multipart/form-data">
                <div class="group-control">
                <div class="group-control">
                  <label for="description">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="description" name="tensp" />
                </div>
                  <label for="name">Loại sản phẩm</label>
                  <select name="loaisp" class="form-control">
                    <?php 
                    $data = $sp->Show_Category();
                    foreach ($data as $v) {
                    ?>
                    <option value="<?php echo $v['maloai'];?>"><?php echo $v['tenloai'];?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <div class="group-control">
                  <label for="description">Hình ảnh</label>
                  <input type="file" class="form-control" id="description" name="hinhanh" />
                </div>
                <div class="group-control">
                  <label for="description">Giá</label>
                  <div class="input-group">
                  <input type="text" class="form-control" id="description" name="price" />
                  <span class="input-group-addon">VNĐ</span>
                  </div>
                </div>
                <div class="group-control">
                  <label for="description">Size</label>
                  <input type="text" class="form-control" id="description" name="size" />
                </div>
                <div class="group-control">
                  <label for="description">Trạng thái</label><br />
                  <label>
                  <input type="radio" name="status" value="1" /> Còn hàng
                  </label><br />
                  <label>
                  <input type="radio" name="status" value="2" /> Hết hàng
                  </label><br />
                  <label>
                  <input type="radio" name="status" value="3" /> Đang nhập
                  </label><br />
                </div>
               </div>
               <div class="clear"></div>
               <div class="col-md-11">
                <div class="group-control">
                  <label for="description">Mô tả sản phẩm</label>
                  <textarea name="mota" class="form-control" id="editor"></textarea>
                </div>

                <div class="group-control">
                  <input type="submit" class="btn btn-primary them" value="Thêm" />
                </div>
                </div>
              </form>
            
            </div>