<?php
include '../../service/donhang.php';
?>
<?php
$nt = new DonHang();
?>
<div class="col-md-3">
                    <button class="btn btn-success" style="margin-top: 13%;" type="button" onclick="XuatExcel()"><i class="fas fa-file-excel"></i>  Xuất excel</button>
</div>
<table class="table table-bordered mt-2" id="tbl_donhang" style="width: 100%">
    <thead>
        <tr class="bg-success">
            <th style="width: 5%;">STT</th>
            <th style="width: 15%;">Mã đơn hàng</th>
            <th style="width: 10%;">Số lượng</th>
            <th style="width: 20%;">Tống tiền</th>
            <th style="width: 15%;">Tên người bán</th>
            <th style="width: 15%;">Ngày bán</th>
            <th style="width: 10%;">Trạng thái</th>

        </tr>
    </thead>
    <tbody>
        <?php
        $nguoidung = $nt->DanhSachDonHang_log($_GET['TuNgay'], $_GET['DenNgay']);
        $i = 0;
        $SoLuong = 0;
        $TongTien = 0;
        if ($nguoidung) {    
            while ($result = $nguoidung->fetch_assoc()) {
                $i++;
                $SoLuong += $result['SoLuong'];
                $TongTien += $result['ThanhTien'];
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><a href="javascript:" onclick="ChiTietDonHang(<?php echo $result['OrderID']?>)"><?php echo $result['TenSanPham'] ?></a> </td>
                    <td><?php echo $result['SoLuong'] ?></td>
                    <td><?php echo number_format($result['ThanhTien'])?></td>
                    <td><?php echo $result['TenNguoiBan'] ?></td>
                    <td><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayTao']);
                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                        echo $formattedweddingdate ?></td>         
                        <?php 
                            if($result['TrangThai'] == 1){ ?>
                               <td style="background-color: yellowgreen;color: #ffffff;"> <span style="cursor: pointer;">Chờ xử lý</span></td>
                            <?php }else if($result['TrangThai'] == 2){  ?>
                                <td style="background-color: green;color: #ffffff;">  <span style="cursor: pointer;">Hoàn thành</span></td>
                            <?php } else {?>
                                <td style="background-color: red;color: #ffffff;">  <span style="cursor: pointer;">Hoàn đơn</span></td>
                                <?php } ?>                    
                </tr>
                
        <?php }
        
        } ?>
        <tr>
                <td>Tổng</td>
                <td>Số sản phẩm : <?php echo $i ?></td>
                <td><?php echo $SoLuong ?></td>
                <td><?php echo number_format($TongTien) ?></td>
    </tbody>
</table>
<script>
    $("#tbl_donhang").dataTable({
        "ordering": false,
        "info": true,
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Tất cả"]],
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