<?php
include '../../service/kieuban.php';

?>
<?php
$nt = new KieuBan();
?>
<table class="table table-bordered" id="tbl_kieuban" style="width: 100%">
    <thead>
        <tr class="bg-success">
            <th style="width: 5%;">STT</th>
            <th style="width: 30%;">Tên khách hàng</th>
            <th style="width: 25%;">Số điện thoại</th>
            <th style="width: 20%;">Địa chỉ</th>
            <th style="width: 10%;">Ngày tạo</th>
            <th style="width: 10%;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $loaithuoc = $nt->DanhSachKhachHang();
        if ($loaithuoc) {
            $i = 0;
            while ($result = $loaithuoc->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['TenKhachHang'] ?></td>
                    <td><?php echo $result['SoDienThoai'] ?></td>
                    <td><?php echo $result['DiaChi'] ?></td>
                    <td><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayTao']);
                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                        echo $formattedweddingdate ?></td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="XoaKhachHang(<?php echo $result['khachhangID'] ?>)"><i class="fas fa-trash-alt"></i> Xóa</a>
                            </div>
                        </div>
                    </td>
                </tr>
        <?php }
        } ?>
    </tbody>
</table>
<script>
    $("#tbl_kieuban").dataTable({
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