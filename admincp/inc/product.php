<h3 class="text-center" >Danh sách sản phẩm</h3>
<table class="table">
<thead>
    <th>Mã SP</th>
    <th>Loại Sp</th>
    <th>Hình ảnh</th>
    <th>Tên SP</th>
    <th>Size</th>
    <th>Giá</th>
    <th>Trạng thái</th>
    <th>Hành động</th>
</thead>
<tbody>
    <?php 
        $data = $sp->show_product();
        foreach ($data as $v) {
    ?>
    
    <tr>
        <td><?php echo $v['masp'];?></td>
        <td><?php echo $v['tenloai'];?></td>
        <td><img src="../uploads/product/<?php echo $v['hinhanh'];?>" class="img-responsive" width="50px"/></td>
        <td><?php echo $v['tensp'];?></td>
        <td><?php echo $v['size'];?></td>
        <td><?php echo number_format($v['gia']).' vnđ';?></td>
        <td><?php echo $sp->product_status($v['trangthai']);?></td>
        
        <td>
             <a href="index.php?action=edit_product&id=<?php echo $v['masp'];?>"><button class="btn btn-primary btn-xs"><b class="glyphicon glyphicon-pencil"></b> Sửa</button> &nbsp;</a> 
             <a href="index.php?action=delete_product&id=<?php echo $v['masp'];?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Bạn có muốn xóa không ?');"><b class="glyphicon glyphicon-pencil"></b> Xóa</button></a>
        </td>
        
    </tr>
    <?php    
        }
    ?>

</tbody>
</table>