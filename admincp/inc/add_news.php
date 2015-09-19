<h4>Thêm tin tức</h4>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();
        foreach ($_POST as $k=>$v) {
            if (empty($_POST[$k])) {
                $errors[] = $k;
            }
        }
        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['name'] != '') {
            $allowExt = array('jpg','png','jpeg');
            $Ext = end(explode('.',$_FILES['hinhanh']['name']));
            if (in_array($Ext,$allowExt)) {
                $newName = md5(time()).".".$Ext;
                move_uploaded_file($_FILES['hinhanh']['tmp_name'],"../uploads/news/".$newName);
            }
        }
        if (empty($errors)) {
            $tieude = $_POST['tieude'];
            $noidung = $_POST['noidung'];
            if ($sp->insertNews($tieude,$newName,$noidung)) {
                $mess = 'Thêm thành công !';
            }else{
                $mess = 'Thêm thất bại';
            }
        }
    }
    if (isset($mess)) {
        echo $sp->message($mess);
    }
?>
<div class="col-md-6">
    <form class="form-inline form" action="" method="POST" enctype="multipart/form-data">

        <div class="group-control">
          <label for="description">Tên bài viết</label>
          <input type="text" class="form-control" id="description" name="tieude" />
        </div>
        <div class="group-control">
          <label for="description">Hình ảnh</label>
          <input type="file" class="form-control" id="description" name="hinhanh" />
        </div>
        <div class="group-control">
          <label for="description">Nội dung</label>
          <textarea class="form-control" name="noidung"></textarea>
        </div>
        <div class="group-control">
          <label for="description"></label>
          <button type="submit" class="btn btn-primary">Thêm</button>
        </div>
       </form>
       </div>