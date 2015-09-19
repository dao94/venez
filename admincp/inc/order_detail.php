            <div class="col-md-6">
            <h4>Thông tin khách hàng</h4>
            <table class="table table-hover table-border">
            <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $sp->updateOrderStatus($_GET['id'],$_POST['trangthai']);
                }
                $id = $sp->db->real_escape_string($_GET['id']);
                $data = $sp->getOrderCustomer($id);
                $trangthai = $data[0]['order_status'];
                
            ?>
                    <tr>
                        <td><strong>Họ tên</strong></td>
                        <td><?php echo $data[0]['ho']." ".$data[0]['ten'];?></td>
                    </tr>
                    <tr>
                        <td><strong>Địa chỉ</strong></td>
                        <td><?php echo $data[0]['diachi'];?></td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td><?php echo $data[0]['email'];?></td>
                    </tr>
                    <tr>
                        <td><strong>Số điện thoại</strong></td>
                        <td><?php echo $data[0]['sdt'];?></td>
                    </tr>
                    
            </table>
            
            </div>
            <div class="col-md-6">
            <h4>Danh sách sản phẩm</h4>
                <table class="table table-hover table-border">
                    <tr>
                        <th>Mã SP</th>
                        <th>Tên SP</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php 
                        
                        $data = $sp->getOrderItem($id);
                        foreach ($data as $item) {
                    ?>
                    
                    <tr>
                        <td><?php echo $item['masp'];?></td>
                        <td><?php echo $item['tensp'];?></td>
                        <td><?php echo $item['soluong'];?></td>
                        <td><?php echo number_format($item['thanhtien']);?> vnđ</td>
                        
                    </tr>
                    <?php
                        
                        }
                    ?>
                    
                </table>
                <form method="POST">
                        <label>Trạng thái</label>
                        <select name="trangthai" class="form-control">
                            <option value="1" <?php if($trangthai == '1') echo 'selected';?> >Chưa xử lý</option>
                            <option value="2" <?php if($trangthai == '2') echo 'selected';?>>Đang xử lý</option>
                            <option value="3" <?php if($trangthai == '3') echo 'selected';?>>Đã giao hàng</option>
                        </select>
                        <br />
                        <button class="btn btn-primary">Cập nhật</button>
                    </form>

                
            </div>