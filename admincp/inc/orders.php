<table class="table table-hover table-border">
  <thead>
    <tr>
      <th>ID #</th>
      
      <th>Tình trạng</th>
      <th>Ghi chú</th>
      <th>Tổng tiền</th>
      <th>Ngày đặt hàng</th>
      <th>Tùy chỉnh</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    foreach ($sp->getOrders() as $item) {
  ?>
 
    <tr>
        <td><?php echo $item['madonhang'];?></td>
        <td><?php
        if ($item['trangthai'] == 1) {
                        echo '<span class="label label-default">Chưa xử lý</span>';
                    }else if ($item['trangthai'] == 2) {
                        echo '<span class="label label-info">Đang giao hàng</span>';      
                    }else{
                        echo '<span class="label label-success">Đã giao hàng</span>';
                    }
         ?></td>
        <td><?php echo $item['note'];?></td>
        <td><?php echo number_format($item['tongtien']);?> vnđ</td>
        <td><?php echo $item['ngayban'];?></td>
        <td>
        <a href="index.php?action=order_detail&id=<?php echo $item['madonhang'];?>" class="btn btn-primary">Chi tiết</a>
	    <a onclick="return confirm('Bạn muốn xóa đơn hàng này ?')" href="index.php?action=delete_order&id=<?php echo $item['madonhang'];?>" class="btn btn-danger">Xóa</a>
        </td>
        
    </tr>
     <?php
    }
  ?>
  </tbody>
</table>
          