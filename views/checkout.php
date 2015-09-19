<div class="main-page container">
      <div class="row"> 
        <div class="col-md-9">
          <div class="row">
            <ol class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li class="active">Giỏ hàng</li>
            </ol>
          </div>
          
            <?php 
                if(!empty($_SESSION['cart'])){
                    $done = false; 
                if (!isset($messa)) {
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                    $errros = array();
                    foreach ($_POST as $k=>$v) {
                        if (empty($_POST[$k])) {
                            $errros[] = $k;
                        }
                    }
                    if (empty($errros)) {
                        $firstname = $db->db->real_escape_string($_POST['firstname']);
                        $lastname = $db->db->real_escape_string($_POST['lastname']);
                        $address = $db->db->real_escape_string($_POST['address']);
                        $email = $db->db->real_escape_string($_POST['email']);
                        $phone = $db->db->real_escape_string($_POST['phone']);
                        $birthday = $db->db->real_escape_string($_POST['birthday']);
                        $sex = $db->db->real_escape_string($_POST['sex']);
                        $note = $db->db->real_escape_string($_POST['note']); 
                        if ($view->insert_customer($firstname,$lastname,$address,$email,$phone,$birthday,$sex)) {
                            $customer_id = $view->insertCustomerID;
                            $listID = $_SESSION['listID'];
                            if ($view->insert_order($customer_id,1,$note)) {
                                $orderId = $view->insertOrderID;
                                foreach ($_SESSION['cart'] as $k=>$v) {
                                    $view->insertOrderItem($orderId,$k,$_SESSION['cart'][$k]['qty'],$_SESSION['cart'][$k]['price']);
                                }
                            }
                            $done = true;
                            unset($_SESSION['cart']);
                        }else{
                            $mess = 'Gửi đơn hàng thất bại';
                        }
                    }else{
                        $mess = 'Vui lòng nhập đầy đủ vào các field';
                    
                    }
                }
            ?>
            <?php if (isset($mess)) {
                    echo $view->message($mess,0);
                  }
                if (!$done) {
            ?>
            
                  
                    <div class="col-md-6">
            <h4>Thông tin khách hàng</h4>
            <form role="form" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Họ</label>
                <input type="text" class="form-control" value="<?php echo isset($_SESSION['userInfo']) ? $_SESSION['customerInfo']['ho'] : ''?>" name="firstname"/>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Tên</label>
                <input type="text" value="<?php echo isset($_SESSION['userInfo']) ? $_SESSION['customerInfo']['ten'] : ''?>" class="form-control" name="lastname"  />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Địa chỉ</label>
                <input type="text" value="<?php echo isset($_SESSION['userInfo']) ? $_SESSION['customerInfo']['diachi'] : ''?>" class="form-control" name="address" />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="text" value="<?php echo isset($_SESSION['userInfo']) ? $_SESSION['customerInfo']['email'] : ''?>" class="form-control" name="email" />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Số điện thoại</label>
                <input type="text" value="<?php echo isset($_SESSION['userInfo']) ? $_SESSION['customerInfo']['sdt'] : ''?>" class="form-control" name="phone" />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Ngày sinh</label>
                <input type="date" value="<?php echo isset($_SESSION['userInfo']) ? $_SESSION['customerInfo']['ngaysinh'] : ''?>" class="form-control" name="birthday" />
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Giới tính</label>
                <select class="form-control" name="sex">
                    <option value="<?php echo (isset($_SESSION['userInfo']) && $_SESSION['customerInfo']['gioitinh'] == 1) ? 'selected="selected"' : ''?>" value="1" >Nam</option>
                    <option value="<?php echo (isset($_SESSION['userInfo']) && $_SESSION['customerInfo']['gioitinh'] == 2) ? 'selected="selected"' : ''?>" value="2">Nữ</option>
                </select>
              </div>
              <button type="submit" class="btn btn-default">Gửi đơn hàng</button>
            
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
                        $listID = $_SESSION['listID'];
                        $total = 0;
                        $data = $view->show_product("WHERE masp in ($listID)");
                        foreach ($data as $item) {
                    ?>
                    
                    <tr>
                        <td><?php echo $item['masp'];?></td>
                        <td><?php echo $item['tensp'];?></td>
                        <td><?php echo $_SESSION['cart'][$item['masp']]['qty'];?></td>
                        <td><?php echo number_format($_SESSION['cart'][$item['masp']]['qty'] * $item['gia']);?> vnđ</td>
                        
                    </tr>
                    <?php
                        $total += $_SESSION['cart'][$item['masp']]['qty'] * $item['gia'];                        
                        }
                    ?>
                </table>
                <label>Ghi chú</label>
                <textarea name="note" class="form-control"></textarea>
            </div>
            <?php
            
            }else{
                echo $view->message('Gửi order thành công , chúng tôi sẽ liên hệ với bạn sớm nhất có thể');
            }
            }else{
                echo $view->message('Gửi order thành công , chúng tôi sẽ liên hệ với bạn sớm nhất có thể');
            } 
            }else{
                echo $view->message('Không có sản phẩm nào trong giỏ hàng');
            }
            
            ?>
          </form>
         </div>