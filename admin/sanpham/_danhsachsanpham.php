<?php
include '../../service/sanpham.php';
?>
<?php
$nt = new SanPham();
?>
<table  class="table table-bordered" id="tbl_nhacungcap" style="width: 100%">
    <thead>
        <tr class="bg-success">
            <th style="width: 5%;">STT</th>
            <th style="width: 5%;">Code</th>
            <th style="width: 10%;">Tên sản phẩm</th>
            <th style="width: 10%;">Nhà cung cấp</th>
            <th style="width: 5%;">Số lượng</th>
            <th style="width: 10%;">Hạn sử dụng</th>
            <th style="width: 10%;">Trạng thái</th>
            <th style="width: 10%;">Ảnh</th>
            <th style="width: 10%;">Giá nhập</th>
            <th style="width: 10%;">Giá bán</th>
            <th style="width: 10%;">Còn nợ</th>
            <th style="width: 5%;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sanpham = $nt->DanhSachSanPham();
        if ($sanpham) {
            $i = 0;
            while ($result = $sanpham->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['Code'] ?></td>
                    <td><?php echo $result['TenSanPham'] ?></td>
                    <td><?php echo $result['TenNhaThuoc'] ?></td>
                    <td><?php echo $result['SoLuong'] ?></td>
                    <td>
                        <?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['HanSuDung']);
                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                        echo $formattedweddingdate ?>
                    </td>
                    <td style="cursor: pointer;">
                        <?php 
                            if($result['TrangThai'] == 1){
                        ?>
                        <span onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>, <?php echo $result['TrangThai']?>)"><i class="fas fa-lock-open"></i> Đang sử dụng</span>
                        <?php }else if($result['TrangThai'] == 0){?>
                            <span onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>, <?php echo $result['TrangThai']?>)"><i class="fas fa-lock"></i> Chờ duyệt</span>
                        <?php }else{?>
                            <span onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>, <?php echo $result['TrangThai']?>)"><i class="fas fa-do-not-enter"></i> Ngừng kinh doanh</span>
                        <?php }?>
                    </td>
                    <td><img src="<?php echo $result['AnhDaiDien'] ?>" style="width: : 100px; height: 100px;" alt=""></td>
                    <td><?php echo number_format($result['GiaNhap']) ?></td>
                    <td><?php echo number_format($result['DonGia']) ?></td>
                    <td><?php echo number_format($result['ConNo']) ?></td>
                    <td>   <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="ThemMoiSanPham(<?php echo $result['SanPhamID'] ?>)"><i class="fas fa-edit"></i> Sửa</a>
                                <a class="dropdown-item" href="#" onclick="XoaSanPham(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-trash-alt"></i> Xóa</a>
                                <a class="dropdown-item" href="#" onclick="NhapKho(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-sign-in-alt"></i> Nhập kho</a>
                                <a class="dropdown-item" href="#" onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>)" ><i class="fas fa-exchange-alt"></i> Thay đổi trạng thái</a>

                            </div>
                        </div>   
                        </td>  
                </tr>
        <?php }
        } ?>
    </tbody>
</table>
<script>
    $("#tbl_nhacungcap").dataTable({
        "ordering": false,
        "language": {
            "lengthMenu": "Hiển thị _MENU_ bản ghi",
            "emptyTable": "Chưa có dữ liệu",
            "zeroRecords": "Nothing found - sorry",
            "info": "Hiển thị từ _PAGE_ bản ghi đến _PAGES_ bản ghi",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)",
            "search": "Tìm kiếm",
            "processing": "Đang tải ...",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Tiếp theo",
                "previous": "Quay lại",
                "zeroRecords": "Chưa có dữ liệu",
                "zeroRecords": "Chưa có bản ghi nào",


            }
        }
    })
</script>