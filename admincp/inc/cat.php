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
            $q = $sp->Add_Category($ten,$mota);
            if($q){
                $mess = "Thêm thành công vào cơ sở dữ liệu";
            }else{
                $mess = "Lỗi !!!!";
            } 
        }else{
            $mess = "Vui lòng nhập đầy đủ các fields";
        }
        

    }
?>
<h3 class="text-center" >Loại sản phẩm</h3>
          <div class="row">
            <div class="col-md-7">
            <?php if(isset($mess)) echo $mess;?>
              <form class="form-inline form" action="" method="POST">
                <div class="group-control">
                  <label for="name">Tên thể loại</label>
                  <input type="text" class="form-control" id="name" name="tenloai" />
                </div>
                <div class="group-control">
                  <label for="description">Mô tả</label>
                  <input type="text" class="form-control" id="description" name="mota" />
                </div>

                <div class="group-control">
                  <input type="submit" class="btn btn-primary them" value="Thêm" />
                </div>
              </form>
            </div>
            <div class="col-md-11">
              <table class="table table-striped">
                <tr>
                  <th>Mã thể loại</th>
                  <th>Tên thể loại</th>
                  <th>Mô tả</th>
                  <th>Hành động</th>
                </tr>
                <?php 
                    $sp->query = "SELECT * FROM theloaisp";
                    $data = $sp->Show_Category();
                    foreach ($data as $v) {
                ?>
                <tr>
                  <td><?php echo $v['maloai'];?></td>
                  <td><?php echo $v['tenloai'];?></td>
                  <td><?php echo $v['mota'];?></td>
                  <td>
                    <a href="index.php?action=edit_cat&id=<?php echo $v['maloai'];?>"><button class="btn btn-primary btn-xs"><b class="glyphicon glyphicon-pencil"></b> Sửa</button> &nbsp;</a> 
                    <a href="index.php?action=delete_cat&id=<?php echo $v['maloai'];?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Bạn có muốn xóa không ?');"><b class="glyphicon glyphicon-pencil"></b> Xóa</button></a> 
                  </td>
                </tr>
                <?php         
                    }
                ?>
                
              </table>

            </div>
            </div>