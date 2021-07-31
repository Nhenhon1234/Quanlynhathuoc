<?php
include '../../lib/database.php';
?>
<?php
 class DonHang{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachDonHang($TuNgay, $DenNgay, $NguoiTaoDonID, $QuanTriVien){
        $query = "SELECT  * FROM order2  ORDER BY OrderID DESC";  
        if($TuNgay != null){
            $query = "SELECT * FROM order2  WHERE NgayTao >= '$TuNgay' AND NguoiTaoID = $NguoiTaoDonID ORDER BY OrderID DESC"; 
        }   
        if($DenNgay != null){
            $query = "SELECT * FROM order2  WHERE NgayTao <= '$DenNgay' AND NguoiTaoID = $NguoiTaoDonID ORDER BY OrderID DESC"; 
        }
        if($QuanTriVien == "ADMIN"){
            if($TuNgay != null){
                $query = "SELECT * FROM order2  WHERE NgayTao >= '$TuNgay'  ORDER BY OrderID DESC"; 
            }   
            if($DenNgay != null){
                $query = "SELECT * FROM order2  WHERE NgayTao <= '$DenNgay' ORDER BY OrderID DESC"; 
            }
        }else{
            $query = "SELECT * FROM order2  WHERE  NguoiTaoID = $NguoiTaoDonID ORDER BY OrderID DESC"; 
        }
        $result = $this->db->select($query);
        return $result;
    }  
    public function Order_GetSingle($id){
        $query = "SELECT  * FROM order2  WHERE OrderID = $id";  
        $result = $this->db->select($query);
        return $result;
    }
    public function DanhSachDonHang_log($TuNgay, $DenNgay){
        $query = "SELECT  * FROM log_donhang  ORDER BY log_donhangID DESC; ";  
        /* if($TuNgay != null && $DenNgay != null){
            $query = "SELECT * FROM log_donhang WHERE NgayTao >= '$TuNgay' && NgayTao <= '$DenNgay' ORDER BY log_donhangID DESC"; 
        } */
        if($TuNgay != null){
            $query="SELECT  * FROM log_donhang Where NgayTao >='$TuNgay'  ORDER BY log_donhangID DESC";
        }   
        if($DenNgay != null){
           $query = "SELECT  * FROM log_donhang Where NgayTao <='$DenNgay'  ORDER BY log_donhangID DESC"; 
        }               
        $result = $this->db->select($query);
        return $result;
    }  
    public function ChiTietDonHang($id){
        $query = "SELECT * FROM order_detail  WHERE OrderID = '$id' ORDER BY OrderID DESC"; 
        $result = $this->db->select($query);
        return $result;
    }  
 }
?>