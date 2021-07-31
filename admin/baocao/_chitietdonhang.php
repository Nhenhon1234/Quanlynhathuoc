<?php
include '../../service/donhang.php';
?>
<?php
$nt = new DonHang();
?>

<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Chi tiết đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
        <table class="table table-bordered" id="tbl_chitietdonhang" style="width: 100%">
    <thead>
        <tr class="bg-success">
            <th style="width: 5%;">STT</th>
            <th style="width: 35%;">Tên sản phẩm</th>
            <th style="width: 10%;">Số lượng</th>
            <th style="width: 20%;">Đơn giá</th>
            <th style="width: 20%;">Thành tiền</th>
            <th style="width: 10%;">Ngày tạo</th>
        </tr>
    </thead>
    <tbody>
        <?php
         $i = 0;
         $SoLuong = 0;
         $TongTien = 0;
        $nguoidung = $nt->ChiTietDonHang($_GET['id']);      
        if ($nguoidung) {
           
            while ($result = $nguoidung->fetch_assoc()) {
                $i++;
                $SoLuong += $result['SoLuong'] ;
                $TongTien += $result['ThanhTien'] ;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['TenSanPham'] ?></td>
                    <td><?php echo $result['SoLuong'] ?></td>
                    <td><?php echo number_format($result['Gia'])?></td>
                    <td><?php echo number_format($result['ThanhTien'])?></td>
                    <td><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayTao']);
                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                        echo $formattedweddingdate ?>
                    </td>                         
                </tr>
                
        <?php }
        } ?>
         <tr>
                <td>Tổng</td>
                <td>Số sản phẩm : <?php echo $i ?></td>
                <td><?php echo $SoLuong ?></td>
                <td><?php echo number_format($TongTien) ?></td>
         </tr>
    </tbody>
</table>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    </div>
</div>
<script>
    $("#tbl_chitietdonhang").dataTable({
        "ordering": false,
        "info": true,
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
        },
        buttons: [
            {
                text: '<i class="fas fa-chart-bar"></i> Thống kê',
                className: 'btn btn-outline-primary rounded btn-sm  mr-2',
                init: function (api, node, config) {
                    $(node).removeClass('btn-secondary buttons-excel buttons-html5')
                },
                action: function (e, dt, node, config) {
                    ThongKeSoLuongCanBoTheoNam();
                }
            }
        ]
    })
</script>