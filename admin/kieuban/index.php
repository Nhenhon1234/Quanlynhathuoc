<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Danh sách kiểu bán</h3>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success" onclick="ThemMoiKieuBan(0)"><i class="fas fa-plus"></i> Thêm mới</button>

                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="kieuban">

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
    function load_danhsach_kieuban() {
        $.ajax({
            url: "_danhsachkieuban.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                debugger
                $('#kieuban').html(data);
            }
        });
    }
    load_danhsach_kieuban();

    function ThemMoiKieuBan(id) {
        $.ajax({
            url: "_themkieuban.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogKieuBan',
                    content: data,
                    width: 800
                });    
                $popup.find("form").validate({
                    messages: {
                        TenKieuBan: {
                            required: "Vui lòng kiểu bán"
                        }
                    },
                    rules: {
                        TenKieuBan: {
                            required: true
                        }
                    }
                })           
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
    function XoaKieuBan(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa bản ghi này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    KieuBan: "RemoveKieuBan"
                },
                success: function(data) {
                    toastr.success("Đã xóa kiểu bán này")
                    dialog.modal('hide');
                    load_danhsach_kieuban();
                },
                error: function() {
                    toastr.error("Không lấy được thông tin")
                }
            })
        })
    }
  
</script>