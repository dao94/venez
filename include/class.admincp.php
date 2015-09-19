<?php 
require_once('class.db.php');

class Categories extends Config{
    public $insertCustomerID;
    public $insertOrderID;
    public $uid;
    public $ulevel;
    public $isLogin = false;
    
    function Show_Category(){
        $this->query = "SELECT * FROM theloaisp order by maloai DESC";
        $data = $this->fetchData();
        return $data;
    }

    function Show_Category_By_Id($cid){
    $this->query = "SELECT * FROM theloaisp WHERE maloai = '$cid'";
    $data = $this->fetchData();
    return $data;
    }

    public function Add_Category($ten,$mota){
        $q = $this->db->query("INSERT INTO theloaisp (tenloai,mota) VALUES ('$ten','$mota')");
        if($this->db->affected_rows){
            return true;
        }else{
            return false;
        }
    }

    public function Del_Category($cid){
        $this->db->query("DELETE FROM theloaisp WHERE maloai = '$cid'");
        if($this->db->affected_rows){
           return true; 
        }else{
           return false;
        }
    }

    public function Update_Category($cid,$ten,$mota){
        $cid = $this->db->real_escape_string($cid);
        $this->db->query("UPDATE theloaisp SET tenloai = '$ten' , mota = '$mota' WHERE maloai ='$cid'") OR die('Loi');
        if ($this->db->affected_rows) {
            return true;
        }else{
            return false;
        }          
    }

    public function show_product($more_query = ''){
        $this->query = "SELECT *,sanpham.mota as motasp FROM sanpham INNER JOIN theloaisp USING(maloai) $more_query";
        return $this->fetchData();
        
    }

    public function product_status($status){
        if($status == 1){
            return '<span class="label label-success">Còn hàng</span>';
        }else if($status == 2){
            return '<span class="label label-default">Hết hàng</span>';
        }else{
            return '<span class="label label-primary">Đang nhập</span>';
        }
    }

    public function message($mess,$type = 1){
        if($type == 1){
            return '<div class="alert alert-success fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    '.$mess.'</div>';
        }else if($type == 0){
            return '<div class="alert alert-danger fade in">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    '.$mess.'</div>';
        }
    }

    public function add_product($maloai,$tensp,$mota,$gia,$size,$hinhanh,$trangthai){
        $this->db->query("INSERT INTO sanpham(maloai,tensp,mota,gia,size,hinhanh,trangthai) VALUES($maloai,'$tensp','$mota','$gia','$size','$hinhanh','$trangthai')");
        if ($this->db->affected_rows) {
            return true;
        }else{
            return false;
        }
    }
    
    public function delete_product($cid){
        $this->db->query("DELETE FROM sanpham where masp='$cid'");
        if($this->db->affected_rows){
            return true;
        }
        else{
            return false;
        }
    }

    public function update_product($cid,$tensp,$loaisp,$gia,$size,$trangthai,$mota,$hinhanh){
        $cid=$this->db->real_escape_string($cid);
        $this->db->query("UPDATE sanpham SET tensp='$tensp',maloai='$loaisp',gia='$gia',size='$size',hinhanh = '$hinhanh',trangthai='$trangthai',mota='$mota' where masp=$cid")or die("loi");
        if( $this->db->affected_rows){
            return true;
        }
        else{
            return false;
        }
    }

    public function product_statusIndex($status){
        if($status == 1){
            return 'Còn hàng';
        }else if($status == 2){
            return 'Hết hàng';
        }else{
            return 'Đang nhập';
        }
    }

    public function insert_customer($firstname,$lastname,$address,$email,$phone,$birthday,$sex){
        $this->db->query("INSERT INTO khachhang(ho,ten,diachi,email,sdt,ngaysinh,gioitinh) values('$firstname','$lastname','$address','$email','$phone','$birthday','$sex')");
        if ($this->db->affected_rows) {
            $this->insertCustomerID = $this->db->insert_id;
            return true;
        }else{
            return false;
        }
    }

    public function insert_order($makh,$trangthai,$note){
        $this->db->query("INSERT INTO donhang(makh,ngayban,trangthai,note) VALUES ('$makh',NOW(),'$trangthai','$note')");
        if ($this->db->affected_rows) {
            $this->insertOrderID = $this->db->insert_id;
            return true;
        }else{
            return false;
        }
    }

    public function insertOrderItem($madonhang,$masp,$soluong,$thanhtien){
        $this->db->query("INSERT INTO chitietdonhang(madonhang,masp,soluong,thanhtien) VALUES ('$madonhang','$masp','$soluong','$thanhtien')");
        if ($this->db->affected_rows) {
            return true;
        }else{
            return false;
        }
    }

    public function login($u,$p){
        $p = md5($this->db->real_escape_string($p));
        $this->result = $this->db->query("SELECT * FROM taikhoan WHERE username = '$u' AND password = '$p'");
        if ($this->db->affected_rows) {
            foreach ($this->result as $item) {
                $infoCustormer            = $this->getInfoCustormer($item['makh']);
                $this->uid                = $item['user_id'];
                $this->ulevel             = $item['level'];
                $_SESSION['uid']          = $item['user_id'];
                $_SESSION['ulevel']       = $item['level'];
                $_SESSION['userInfo']     = $item;
                $_SESSION['customerInfo'] = $infoCustormer[0];
                $this->isLogin            = true;
            }
            return true;
        }else{
            return false;
        }
    }

    public function getInfoCustormer($makh) {
        $this->query = "SELECT * FROM khachhang WHERE makh = $makh";
        return $this->fetchData();
    }

    public function insert_taikhoan($username,$password,$makh){
        $this->db->query("INSERT INTO taikhoan(makh,username,password,level,ngaydangky) VALUES('$makh','$username','$password',1,NOW())") or die($this->db->error);
        if ($this->db->affected_rows) {
            return true;
        }else{
            return false;
        }
    }

    public function register($firstname,$lastname,$address,$email,$phone,$birthday,$sex,$username,$password){
        if ($this->insert_customer($firstname,$lastname,$address,$email,$phone,$birthday,$sex)) {
            if($this->insert_taikhoan($username,$password,$this->insertCustomerID)){
                return true;
            }else{
                return false;
            }
            
        }else{
            return false;
        }
    }

    /// ORDERS ADMINCP
    public function getOrders(){
        $this->query = "SELECT *,sum(thanhtien) as tongtien FROM donhang,chitietdonhang WHERE donhang.madonhang = chitietdonhang.madonhang GROUP BY chitietdonhang.madonhang";
        return $this->fetchData();
    }

    public function getOrderItem($id){
        $this->query = "SELECT * FROM sanpham,chitietdonhang WHERE sanpham.masp = chitietdonhang.masp  AND madonhang = $id";
        return $this->fetchData();
    }

    public function getOrderCustomer($id){
        $this->query = "SELECT *,donhang.trangthai as order_status FROM khachhang,donhang WHERE donhang.makh = khachhang.makh AND donhang.madonhang = $id";
        return $this->fetchData();
    }

    public function updateOrderStatus($id,$tt){
        $this->db->query("UPDATE donhang SET trangthai = '$tt' WHERE donhang.madonhang = $id");
    }

    public function voidOrderItem($id){
        $this->db->query("DELETE FROM donhang WHERE madonhang = $id");
        $this->db->query("DELETE FROM chitietdonhang WHERE madonhang = $id");
    }

    public function getMember($more = ''){
        $this->query = "SELECT * FROM khachhang INNER JOIN taikhoan USING(makh) $more";
        return $this->fetchData();
    }

    public function voidMember($id){
        $this->db->query("DELETE FROM khachhang WHERE makh = $id");
        $this->db->query("DELETE FROM taikhoan WHERE makh = $id");
    }

    public function getNews($more = ''){
        $this->query = "SELECT *,LEFT(noidung,300) as excerpt FROM tintuc $more";
        return $this->fetchData(); 
    }
    public function countNews(){
        $this->query = 'SELECT COUNT(matin) as total FROM  tintuc';
        return $this->fetchData(); 
    }

    public function insertNews($title,$content,$img){
        $this->db->query("INSERT INTO tintuc(tieude,noidung,hinhanh,ngayviet) VALUES('$title','$img','$content',NOW())");
        if ($this->db->affected_rows) {
            return true;
        }else{
            return false;
        }
    }
    
}// END CLASS CATEGORIES


?>