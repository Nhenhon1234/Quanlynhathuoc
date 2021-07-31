<?php
include '../../service/sanpham.php';
?>
<?php
$nt = new SanPham();
?>
<table class="table table-bordered" id="tbl_nhacungcap" style="width: 100%">
    <thead>
        <tr class="bg-success">
            <th style="width: 5%;">STT</th>
            <th style="width: 10%;">Code</th>
            <th style="width: 20%;">Tên sản phẩm</th>
            <th style="width: 15%;">Nhà cung cấp</th>
            <th style="width: 10%;">Trạng thái</th>
            <th style="width: 10%;">Ảnh</th>
            <th style="width: 10%;">Giá nhập</th>
            <th style="width: 10%;">Tình trạng</th>
            <th style="width: 10%;">Số lượng bán</th>

            
        </tr>
    </thead>
    <tbody>
        <?php
        $sanpham = $nt->DanhSachSanPhamBanChay($_GET['id']);
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
                        <?php
                        $myDateTime = DateTime::createFromFormat('Y-m-d', $result['HanSuDung']);
                        $formattedweddingdate = $myDateTime->format('Y-m-d');
                        $now = time(); // or your date as well
                        $your_date = strtotime($formattedweddingdate);
                        $datediff = $your_date - $now;
                        $dayvalid = round($datediff / (60 * 60 * 24));
                        
                        ?>                   
                <td>
                    <?php
                    if ($result['TrangThai'] == 1) {
                    ?>
                        <span onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>, <?php echo $result['TrangThai'] ?>)"><i class="fas fa-lock-open"></i> Đang sử dụng</span>
                    <?php } else if ($result['TrangThai'] == 0) { ?>
                        <span onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>, <?php echo $result['TrangThai'] ?>)"><i class="fas fa-lock"></i> Chờ duyệt</span>
                    <?php } else { ?>
                        <span onclick="ThayDoiTrangThai(<?php echo $result['SanPhamID'] ?>, <?php echo $result['TrangThai'] ?>)"><i class="fas fa-do-not-enter"></i> Ngừng kinh doanh</span>
                    <?php } ?>
                </td>
                <td><img src="<?php echo $result['AnhDaiDien'] ?>" style="width: : 100px; height: 50px;" alt=""></td>
                <td><?php echo number_format($result['GiaNhap']) ?></td>
                <?php
                if ($dayvalid > 0) {
                ?>
                    <td style="background-color: green;  color: #f1f1f1">Còn hạn sử dụng</td>
                <?php } else { ?>
                    <td style="background-color: red; color: #f1f1f1">Hết hạn sử dụng</td>
                <?php } ?>
                <td><?php echo $result['SoLuongBan'] ?></td>
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