<?php
   $conn = mysqli_connect("localhost", "root", "", "nhathuoc_mac_v1");
   if ($_POST["KhachHangr"] == "RemoveKhachHang") {
      $id = $_POST["id"];
      $query = "UPDATE khachhang SET DaXoa = 1 WHERE khachhangID = '$id'";
      return  mysqli_query($conn, $query);
   }
   if ($_POST["KhachHang"] == "ThemKhachHang") {
      $date = date('Y-m-d H:i:s');
      $TenKhachHang = $_POST['TenKhachHang'];
      $SoDienThoai = $_POST['SoDienThoai'];
      $DiaChi = $_POST['DiaChi'];
      $NguoiTaoID = $_POST['NguoiTaoID'];
      $query = "INSERT INTO khachhang (TenKhachHang, SoDienThoai, DiaChi,NguoiTaoID,NgayTao,DaXoa) VALUES
         ('$TenKhachHang', '$SoDienThoai', '$DiaChi', '$NguoiTaoID', '$date',0)";
       $result = mysqli_query($conn, $query);
   }
   if ($_POST["DonHang"] == "TrangThaiDonHang") {
      $DonHangID =  $_POST['DonHangID'];
      $TrangThai =  $_POST['TrangThai'];
      $query = "UPDATE Order2 SET TrangThai = '$TrangThai' WHERE OrderID = '$DonHangID'";
      $result = mysqli_query($conn, $query);
      $select_query = "SELECT * FROM Order2 WHERE OrderID = '$DonHangID'";
      $kq = mysqli_query($conn, $select_query);
      $query_logdonhang = "UPDATE log_donhang SET TrangThai = '$TrangThai' WHERE OrderID = '$DonHangID'";
      mysqli_query($conn, $query_logdonhang);     
      while ($a = $kq->fetch_assoc()) {        
         $TenSanPham = $a['MaDonHang'];
         $ThanhTien = $a['TongTien'];
         $NgayTao = $a['NgayTao'];
         $NguoiDungID = $a['NguoiTaoID'];
         $TenNguoiBan = $a['TenNguoiTao'];
         $TrangThai = $a['TrangThai'];
         $langs_result = mysqli_query($conn, "SELECT * FROM order_detail WHERE OrderID = '$DonHangID'");        
         $sl =0;
         while ($row = mysqli_fetch_array($langs_result)){
            $sl += $row['SoLuong'];
            $SoLuongBan = $row['SoLuong'];
            $SanPhamID = $row['SanPhamID'];   
            $CurrentSanPham = "SELECT * FROM SanPham WHERE SanPhamID = $SanPhamID";
            $resultCurrentSp = mysqli_query($conn, $CurrentSanPham); 
            while ($curSp = mysqli_fetch_array($resultCurrentSp)){
               $CurrentCount = $curSp['SoLuongBan'];
               $TotalCount = (int)$CurrentCount + (int)$SoLuongBan;
               $CurrentSL = $curSp['SoLuong'];
               $TotalSl = (int)$CurrentSL + (int)$SoLuongBan;
               if($TrangThai == 2){
                  $query_sp = "UPDATE SanPham SET SoLuongBan = $TotalCount WHERE SanPhamID = $SanPhamID";
                  mysqli_query($conn, $query_sp); 
               }   
               if($TrangThai == 3){
                  $query_sp = "UPDATE SanPham SET SoLuong = $TotalSl WHERE SanPhamID = $SanPhamID";
                  mysqli_query($conn, $query_sp); 
               }   
            }                
         }
         if($TrangThai == 2){
            $query_donhang = "INSERT INTO log_doanhthu(TenSanPham,ThanhTien,NgayTao,NguoiDungID,TenNguoiBan,TrangThai,SoLuong)
            VALUES('$TenSanPham','$ThanhTien','$NgayTao','$NguoiDungID','$TenNguoiBan',$TrangThai,$sl)";
            return mysqli_query($conn, $query_donhang);
          }
      }
   }
   if ($_POST["NhaCungCap"] == "NhaCungCap") {
      $date = date('Y-m-d H:i:s');
      $TenNhaThuoc = $_POST['TenNhaThuoc'];
      $SoDangKy = $_POST['SoDangKy'];
      $NgayDangKy = $_POST['NgayDangKy'];
      $DiaChi = $_POST['DiaChi'];
      $NhaThuocID =  $_POST['NhaThuocID'];
      if ($NhaThuocID > 0) {
         $query = "UPDATE nhathuoc SET TenNhaThuoc = '$TenNhaThuoc', SoDangKy = '$SoDangKy', NgayDangKy = '$NgayDangKy', DiaChi = '$DiaChi' WHERE NhaThuocID = '$NhaThuocID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "INSERT INTO nhathuoc (TenNhaThuoc, SoDangKy, NgayDangKy, DiaChi,NgayTao) VALUES
            ('$TenNhaThuoc', '$SoDangKy', '$NgayDangKy', '$DiaChi', '$date')";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["NhaCungCap"] == "Remove") {
      $NhaThuocID =  $_POST['id'];
      $query = "UPDATE nhathuoc SET DaXoa = 1 WHERE NhaThuocID = '$NhaThuocID'";
      return $result = mysqli_query($conn, $query);
   }
   if ($_POST["NhaCungCap"] == "Change") {
      $NhaThuocID =  $_POST['id'];
      $TrangThai =  $_POST['TrangThai'];
      if ($TrangThai == 1) {
         $query = "UPDATE nhathuoc SET TrangThai = 0 WHERE NhaThuocID = '$NhaThuocID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "UPDATE nhathuoc SET TrangThai = 1 WHERE NhaThuocID = '$NhaThuocID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["TheLoai"] == "TheLoai") {
      $date = date('Y-m-d H:i:s');
      $TenTheLoai = $_POST['TenTheLoai'];
      $TheLoaiID = $_POST['TheLoaiID'];       
      if ($TheLoaiID > 0) {
         $query = "UPDATE theloai SET TenTheLoai = '$TenTheLoai' WHERE TheLoaiID = '$TheLoaiID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "INSERT INTO theloai (TenTheLoai,NgayTao) VALUES
            ('$TenTheLoai', '$date')";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["TheLoai"] == "RemoveTheLoai") {
      $TheLoaiID = $_POST['id'];       
      if ($TheLoaiID > 0) {
         $query = "UPDATE theloai SET DaXoa = 1 WHERE TheLoaiID = '$TheLoaiID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["KieuBan"] == "KieuBan") {
      $date = date('Y-m-d H:i:s');
      $TenKieuBan = $_POST['TenKieuBan'];
      $KieuBanID = $_POST['KieuBanID'];       
      if ($KieuBanID > 0) {
         $query = "UPDATE kieuban SET TenKieuBan = '$TenKieuBan' WHERE KieuBanID = '$KieuBanID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "INSERT INTO kieuban (TenKieuBan,NgayTao) VALUES
            ('$TenKieuBan', '$date')";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["KieuBan"] == "RemoveKieuBan") {
      $KieuBanID = $_POST['id'];       
      if ($KieuBanID > 0) {
         $query = "UPDATE kieuban SET DaXoa = 1 WHERE KieuBanId = '$KieuBanID'";
         return $result = mysqli_query($conn, $query);
      }
   }
  
   if ($_POST["SoLuong_"] == "SoLuong_") {
      $SoLuong = (int)$_POST['SoLuong'];
      $SanPhamID =  $_POST['SanPhamID'];
      $date = date('Y-m-d H:i:s');
      $que = "SELECT *  FROM SanPham WHERE SanPhamID = '$SanPhamID'";
      $res =  mysqli_query($conn, $que);
      while ($a = $res->fetch_assoc()) {
         $TongTien = $SoLuong * (int)$a['GiaNhap'];
         $TenSanPham = $a['TenSanPham'];
         $SoLuongSP = $a['SoLuong'];
         $TongSoLuong = (int)$SoLuongSP + (int)$SoLuong;
         $NguoiNhapID = $a['NguoiTao']; 
         $TenNguoiNhap = $a['TenNguoiNhap'];      
         $query_nhapkho = "INSERT INTO log_nhapkho (TenSanPham, SoLuongNhap, ThanhTien, NgayNhap, NguoiNhapID, TenNguoiNhap) 
         VALUES('$TenSanPham', '$SoLuong', '$TongTien', '$date','$NguoiNhapID','$TenNguoiNhap')";
         mysqli_query($conn, $query_nhapkho);
         $query = "UPDATE SanPham SET SoLuong = '$TongSoLuong' WHERE SanPhamID = '$SanPhamID'";
         mysqli_query($conn, $query);
      }
      
   }
   if ($_POST["SanPham"] == "ThayDoiTrangThai") {     
      $SanPhamID =  $_POST['SanPhamID'];   
      $TrangThai =  $_POST['TrangThai'];
      $query = "UPDATE SanPham SET TrangThai = '$TrangThai' WHERE SanPhamID = '$SanPhamID'";
      $result = mysqli_query($conn, $query);
      return $result;
   }
   if ($_POST["SanPham"] == "Remove") {     
      $SanPhamID =  $_POST['id'];   
      $query = "UPDATE SanPham SET DaXoa = 1 WHERE SanPhamID = '$SanPhamID'";
      $result = mysqli_query($conn, $query);
      return $result;
   }
   if ($_POST["NguoiDung"] == "NguoiDung") {
      $date = date('Y-m-d H:i:s');
      $NguoiDungID = $_POST['NguoiDungID'];
      $HoVaTen = $_POST['HoVaTen'];
      $TenDangNhap = $_POST['TenDangNhap'];
      $MatKhau = md5($_POST['MatKhau']);
      $QuyenTruyCap = $_POST['QuyenTruyCap'];
      $NgaySinh = $_POST['NgaySinh'];
      $Email = $_POST['Email'];
      $DiaChi = $_POST['DiaChi'];
      if ($NguoiDungID > 0) {
         $query = "UPDATE NguoiDung SET
          HoVaTen = '$HoVaTen',
          NgaySinh = '$NgaySinh',
          Email = '$Email',
          DiaChi = '$DiaChi'
         WHERE NguoiDungID = '$NguoiDungID'";
         return $result = mysqli_query($conn, $query);
      } else {  
         $query = "INSERT INTO NguoiDung
          (
          TenDangNhap,
          MatKhau,
          HoVaTen,
          DiaChi,
          Email,
          NgaySinh,
          NgayTao,
          TrangThai,
          QuyenTruyCap
          ) VALUES
         ('$TenDangNhap',
          '$MatKhau',
           '$HoVaTen',
            '$DiaChi',
             '$Email',
             '$NgaySinh',
             '$date',
             0,
             '$QuyenTruyCap'
             )";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["NguoiDung"] == "PhanQuyen") {
      $NguoiDungID = $_POST['NguoiDungID'];
      $QuyenTruyCap = $_POST['QuyenTruyCap'];     
      $query = "UPDATE NguoiDung SET QuyenTruyCap = '$QuyenTruyCap' WHERE NguoiDungID = '$NguoiDungID'";
      return $result = mysqli_query($conn, $query);
   }
   if ($_POST["NguoiDung"] == "Change") {
      $NguoiDungID =  $_POST['id'];
      $TrangThai =  $_POST['TrangThai'];
      if ($TrangThai == 1) {
         $query = "UPDATE nguoidung SET TrangThai = 0 WHERE NguoiDungID = '$NguoiDungID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "UPDATE nguoidung SET TrangThai = 1 WHERE NguoiDungID = '$NguoiDungID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   if ($_POST["TinTuc"] == "TinTuc") {
      $TinTucID = $_POST['TinTucID'];
      $TenTinTuc = $_POST['TenTinTuc'];  
      $NoiDung = $_POST['NoiDung'];  
      $date = date('Y-m-d H:i:s');     
      if($TinTucID > 0){
         $query = "UPDATE TinTuc SET TenTinTuc = '$TenTinTuc', NoiDung = '$NoiDung' WHERE TinTucID = '$TinTucID'";
         return $result = mysqli_query($conn, $query);
      } else{
         $query = "INSERT INTO TinTuc (TenTinTuc, NoiDung, NgayTao, HienThi) VALUES ('$TenTinTuc', '$NoiDung', '$date', 0)";
         return $result = mysqli_query($conn, $query);

      }
   }
   
   if ($_POST["CanhBao"] == "RemoveCanhBao") {
      $TinTucID = $_POST['id'];
      $query = "UPDATE TinTuc SET DaXoa = 1 WHERE TinTucID = '$TinTucID'";
      return $result = mysqli_query($conn, $query);
   }
   if ($_POST["TinTuc"] == "Change") {
      $TinTucID =  $_POST['id'];
      $TrangThai =  $_POST['TrangThai'];
      if ($TrangThai == 1) {
         $query = "UPDATE tintuc SET HienThi = 0 WHERE TinTucID = '$TinTucID'";
         return $result = mysqli_query($conn, $query);
      } else {
         $query = "UPDATE tintuc SET HienThi = 1 WHERE TinTucID = '$TinTucID'";
         return $result = mysqli_query($conn, $query);
      }
   }
   
   if ($_POST["thanhtoan"] == "ThanhToan") {
      $MaDonHang = "DH" . rand();
      $NguoiTaoDon = $_POST['NguoiTaoDon'];
      $KhachHangID = $_POST['KhachHangID'];
      $NguoiTaoID = $_POST['NguoiTaoID'];
      $HoTen = $_POST['HoTen'];
      $SoDienThoai = $_POST['SoDienThoai'];
      $DiaChi = $_POST['DiaChi'];
      $TongTien = $_POST['TongTien'];    
      $MoTa = $_POST['MoTa'];  
      $date = date('Y-m-d H:i:s');
      $query = "INSERT INTO order2 (MaDonHang,NguoiTaoID, HoTen, DiaChi, TongTien, SoDienThoai, TrangThai, TenNguoiTao, NgayTao,KhachHangID)
               VALUES('$MaDonHang','$NguoiTaoID', '$HoTen', '$DiaChi', '$TongTien', '$SoDienThoai',1, '$NguoiTaoDon','$date','$KhachHangID')";
      $result = mysqli_query($conn, $query);
      
      $que = "SELECT *  FROM order2 WHERE MaDonHang = '$MaDonHang' ORDER BY OrderID LIMIT 1";
      $res =  mysqli_query($conn, $que);
      $soluong_sanpham = 0;
      $thanhtien_sanpham = 0;
      while ($a = $res->fetch_assoc()) {
         $OrderID = $a['OrderID'];
         $arr = json_decode(stripslashes($_POST['arr']));         
         foreach($arr as $d){
            $SanPhamID = $d->SanPhamID;
            $TenSanPham = $d->TenSanPham;
            $DonGia = $d->DonGia;
            $TenDonHang = $d->TenDonHang;
            $SoLuong = $d->SoLuong;
            $ThanhTien = (int)$DonGia * (int)$SoLuong;
            $soluong_sanpham += $SoLuong;
            $thanhtien_sanpham += $ThanhTien;
            $query2 = "INSERT INTO order_detail(SanPhamID, SoLuong, Gia,ThanhTien,OrderID,TenSanPham, NgayTao)
            VALUES('$SanPhamID','$SoLuong','$DonGia','$ThanhTien','$OrderID','$TenSanPham','$date')";
            $order_detail = mysqli_query($conn, $query2);

            // $query_donhang = "INSERT INTO log_donhang(TenSanPham, SoLuong,ThanhTien,NgayTao,NguoiDungID,TenNguoiBan, TrangThai, OrderID)
            // VALUES('$TenSanPham','$SoLuong','$ThanhTien','$date','$NguoiTaoID','$NguoiTaoDon',1,'$OrderID')";
            //  mysqli_query($conn, $query_donhang);

            $SanPham = "SELECT *  FROM sanpham WHERE SanPhamID = '$SanPhamID' ORDER BY SanPhamID LIMIT 1";
            $resultSp =  mysqli_query($conn, $SanPham);
            while ($sp = $resultSp->fetch_assoc()) {
               $SoLuongKho = $sp['SoLuong'];
               $UpdateSL = (int)$SoLuongKho  - (int)$SoLuong;
               $query_sp = "UPDATE SanPham SET SoLuong = '$UpdateSL' WHERE SanPhamID = '$SanPhamID'";
               mysqli_query($conn, $query_sp);
            }          
            }
            $query_donhang = "INSERT INTO log_donhang(TenSanPham, SoLuong,ThanhTien,NgayTao,NguoiDungID,TenNguoiBan, TrangThai, OrderID)
            VALUES('$MaDonHang','$soluong_sanpham','$thanhtien_sanpham','$date','$NguoiTaoID','$NguoiTaoDon',1,'$OrderID')";
            mysqli_query($conn, $query_donhang);
      }
      
      
   }
