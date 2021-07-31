
<?php
 $conn = mysqli_connect("localhost", "root", "", "nhathuoc_mac_v1");
 if ($_POST["SanPham"] == "SanPham") { 
    $date = date('Y-m-d H:i:s');
    $TenSanPham = $_POST['TenSanPham'];
    $HoatChat = $_POST['HoatChat'];
    $HamLuong = $_POST['HamLuong'];
    $GiaNhap = $_POST['GiaNhap'];
    $GiaBan = $_POST['GiaBan'];
    $SoLuong = $_POST['SoLuong'];
    $HanSuDung = $_POST['HanSuDung'];
    $TheLoaiID = $_POST['TheLoaiID'];
    $KieuBanID = $_POST['KieuBanID'];
    $NhaCungCapID = $_POST['NhaCungCapID'];
    $ChiTiet = $_POST['ChiTiet'];
    $SanPhamID =  $_POST['SanPhamID'];
    $ConNo =  $_POST['ConNo'];
    $DonGia = $_POST['GiaBan'];
    $NguoiDungID = $_POST['NguoiTao'];
    $TenNguoiNhap = $_POST['TenNguoiNhap'];
    $Code = "SPT".rand(0, 9999999);
    $TongTien = (int)$GiaNhap * (int)$SoLuong;
    if($SanPhamID <= 0){
      $query_nhapkho = "INSERT INTO log_nhapkho (TenSanPham, SoLuongNhap, ThanhTien, NgayNhap, NguoiNhapID,TenNguoiNhap,ConNo) 
      VALUES('$TenSanPham', '$SoLuong', '$TongTien', '$date','$NguoiDungID','$TenNguoiNhap','$ConNo')";
      mysqli_query($conn, $query_nhapkho);
    }
    if ($SanPhamID > 0) {
      if(isset($_FILES['file'])){
            if ( 0 < $_FILES['file']['error'] ) {
                  echo 'Error: ' . $_FILES['file']['error'] . '<br>';
            }
            else {
                  $AnhDaiDien = '../../uploads/' . $_FILES['file']['name'];
                  move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);
            }
       }else{
          $AnhDaiDien = $_POST['AnhDaiDien'];
       }
       $query = "UPDATE SanPham SET
       TenSanPham = '$TenSanPham',
       ChiTiet = '$ChiTiet',
       TheLoaiID = '$TheLoaiID',
       DonGia = '$DonGia',
       NhaThuocID = '$NhaCungCapID',
       GiaNhap = '$GiaNhap',
       KieuBanID = '$KieuBanID',
       HanSuDung = '$HanSuDung',
       ConNo = '$ConNo',
       HoatChat = '$HoatChat',
       AnhDaiDien = '$AnhDaiDien',
       HamLuong = '$HamLuong'
       WHERE SanPhamID = '$SanPhamID'";
        $result = mysqli_query($conn, $query);
        return print 1;
    } else {
       
      $sql = "SELECT COUNT(*) AS total_name FROM sanpham where TenSanPham ='$TenSanPham' && DaXoa != 1";
      $result_count = mysqli_query($conn, $sql);
      $row = mysqli_fetch_object($result_count) ;
      if($row->total_name > 0){
          print -1;
      }else{
        if(isset($_FILES['file'])){
          if ( 0 < $_FILES['file']['error'] ) {
                echo 'Error: ' . $_FILES['file']['error'] . '<br>';
          }
          else {
                $AnhDaiDien = '../../uploads/' . $_FILES['file']['name'];
                move_uploaded_file($_FILES['file']['tmp_name'], '../uploads/' . $_FILES['file']['name']);
          }
     }else{
        $AnhDaiDien = $_POST['AnhDaiDien'];
     }     
        $query = "INSERT INTO SanPham
        (
        Code,
        TenSanPham,
        NgayTao,
        ChiTiet,
        AnhDaiDien,
        TheLoaiID,
        SoLuong,
        DonGia,
        TrangThai,
        NhaThuocID,
        GiaNhap,
        KieuBanID,
        HanSuDung,
        ConNo,
        NguoiTao,
        TenNguoiNhap,
        HoatChat,
        HamLuong
        ) VALUES
       (
          '$Code',
         '$TenSanPham',
        '$date',
         '$ChiTiet',
          '$AnhDaiDien',
           '$TheLoaiID',
           '$SoLuong',
           '$DonGia',
           0,
           '$NhaCungCapID',
           '$GiaNhap',
           '$KieuBanID',
           '$HanSuDung',
           '$ConNo',
           '$NguoiDungID',
           '$TenNguoiNhap',
           '$HoatChat',
           '$HamLuong'
           )";
         $result = mysqli_query($conn, $query);
         print 1;
      }
    }
 }
?>