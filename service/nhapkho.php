<?php
include '../../lib/database.php';
?>
<?php
 class NhapKho{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachBaoCao($TuNgay, $DenNgay ,$NguoiDungID){
        $query = "SELECT  * FROM log_nhapkho LEFT JOIN nguoidung on log_nhapkho.NguoiNhapID = nguoidung.NguoiDungID ORDER BY log_NhapKhoID DESC; ";  
        if($TuNgay != null){
            $query = "SELECT * FROM log_nhapkho LEFT JOIN nguoidung on log_nhapkho.NguoiNhapID = nguoidung.NguoiDungID WHERE NgayNhap >= '$TuNgay' ORDER BY log_NhapKhoID DESC"; 
        }   
        if($DenNgay != null){
            $query = "SELECT * FROM log_nhapkho LEFT JOIN nguoidung on log_nhapkho.NguoiNhapID = nguoidung.NguoiDungID WHERE NgayNhap <= '$DenNgay' ORDER BY log_NhapKhoID DESC"; 
        }  
        if($NguoiDungID != null){
            $query = "SELECT * FROM log_nhapkho LEFT JOIN nguoidung on log_nhapkho.NguoiNhapID = nguoidung.NguoiDungID WHERE  NguoiNhaoID = '$NguoiDungID' ORDER BY log_NhapKhoID DESC"; 
        }   
        $result = $this->db->select($query);
        return $result;
    }  
    public function NguoiDung_GetSingle($id){
        $query = "SELECT * FROM NguoiDung WHERE DaXoa != 1 AND NguoiDungID = '$id'  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    
    public function DanhSachTheLoai(){
        $query = "SELECT * FROM theloai
        WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachKieuBan(){
        $query = "SELECT * FROM kieuban
        WHERE DaXoa != 1  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
 }
?>