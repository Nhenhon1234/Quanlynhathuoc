<?php
include '../../lib/database.php';
?>
<?php
 class TrangChu{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function SanPhamTrongKho(){
        
        $query = "SELECT COUNT(*) total_Product FROM SanPham WHERE DaXoa != 1 AND TrangThai = 1";   
        $result = $this->db->select($query);
        $total_Product = mysqli_fetch_assoc($result);
        return $total_Product['total_Product'];
    }  
    public function DonHangDaBan(){   
        $query = "SELECT COUNT(*) total_Order FROM order2 WHERE  TrangThai = 2";   
        $result = $this->db->select($query);
        $total_Order = mysqli_fetch_assoc($result);
        return $total_Order['total_Order'];
    }  
    public function SoLuongSanPhamBanDuoc(){   
        $query = "SELECT * FROM log_donhang WHERE  TrangThai = 2";   
        $result = $this->db->select($query);
        return $result;
    }  
    public function DoanhThu(){   
        $query = "SELECT * FROM log_doanhthu WHERE  TrangThai = 2";   
        $result = $this->db->select($query);
        return $result;
    }  
 }
?>