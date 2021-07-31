<?php
include '../../service/donhang.php';
?>
<?php
$nt = new DonHang();
?>
<style>
@page { size: auto;  margin: 0mm; }

  .box_title{
    width: 100%;
    display: inline;
  }
  .box_title label{
    font-weight: bold;
    width: 20%;
    display: inline;
  }
  .box_title span{
    width: 75%;
    display: inline;
  }
}
</style>
<div class="modal-content" id="print_hoadon">
    <div class="modal-header">
        <h5 class="modal-title">Chi tiết hóa đơn</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
        <div class="col-12">
            <button class="btn btn-success" type="button" onclick="Print()"><i class="fas fa-print"></i> In hóa đơn</button>
        </div>
        <div class="col-12" id="pr">
        <div class="col-12" >
                <div class="row">
                    <?php $nguoidung = $nt->Order_GetSingle($_GET['id']);
                    if ($nguoidung) {
                        while ($result = $nguoidung->fetch_assoc()) {
                    ?>
                            <div class="box_title col-12">
                                 <label>Mã đơn hàng: </label>
                                 <span><?php echo $result['MaDonHang'] ?></span>
                            </div>
                            <div class="box_title col-12">
                                 <label>Tên khách hàng: </label>
                                 <span><?php echo $result['HoTen'] ?></span>
                                 </div>
                            <div class="box_title col-12">
                                 <label>Số điện thoại: </label>
                                 <span><?php echo $result['SoDienThoai'] ?></span>
                                 </div>
                            <div class="box_title col-12">
                                 <label>Địa chỉ: </label>
                                 <span><?php echo $result['DiaChi'] ?></span>
                                 </div>
                            <div class="box_title col-12">
                                 <label>Ngày bán: </label>
                                 <span><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayTao']);
                                        $formattedweddingdate = $myDateTime->format('d-m-Y');
                                        echo $formattedweddingdate ?></span>
                            </div>
                            <div class="box_title col-12">
                                 <label>Tổng tiền: </label>
                                 <span><?php echo number_format($result['TongTien']) ?></span>
                             </div>
                    <?php }
                    } ?>



                </div>
            </div>
            <table class="table table-bordered" id="tbl_chitietdonhang" style="width: 100%">
                <thead>
                    <tr class="bg-success">
                        <th style="width: 5%;text-align: center;">STT</th>
                        <th style="width: 25%;text-align: center;">Tên sản phẩm</th>
                        <th style="width: 10%;text-align: center;">Số lượng</th>
                        <th style="width: 20%;text-align: center;">Đơn giá</th>
                        <th style="width: 20%;text-align: center;">Thành tiền</th>
                        <th style="width: 20%;text-align: center;">Ngày tạo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nguoidung = $nt->ChiTietDonHang($_GET['id']);
                    if ($nguoidung) {
                        $i = 0;
                        $SoLuong = 0;
                        $TongTien = 0;
                        while ($result = $nguoidung->fetch_assoc()) {
                            $i++;
                            $SoLuong += $result['SoLuong'];
                            $TongTien += $result['ThanhTien'];
                    ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $i ?></td>
                                <td style="text-align: center;"><?php echo $result['TenSanPham'] ?></td>
                                <td style="text-align: center;"><?php echo $result['SoLuong'] ?></td>
                                <td style="text-align: center;"><?php echo number_format($result['Gia']) ?></td>
                                <td style="text-align: center;"><?php echo number_format($result['ThanhTien']) ?></td>
                                <td style="text-align: center;"><?php $myDateTime = DateTime::createFromFormat('Y-m-d', $result['NgayTao']);
                                    $formattedweddingdate = $myDateTime->format('d-m-Y');
                                    echo $formattedweddingdate ?>
                                </td>
                            </tr>

                    <?php }
                    } ?>
                    <tr>
                        <td rowspan="6" colspan="6">Tổng:  <?php echo number_format($TongTien) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
            

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
    </div>
</div>
<script>
    function Print(){
        $("#pr").printThis({
            header: "<h1 style='text-align: center'> Phiếu bán hàng</h1>"

        })
    }
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
        buttons: [{
            text: '<i class="fas fa-chart-bar"></i> Thống kê',
            className: 'btn btn-outline-primary rounded btn-sm  mr-2',
            init: function(api, node, config) {
                $(node).removeClass('btn-secondary buttons-excel buttons-html5')
            },
            action: function(e, dt, node, config) {
                ThongKeSoLuongCanBoTheoNam();
            }
        }]
    })
</script>