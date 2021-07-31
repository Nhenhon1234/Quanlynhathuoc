<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Danh sách cảnh báo</h3>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success" onclick="ThemMoiCanhBao(0)"><i class="fas fa-plus"></i> Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="canhbao">

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
    function load_danhsach_canhbao() {
        $.ajax({
            url: "_danhsachcanhbao.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                debugger
                $('#canhbao').html(data);
            }
        });
    }
    load_danhsach_canhbao();

    function ThemMoiCanhBao(id) {
        $.ajax({
            url: "_themcanhbao.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogCanhbao',
                    content: data,
                    width: 800
                });
                $popup.find("form").validate({
                    messages: {
                        TenNhaThuoc: {
                            required: "Vui lòng nhập tên nhà thuốc"
                        }
                    },
                    rules: {
                        TenNhaThuoc: {
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

    function XoaCanhBao(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa cảnh báo này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    CanhBao: "RemoveCanhBao"
                },
                success: function(data) {
                    toastr.success("Đã xóa cảnh báo")
                    dialog.modal('hide');
                    load_danhsach_canhbao();
                },
                error: function() {
                    toastr.error("Không lấy được thông tin")
                }
            })
        })
    }
    
    function ThayDoiTrangThai(id, TrangThai) {
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            dataType: "html",
            type: "POST",
            data: {
                id: id,
                TrangThai : TrangThai,
                TinTuc: "Change"
            },
            success: function(data) {
                toastr.success("Đã thay đổi trạng thái")
                load_danhsach_canhbao();
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
</script>