<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Danh sách quản lý nhà cung cấp</h3>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success" onclick="ThemMoiNhaCungCap(0)"><i class="fas fa-plus"></i> Thêm mới</button>

                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="nhacungcap">

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
    function load_danhsach_ncc() {
        $.ajax({
            url: "_danhsachnhacungcap.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                debugger
                $('#nhacungcap').html(data);
            }
        });
    }
    load_danhsach_ncc();

    function ThemMoiNhaCungCap(id) {
        $.ajax({
            url: "_themnhacungcap.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogNhaCungCap',
                    content: data,
                    width: 800
                });
                $popup.find("form").validate({
                    messages: {
                        TenNhaThuoc: {
                            required: "Vui lòng nhập tên nhà thuốc"
                        },
                        SoDangKy: {
                            required: "Vui lòng nhập số đăng ký"
                        },
                        NgayDangKy: {
                            required: "Vui lòng nhập ngày đăng ký"
                        }
                    },
                    rules: {
                        TenNhaThuoc: {
                            required: true
                        },
                        SoDangKy: {
                            required: true
                        },
                        NgayDangKy: {
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

    function XoaNhaCungCap(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa nhà cung cấp này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    NhaCungCap: "Remove"
                },
                success: function(data) {
                    toastr.success("Đã xóa nhà cung cấp")
                    dialog.modal('hide');
                    load_danhsach_ncc();
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
                NhaCungCap: "Change"
            },
            success: function(data) {
                debugger
                toastr.success("Đã thay đổi trạng thái")
                load_danhsach_ncc();
            },
            error: function() {
                toastr.error("Không lấy được thông tin")
            }
        })
    }
</script>