<?php
include '../../service/nhathuoc.php';
?>
<?php
$nt = new NhaThuoc();
?>
<table class="table table-bordered" id="tbl_nhacungcap" style="width: 100%">
    <thead>
        <tr class="bg-success">
            <th style="width: 5%;">STT</th>
            <th style="width: 25%;">Tên nhà thuốc</th>
            <th style="width: 25%;">Địa chỉ</th>
            <th style="width: 15%;">Só đăng ký</th>
            <th style="width: 15%;">Trạng thái</th>
            <th style="width: 15%;">Ngày đăng ký</th>
            <th style="width: 5%;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nhacungcap = $nt->DanhSachNhaThuoc();
        if ($nhacungcap) {
            $i = 0;
            while ($result = $nhacungcap->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['TenNhaThuoc'] ?></td>
                    <td><?php echo $result['DiaChi'] ?></td>
                    <td><?php echo $result['SoDangKy'] ?></td>
                    <td style="cursor: pointer;">
                        <?php 
                            if($result['TrangThai'] >= 1){
                        ?>
                        <span onclick="ThayDoiTrangThai(<?php echo $result['NhaThuocID'] ?>, <?php echo $result['TrangThai']?>)"><i class="fas fa-lock-open"></i> Đang sử dụng</span>
                        <?php }else{?>
                            <span onclick="ThayDoiTrangThai(<?php echo $result['NhaThuocID'] ?>, <?php echo $result['TrangThai']?>)"><i class="fas fa-lock"></i> Ngưng sử dụng</span>
                        <?php }?>
                    </td>
                    <td><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayDangKy']);
                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                        echo $formattedweddingdate ?></td>
                    <td>
                            <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="ThemMoiNhaCungCap(<?php echo $result['NhaThuocID'] ?>)"><i class="fas fa-edit"></i> Sửa</a>
                                <a class="dropdown-item" href="#" onclick="XoaNhaCungCap(<?php echo $result['NhaThuocID'] ?>)" ><i class="fas fa-trash-alt"></i> Xóa</a>
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