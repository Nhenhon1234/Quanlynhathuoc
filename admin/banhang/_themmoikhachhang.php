<?php
include '../../service/canhbao.php';
include '../../lib/session.php';

?>
<?php
$nt = new CanhBao();
Session :: checkSession();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới khách hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formKhachHang" method="POST" id="basicform" data-parsley-validate="">
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên khách hàng</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenKhachHang" name="TenKhachHang" placeholder="Nhập tên khách hàng" />
                </div>
                <div class="col-12">
                    <label><b>Số điện thoại</b></label>
                    <input type="text" class="form-control" id="SoDienThoai" name="SoDienThoai" placeholder="Nhập số điện thoại" />
                </div>
                <div class="col-12">
                    <label><b>Địa chỉ</b></label>
                    <textarea type="text" class="form-control" id="DiaChi" name="DiaChi" placeholder="Nhập địa chỉ"></textarea>
                </div>
                <div class="col-12">
                    <input type="text" class="form-control" id="KhachHang" name="KhachHang" value="ThemKhachHang" hidden />
                    <input type="text" class="form-control" id="KhachHangIDs" name="KhachHangIDs"  hidden />
                    <input type="text" class="form-control" id="NguoiTaoID" name="NguoiTaoID" value="<?php echo $_SESSION['NguoiDungID'] ?>" hidden />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            <button type="button" class="btn btn-primary" onclick="GhiLai(this)">Ghi lại</button>
        </div>
    </form>
</div>
<script>
    function GhiLai(e) {
        $form = $(e).closest('form')
        if (!$form.valid())
            return false;
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            method: "POST",
            data: $form.serialize(),
            success: function(data) {
                toastr.success("Đã thêm khách hàng")
                $('#dialogkhachhang').modal('hide');
                LoadDanhSachKhachHang();
            },
            error: function() {
                console.log("bug")
            }
        });
    };
</script>