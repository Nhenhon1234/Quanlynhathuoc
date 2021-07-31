<?php
include '../../service/nhathuoc.php';
include '../../lib/session.php';

?>
<?php
$nt = new NhaThuoc();
Session :: checkSession();

?>

<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thanh toán</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formThanhToan" method="POST" id="basicform" data-parsley-validate="">
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <label><b>Họ tên</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="HoTen" name="HoTens" placeholder="Nhập họ tên" />
                </div>
                <div class="col-6">
                    <label><b>Số điện thoại</b></label>
                    <input type="text" class="form-control" id="SoDienThoai" name="SoDienThoai" placeholder="Nhập số điện thoại" />
                </div>
                <div class="col-12">
                    <label><b>Địa chỉ</b></label>
                    <textarea type="text" class="form-control" id="DiaChi" name="DiaChi" ></textarea>
                </div>              
                <div class="col-12">
                    <label><b>Tổng thanh toán</b></label>
                    <input type="text" class="form-control" id="TongThietHai" name="TongThietHai" disabled />
                    <input type="text" class="form-control" id="TongTien" name="TongTien" hidden />
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
        var formData = new FormData($form[0]);
        formData.append("arr", localStorage.getItem("arrThanhToan"))
        $.ajax({
            url: "../../service/insertOrUpdate.php",
            method: "POST",
            data: {
                thanhtoan: "ThanhToan",
                NguoiTaoDon : '<?php echo $_SESSION['HoTen'] ?>',
                NguoiTaoID : <?php echo $_SESSION['NguoiDungID'] ?>,
                HoTen : $("#HoTen").val(),
                SoDienThoai : $("#SoDienThoai").val(),
                DiaChi : $("#DiaChi").val(),
                TongTien : $("#TongTien").val(),
                MoTa : $("#ChuThich").val(),
                arr: localStorage.getItem("arrThanhToan")
            },
            success: function(data) {
                toastr.success("Đơn hàng đã được thanh toán")
                $('#dialogThanhToan').modal('hide');
                setInterval(function(){
                    location.reload()
                },2000) 
            },
            error: function() {
                console.log("bug")
            }
        });
    };
</script>