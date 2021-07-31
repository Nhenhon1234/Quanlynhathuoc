<?php
include '../../service/donhang.php';
?>
<?php
$nt = new DonHang();
?>
<table class="table table-bordered" id="tbl_doanhthu" style="width: 100%">
    <thead>
        <tr class="bg-success">
            <th style="width: 5%;">STT</th>
            <th style="width: 10%;">Mã đơn hàng</th>
            <th style="width: 10%;">Tổng tiền</th>
            <th style="width: 10%;">Người mua</th>
            <th style="width: 10%;">Địa chỉ</th>
            <th style="width: 10%;">Số điện thoại</th>
            <th style="width: 10%;">Người tạo đơn</th>
            <th style="width: 10%;">Ngày tạo</th>
            <th style="width: 10%;">Trạng thái</th>
            <th style="width: 5%;">Chức năng</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nguoidung = $nt->DanhSachDonHang($_GET['TuNgay'], $_GET['DenNgay'], $_GET['NguoiDungID'],$_GET['QuyenTruyCap']);
        if ($nguoidung) {
            $i = 0;
            while ($result = $nguoidung->fetch_assoc()) {
                $i++;
        ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['MaDonHang'] ?></td>
                    <td><?php echo number_format($result['TongTien'])?></td>
                    <td><?php echo $result['HoTen'] ?></td>
                    <td><?php echo $result['DiaChi'] ?></td>
                    <td><?php echo $result['SoDienThoai'] ?></td>
                    <td><?php echo $result['TenNguoiTao'] ?></td>
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
                    <td>  
                    <?php 
                            if($result['TrangThai'] == 2){ ?>     
                            <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="javascript:"><i class="fas fa-check-square"></i> Đơn hàng đã hoàn thành</a>
                                <a class="dropdown-item" href="javascript:" onclick="ChiTietDonHang(<?php echo $result['OrderID'] ?>)"><i class="fas fa-info-circle"></i> Chi tiết đơn hàng</a>
                            </div>
                        </div>   
                            <?php } else {?>
                                <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Chức năng
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#" onclick="XuLyDonHang(<?php echo $result['OrderID'] ?>)"><i class="fas fa-check-square"></i> Xử lý đơn hàng</a>
                                <a class="dropdown-item" href="javascript:" onclick="ChiTietDonHang(<?php echo $result['OrderID'] ?>)"><i class="fas fa-info-circle"></i> Chi tiết đơn hàng</a>

                            </div>
                        </div>   
                                <?php } ?>
                     
                    </td>                  
                </tr>
        <?php }
        } ?>
    </tbody>
    
</table>
<script>
    $("#tbl_doanhthu").dataTable({
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
