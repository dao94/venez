<h3 class="text-center" >Danh sách sản phẩm</h3>
<table class="table">
<thead>
<tr>
    <th>ID #</th>
    <th>Hình ảnh</th>
    <th>Tên bài viết</th>
    <th>Nội dung</th>
    <th>Ngày viết</th>
    <th>Hành động</th>
</tr>
</thead>
<tbody>
<?php 
    $datas = $sp->getNews('ORDER BY matin DESC');
    foreach ($datas as $item) {
?>
    <tr>
        <td><?php echo $item['matin'];?></td>
        <td><img src="http://media6.tiin.vn/media01/4f7a58b257985/2013/12/19/580292a9-0012-42f0-a15a-32a8e3f7c1f5.jpg" width="50"/></td>
        <td><a href=""><?php echo $item['tieude'];?></a></td>
        <td><?php echo strip_tags(html_entity_decode($item['excerpt']));?></td>
        <td><script>document.write((moment("<?php echo $item['ngayviet'];?>", "YYYYMMDD").fromNow()));</script></td>
        <td>
        <a href="index.php?action=edit_news&id=<?php echo $item['matin'];?>" class="btn btn-primary">Sửa</a>
        <a onclick="return confirm('Bạn muốn xóa tin này ')" href="index.php?action=del_news&id=<?php echo $item['matin'];?>" class="btn btn-danger">Xóa</a>
        </td>
    </tr>
<?php
    }
?>
</tbody>
</table>