<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors = array();
    if(empty($_POST['loaisp'])){
        $errors='loaisp';
    }else{
        $loaisp=$sp->db->real_escape_string($_POST['loaisp']);
    }   
    if(empty($_POST['tensp'])){
        $errors='tensp';
    }else{
        $tensp=$sp->db->real_escape_string($_POST['tensp']);
    }
    if(empty($_POST['price'])){
        $errors='price';
    }else{
        $price=$sp->db->real_escape_string($_POST['price']);
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
    if(empty($_POST['status'])){
        $errors='status';
    }else{
        $status=$sp->db->real_escape_string($_POST['status']);
    }
     if(empty($_POST['size'])){
        $errors='size';
    }else{
        $size=$sp->db->real_escape_string($_POST['size']);
    }
     if(empty($_POST['mota'])){
        $errors='mota';
    }else{
        $mota=$sp->db->real_escape_string($_POST['mota']);
    }
    if(empty($errors)){
        $q=$sp->update_product($_GET['id'],$tensp,$loaisp,$price,$size,$status,$mota,$newName);
        if($q){
            $messa='sửa thành công.nhấn vào <a href="index.php?action=product"> đây </a> để quay về trang trước';
        }else{
            $messa='sửa thất bại';
        }
    } else {
      $messa="vui lòng nhập đầy đủ các fields";
    }
  }
?>
<h3 class="text-center" >sửa Loại sản phẩm</h3>
  <div class="row">
    <div class="col-md-6">
    <?php if(isset($messa)) echo $messa;?>
      <form class="form-inline form" action="" method="POST" enctype="multipart/form-data">
      <?php
        if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
            $pid=$sp->db->real_escape_string($_GET['id']);
            $data= $sp->show_product("WHERE masp = $pid");
            foreach($data as $v){
        ?>

        <div class="group-control">
        <div class="group-control">
          <label for="description">Tên sản phẩm</label>
          <input type="text" class="form-control" id="description" name="tensp" value="<?php echo $v['tensp'];?>" />
        </div>
          <label for="name">Loại sản phẩm</label>
         <select name="loaisp" class="form-control">
            <?php 
            $data1 = $sp->Show_Category();
            foreach ($data1 as $value) {
            ?>
            <option value="<?php echo $value['maloai'];?>"><?php echo $value['tenloai'];?></option>
            <?php
            }
            ?>
        </select>
        </div>
        <div class="group-control">
          <label for="description">Hình ảnh</label>
          <input type="file" class="form-control" id="description" name="hinhanh"  />
          <img src="../uploads/product/<?php echo $v['hinhanh'];?>" alt="alt" width="80" class="img-responsive" style="margin:10px">
        </div>
        <div class="group-control">
          <label for="description">Giá</label>
          <div class="input-group">
          <input type="text" class="form-control" id="description" name="price" value="<?php echo $v['gia'];?>" />
          <span class="input-group-addon">VNĐ</span>
          </div>
        </div>
        <div class="group-control">
          <label for="description">Size</label>
          <input type="text" class="form-control" id="description" name="size" value="<?php echo $v['size'];?>"/>
        </div>
        <div class="group-control">
          <label for="description">Trạng thái</label><br />
          <label>
          <input type="radio" name="status" value="1" <?php if($v['trangthai'] == 1) echo ' checked'?>/> Còn hàng
          </label><br />
          <label>
          <input type="radio" name="status" value="2" <?php if($v['trangthai'] == 2) echo ' checked'?>/> Hết hàng
          </label><br />
          <label>
          <input type="radio" name="status" value="3" <?php if($v['trangthai'] == 3) echo ' checked'?>/> Đang nhập
          </label><br />
        </div>
       </div>
       <div class="clear"></div>
       <div class="col-md-11">
        <div class="group-control">
          <label for="description">Mô tả sản phẩm</label>
          <textarea name="mota" class="form-control" ><?php echo $v['mota'];?></textarea>
        </div>

        <div class="group-control">
          <input type="submit" class="btn btn-primary them" value="sửa" />
        </div>
        </div>
        <?php
                }
                
        }
        ?>
      </form>
    
</div>
