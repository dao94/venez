<h3 class="text-center" >Danh sách thành viên</h3>
<table class="table">
<thead>
    <th>ID #</th>
    <th>Tên tài khoản</th>
    <th>Họ tên</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Email</th>
    <th>Ngày sinh</th>
    <th>Hành động</th>
</thead>
<tbody>
    <?php 
        $data = $sp->getMember();
        foreach ($data as $v) {
    ?>
    
    <tr>
        <td><?php echo $v['makh'];?></td>
        <td><?php echo $v['username'];?></td>
        <td><?php echo $v['ho']." ".$v['ten'];?></td>
        <td><?php echo $v['diachi'];?></td>
        <td><?php echo $v['sdt'];?></td>
        <td><?php echo $v['email'];?></td>
        <td><?php echo $v['ngaysinh'];?></td>
        
        <td> 
             <a href="index.php?action=delete_member&id=<?php echo $v['makh'];?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Bạn có muốn xóa không ?');"><b class="glyphicon glyphicon-pencil"></b> Xóa</button></a>
        </td>
        
    </tr>
    <?php    
        }
    ?>

</tbody>
</table>