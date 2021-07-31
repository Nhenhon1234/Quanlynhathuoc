<?php
include '../../inc/header.php';
include '../../service/kieuban.php';

?>
<?php
$nt = new KieuBan();
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Thông tin khách hàng</h3>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="khachhang">
                                

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
    function load_ds_kh(){
        $.ajax({
            url: "_danhsachkhachhang.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                debugger
                $('#khachhang').html(data);
            }
        });
    }
    load_ds_kh()

    function XoaKhachHang(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa bản ghi này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    KhachHangr: "RemoveKhachHang"
                },
                success: function(data) {
                    toastr.success("Đã xóa khách hàng")
                    dialog.modal('hide');
                    load_ds_kh();
                },
                error: function() {
                    toastr.error("Không lấy được thông tin")
                }
            })
        })
    }
</script>