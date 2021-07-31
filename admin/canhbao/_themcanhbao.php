<?php
include '../../service/canhbao.php';
?>
<?php
$nt = new CanhBao();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới cảnh báo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
             if($_GET['id'] > 0){   
                $nhacungcap = $nt->CanhBao_GetSingle($_GET['id']);
                while ($result = $nhacungcap->fetch_assoc()) {
        ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên thể loại</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenTinTuc" name="TenTinTuc" value="<?php echo $result['TenTinTuc'] ?>" placeholder="Nhập tên cảnh báo" />
                </div>  
                <div class="col-12">
                    <label><b>Nội dung</b><span class="text-danger"> (*)</span></label>
                    <textarea type="text" class="form-control" id="NoiDung" name="NoiDung" value="<?php echo $result['NoiDung'] ?>" placeholder="Nội dung cảnh báo" ></textarea>
                </div>              
                <div class="col-12">
                    <input type="text" class="form-control" id="TinTucID" name="TinTucID"  value="<?php echo $result['TinTucID']?>" hidden />
                    <input type="text" class="form-control" id="TinTuc" name="TinTuc" value="TinTuc" hidden />
                </div>
            </div>
        </div>
        <?php }} else {?>
            <div class="modal-body">
            <div class="row">
            <div class="col-12">
                    <label><b>Tên thể loại</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenTinTuc" name="TenTinTuc"  placeholder="Nhập tên cảnh báo" />
                </div>  
                <div class="col-12">
                    <label><b>Nội dung</b><span class="text-danger"> (*)</span></label>
                    <textarea type="text" class="form-control" id="NoiDung" name="NoiDung"  placeholder="Nội dung cảnh báo" ></textarea>
                </div>        
                
                <div class="col-12">
                    <input type="text" class="form-control" id="TinTuc" name="TinTuc" value="TinTuc" hidden />
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
                toastr.success("Đã lưu cảnh báo")
                $('#dialogCanhbao').modal('hide');
                load_danhsach_canhbao();   
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>