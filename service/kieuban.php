<?php
include '../../lib/database.php';
?>
<?php
 class KieuBan{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachLoaiThuoc(){
        $query = "SELECT * FROM kieuban WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function LoaiThuoc_GetSingle($id){
        $query = "SELECT * FROM kieuban WHERE DaXoa != 1 AND KieuBanId = '$id'  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function DanhSachKhachHang(){
        $query = "SELECT * FROM khachhang WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
 }
?>