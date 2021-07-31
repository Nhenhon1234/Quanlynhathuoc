
<?php
include '../../inc/header.php';
?>
<?php 
Session :: checkSession();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Quản lý đơn hàng của <span style="color: green"> <?php echo $_SESSION['HoTen'] ?>  <span></h3>
            </div>         
        </div>
        <div class="content">
            <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-md-6">
               <label><b>Từ ngày</b> <span class="text-danger"> (*)</span></label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control" id="TuNgay" placeholder="dd-mm-yyyy" min="1997-01-01" max="2030-12-31">                   
                    </div>
               </div>
               <div class="col-md-6">
                <label><b>Đến ngày</b> <span class="text-danger"> (*)</span></label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control" id="DenNgay" placeholder="Đến ngày" >                       
                    </div>
               </div>
               <div class="col-md-2">
                    <button class="btn btn-success" style="margin-top: 13%;" type="button" onclick="load_danhsach_sanpham()"><i class="fas fa-eye"></i>  Xem</button>
               </div>
                </div>
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="doanhthu">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include '../../inc/footer.php'
?>
<script>
    function load_danhsach_sanpham() {
        $.ajax({
            url: "_danhsachdonhang.php",
            dataType: "html",
            method: "GET",
            data:{
                TuNgay: $("#TuNgay").val(),
                DenNgay: $("#DenNgay").val(),
                NguoiDungID :   <?php echo $_SESSION['NguoiDungID'] ?>,
                QuyenTruyCap :  '<?php echo $_SESSION['QuyenTruyCap'] ?>'
            },
            success: function(data) {
                $('#doanhthu').html(data);
            }
        });
    }
    load_danhsach_sanpham();
    function XuLyDonHang(id) {
        $.ajax({
            url: "_xulydonhang.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'xulydonhang',
                    content: data,
                    width: 600
                });
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
    function ChiTietDonHang(id) {
        $.ajax({
            url: "_chitietdonhang.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'chitietdonhang',
                    content: data,
                    width: 700
                });
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
</script>