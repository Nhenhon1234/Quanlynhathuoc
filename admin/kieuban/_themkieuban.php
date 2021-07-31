<?php
include '../../service/kieuban.php';
?>
<?php
$nt = new KieuBan();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới kiểu bán</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
             if($_GET['id'] > 0){   
                $nhacungcap = $nt->LoaiThuoc_GetSingle($_GET['id']);
                while ($result = $nhacungcap->fetch_assoc()) {
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên kiểu bán</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenKieuBan" name="TenKieuBan" value="<?php echo $result['TenKieuBan'] ?>" placeholder="Nhập kiểu bán" />
                </div>               
                <div class="col-12">
                    <input type="text" class="form-control" id="KieuBanID" name="KieuBanID"  value="<?php echo $result['KieuBanId']?>" hidden />
                    <input type="text" class="form-control" id="KieuBan" name="KieuBan" value="KieuBan" hidden />
                </div>
            </div>
        </div>
        <?php }} else {?>
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên kiểu bán</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenKieuBan" name="TenKieuBan" placeholder="Nhập tên kiểu bán" />
                </div>
                
                <div class="col-12">
                    <input type="text" class="form-control" id="KieuBan" name="KieuBan" value="KieuBan" hidden />

                </div>
            </div>
        </div>
        <?php } ?>        
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
                toastr.success("Đã lưu kiểu bán")
                $('#dialogKieuBan').modal('hide');
                load_danhsach_kieuban();   
               console.log(data);           
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>