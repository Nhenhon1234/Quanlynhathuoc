<?php
include '../../lib/database.php';
?>
<?php
 class SanPham{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachSanPham(){
        $query = "SELECT sanpham.SanPhamID, sanpham.TenSanPham,sanpham.ChiTiet,sanpham.AnhDaiDien,sanpham.TheLoaiID, sanpham.SoLuong, sanpham.DonGia,sanpham.NgayTao,sanpham.Code,
        sanpham.TrangThai, sanpham.NhaThuocID, sanpham.GiaNhap, sanpham.KieuBanID, sanpham.HanSuDung, sanpham.ConNo,
        nhathuoc.TenNhaThuoc FROM sanpham INNER JOIN nhathuoc on sanpham.NhaThuocID = nhathuoc.NhaThuocID
        WHERE sanpham.DaXoa != 1  ORDER BY sanpham.SanPhamID DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachSanPham_Search(){
        $query = "SELECT * FROM sanpham WHERE DaXoa != 1  ORDER BY SanPhamID DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function SanPham_GetSingle($id){
        $query = "SELECT * FROM sanpham WHERE DaXoa != 1 AND SanPhamID = '$id'  ORDER BY NgayTao DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }
    public function DanhSachNhaCungCap(){
        $query = "SELECT * FROM nhathuoc
        WHERE DaXoa != 1 AND TrangThai = 1 ORDER BY NgayTao DESC; ";        
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
    public function DanhSachSanPham_BanChay($id,$TuNgay,$DenNgay){
            $query = "SELECT * FROM thongkesanpham ORDER BY SoLuong DESC; ";        
            $result = $this->db->select($query);
        if($TuNgay != null && $DenNgay != null){
            $query = "SELECT * FROM thongkesanpham  WHERE NgayTao >= '$TuNgay' && NgayTao <= '$DenNgay' ORDER BY SoLuong DESC"; 
            $result = $this->db->select($query);
        }   
        if($id > 0){
            $query = "SELECT * FROM thongkesanpham WHERE SanPhamID = '$id' ORDER BY SoLuong DESC; ";        
            $result = $this->db->select($query);
        }
        return $result;
    }  
    public function DanhSachSanPham_SanPhamID($id){
            $query = "SELECT * FROM thongkesanpham WHERE SanPhamID = '$id' ORDER BY SoLuong DESC; ";        
            $result = $this->db->select($query);       
        return $result;
    }  
    public function DanhSachSanPhamHSD(){
        $query = "SELECT sanpham.SanPhamID, sanpham.TenSanPham,sanpham.ChiTiet,sanpham.AnhDaiDien,sanpham.TheLoaiID, sanpham.SoLuong, sanpham.DonGia,sanpham.NgayTao,sanpham.Code,
        sanpham.TrangThai, sanpham.NhaThuocID, sanpham.GiaNhap, sanpham.KieuBanID, sanpham.HanSuDung, sanpham.ConNo,
        nhathuoc.TenNhaThuoc FROM sanpham INNER JOIN nhathuoc on sanpham.NhaThuocID = nhathuoc.NhaThuocID
        WHERE sanpham.DaXoa != 1  ORDER BY sanpham.SanPhamID DESC; ";        
        $result = $this->db->select($query);
        return $result;
    }  
    public function DanhSachSanPhamBanChay($id){
        $query = "SELECT sanpham.SanPhamID, sanpham.TenSanPham,sanpham.ChiTiet,sanpham.AnhDaiDien,sanpham.TheLoaiID, sanpham.SoLuong, sanpham.DonGia,sanpham.NgayTao,sanpham.Code,
        sanpham.TrangThai, sanpham.NhaThuocID, sanpham.GiaNhap, sanpham.KieuBanID, sanpham.HanSuDung, sanpham.ConNo,sanpham.SoLuongBan,
        nhathuoc.TenNhaThuoc FROM sanpham INNER JOIN nhathuoc on sanpham.NhaThuocID = nhathuoc.NhaThuocID
        WHERE sanpham.DaXoa != 1  ORDER BY sanpham.SoLuongBan DESC; ";        
        $result = $this->db->select($query);
        if($id > 0){
            $query = "SELECT sanpham.SanPhamID, sanpham.TenSanPham,sanpham.ChiTiet,sanpham.AnhDaiDien,sanpham.TheLoaiID, sanpham.SoLuong, sanpham.DonGia,sanpham.NgayTao,sanpham.Code,
        sanpham.TrangThai, sanpham.NhaThuocID, sanpham.GiaNhap, sanpham.KieuBanID, sanpham.HanSuDung, sanpham.ConNo,sanpham.SoLuongBan,
        nhathuoc.TenNhaThuoc FROM sanpham INNER JOIN nhathuoc on sanpham.NhaThuocID = nhathuoc.NhaThuocID
        WHERE sanpham.DaXoa != 1 AND sanpham.SanPhamID = $id  ORDER BY sanpham.SoLuongBan DESC; ";        
        $result = $this->db->select($query);
        }
        return $result;
    }  
 }
?>