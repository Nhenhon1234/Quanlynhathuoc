<?php
include '../../inc/header.php';
include '../../service/sanpham.php';
?>
<?php
$nt = new SanPham();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Thống kê hạn sử dụng thuốc</h3>
            </div>  
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                        <div class="card-body table-responsive p-0" id="sanpham">

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
            url: "_listthuoc.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                $('#sanpham').html(data);
            }
        });
    }
    load_danhsach_sanpham();
    function ThayDoiTrangThai(id) {
        $.ajax({
            url: "_thaydoitrangthai.php",
            dataType: "html",
            type: "GET",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogTrangThai',
                    content: data,
                    width: 500
                });
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
</script>