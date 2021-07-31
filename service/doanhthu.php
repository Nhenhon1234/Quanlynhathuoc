<?php
include '../../lib/database.php';
?>
<?php
 class DoanhThu{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function DanhSachDoanhThu($TuNgay, $DenNgay){
        $query = "SELECT  * FROM log_doanhthu  ORDER BY log_DoanhThuID DESC; ";  
      /*   if($TuNgay != null && $DenNgay != null){
            $query = "SELECT * FROM log_doanhthu  WHERE NgayTao >= '$TuNgay' && NgayTao <= '$DenNgay'  ORDER BY log_DoanhThuID DESC"; 
        } */
        if($TuNgay != null){
             $query="SELECT  * FROM log_doanhthu Where NgayTao >='$TuNgay'  ORDER BY log_DoanhThuID DESC";
        }   
        if($DenNgay != null){
            $query = "SELECT  * FROM log_doanhthu Where NgayTao <='$DenNgay'  ORDER BY log_DoanhThuID DESC"; 
        }          
        $result = $this->db->select($query);
        return $result;
    }  
 }
?>