<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Danh sách loại thuốc</h3>
            </div>
            <div class="row mb-2">
                <div class="col-lg-12">
                    <button type="button" class="btn btn-success" onclick="ThemMoiTheLoai(0)"><i class="fas fa-plus"></i> Thêm mới</button>

                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="loaithuoc">

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
    function load_danhsach_loaithuoc() {
        $.ajax({
            url: "_danhsachloaithuoc.php",
            dataType: "html",
            method: "GET",
            success: function(data) {
                debugger
                $('#loaithuoc').html(data);
            }
        });
    }
    load_danhsach_loaithuoc();

    function ThemMoiTheLoai(id) {
        $.ajax({
            url: "_themloaithuoc.php",
            dataType: "html",
            data: {
                id: id
            },
            success: function(data) {
                var $popup = mac.showDialog({
                    id: 'dialogTheLoai',
                    content: data,
                    width: 800
                });
                $popup.find("form").validate({
                    messages: {
                        TenTheLoai: {
                            required: "Vui lòng nhập tên thể loại"
                        }
                    },
                    rules: {
                        TenTheLoai: {
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

    function XoaTheLoai(id) {
        var dialog = mac.showConfirmDialog("Bạn có chắc muốn xóa bản ghi này?")
        dialog.find(".cmd-save").click(function() {
            $.ajax({
                url: "../../service/insertOrUpdate.php",
                dataType: "html",
                type: "POST",
                data: {
                    id: id,
                    TheLoai: "RemoveTheLoai"
                },
                success: function(data) {
                    toastr.success("Đã xóa loại thuốc này")
                    dialog.modal('hide');
                    load_danhsach_loaithuoc();
                },
                error: function() {
                    toastr.error("Không lấy được thông tin")
                }
            })
        })
    }
  
</script>