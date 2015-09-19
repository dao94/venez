<?php 
require_once('class.db.php');
class Login extends Config{
    public $uid;
    public $ulevel;
    public $isLogin = false;
    public function login($u,$p){
        $p = md5($this->db->real_escape_string($p));
        $this->result = $this->db->query("SELECT * FROM taikhoan WHERE username = '$u' AND password = '$p'");
        if ($this->db->affected_rows) {
            foreach ($this->result as $item) {
                $this->uid = $item['user_id'];
                $this->ulevel = $item['level'];
                $_SESSION['uid'] = $item['user_id'];
                $_SESSION['ulevel'] = $item['level'];
                $this->isLogin = true;
            }
            return true;
        }else{
            return false;
        }
    }
}