<?php
include '../../service/loaithuoc.php';
?>
<?php
$nt = new LoaiThuoc();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới thể loại</h5>
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
                    <label><b>Tên thể loại</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenTheLoai" name="TenTheLoai" value="<?php echo $result['TenTheLoai'] ?>" placeholder="Nhập tên nhà thuốc" />
                </div>               
                <div class="col-12">
                    <input type="text" class="form-control" id="TheLoaiID" name="TheLoaiID"  value="<?php echo $result['TheLoaiID']?>" hidden />
                    <input type="text" class="form-control" id="TheLoai" name="TheLoai" value="TheLoai" hidden />
                </div>
            </div>
        </div>
        <?php }} else {?>
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên nhà cung cấp</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenTheLoai" name="TenTheLoai" placeholder="Nhập tên thể loại" />
                </div>
                
                <div class="col-12">
                    <input type="text" class="form-control" id="TheLoai" name="TheLoai" value="TheLoai" hidden />
                    <input type="text" class="form-control" id="TheLoai" name="TheLoai" value="TheLoai" hidden />

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
                toastr.success("Đã lưu thể loại")
                $('#dialogTheLoai').modal('hide');
                load_danhsach_loaithuoc();   
               console.log(data);           
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>