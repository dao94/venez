<?php 
Class Config extends mysqli{
    public $db;
    public $query;
    public $result;
    public function __construct(){
       $this->db = new mysqli('localhost','root','','project_nhom16') or die($this->db->errno); 
       // $this->db = new mysqli('daotc.com.mysql','daotc_com','T6C3kFGu','daotc_com') or die($this->db->errno); 
       $this->db->query("SET NAMES 'utf8'");
    }

    public function __destruct(){
        $this->db->close();
    }
    
    public function fetchData(){
        $data = array();
        $this->result = $this->db->query($this->query);
        while ($dl = $this->result->fetch_assoc()) {
            $data[] = $dl;
        } 

    return $data;
    }
} 
?>