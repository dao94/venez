<div class="main-page container">
      <div class="row"> 
        <div class="col-md-9">
          <div class="row">
            <ol class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li class="active">Giỏ hàng</li>
            </ol>
          </div>
          
			<h4>Giỏ hàng</h4>
			<?php 
                if(!empty($_SESSION['cart'])){
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        foreach ($_POST['qty'] as $k=>$v) {
                            $_SESSION['cart'][$k]['qty'] = floor($db->db->real_escape_string($v));
                        }
                    }
            ?>
            
            <form action="" method="POST">
            <table class="table table-border table-hover">
				<tr>
					<th>Mã SP</th>
					<th>Tên SP</th>
					<th>Hình ảnh</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
					<th>Xóa</th>
				</tr>
                
                <?php 
                    $arrayId = array();
                    foreach ($_SESSION['cart'] as $k=>$v) {
                        $arrayId[] = $k;
                    }
                    $listId = implode(',',$arrayId);
                    $_SESSION['listID'] = $listId;
                    $tong = 0;
                    $data = $view->show_product("WHERE masp in($listId)");
                    foreach ($data as $v) {
                    
                ?>
				<tr>
					<td><?php echo $v['masp'];?></td>
					<td><?php echo $v['tensp'];?></td>
					<td><img src="uploads/product/<?php echo $v['hinhanh'];?>" width="60" /></td>
					<td><input type="number" name="qty[<?php echo $v['masp'];?>]" value="<?php echo $_SESSION['cart'][$v['masp']]['qty'];?>" /></td>
					<td><?php echo number_format($v['gia']);?> vnd</td>
					<td><?php echo number_format($v['gia'] * $_SESSION['cart'][$v['masp']]['qty']);?> vnd</td>
					<td><a href="index.php?page=del_cart&id=<?php echo $v['masp'];?>"><span class="glyphicon glyphicon-remove"></span></a></td>
				</tr>
                <?php
                    $tong += $v['gia'] * $_SESSION['cart'][$v['masp']]['qty'];
                    $_SESSION['cart'][$v['masp']]['price'] = $v['gia'] * $_SESSION['cart'][$v['masp']]['qty']; 
                    }
                ?>
			</table>
          <p class="text-right">Phí ship : <strong>Miễn phí</strong></p>
          
          <p colspan="7" class="text-right">Thành tiền : <strong><?php echo number_format($tong);?></strong> vnđ</p>
          <p class="pull-right">
              <a href="index.php"><button class="btn btn-primary" type="button">Mua hàng tiếp</button></a>
              <button class="btn btn-info" type="submit">Cập nhập giỏ hàng</button>
              <a href="index.php?page=thanhtoan"><button class="btn btn-danger" type="button">Thanh toán</button></a>
          </p>
          </form>
        <?php                    
            }else{
                echo 'Khong co san pham nao trong gio hang';
            }
        ?>
        </div><!-- main-content-->