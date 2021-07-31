<?php
include '../../lib/database.php';
?>
<?php
 class fill_khachhang{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function KhachHang_GetSingle($id){
        $query = "SELECT * FROM khachhang WHERE DaXoa != 1 LIMIT 1 ";        
        $result = $this->db->select($query);
        return $result;
    }
 }
?>