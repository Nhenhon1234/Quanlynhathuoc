
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Xử lý đơn hàng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">       
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Trạng thái đơn hàng</b><span class="text-danger"> (*)</span></label>
                    <select class="form-control" name="TrangThai" id="TrangThai">
                        <option value="1">Chờ xử lý</option>
                        <option value="2">Hoàn thành</option>
                        <option value="3">Hoàn đơn</option>
                    </select>
                    <input type="text" class="form-control" id="DonHang" name="DonHang" value="TrangThaiDonHang" hidden />
                    <input type="text" class="form-control" value="<?php echo $_GET['id'] ?>" id="DonHangID" name="DonHangID" hidden />
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
                toastr.success("Đã thay đổi trạng thái đơn hàng")
                $('#xulydonhang').modal('hide');
                load_danhsach_sanpham()
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>