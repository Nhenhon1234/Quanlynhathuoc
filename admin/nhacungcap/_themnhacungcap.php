<?php
include '../../service/nhathuoc.php';
?>
<?php
$nt = new NhaThuoc();
?>
<style>
    .error {
        color: red;
    }
</style>
<div class="modal-content">
  
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
             if($_GET['id'] > 0){   
                $nhacungcap = $nt->NhaThuoc_GetSingle($_GET['id']);
                while ($result = $nhacungcap->fetch_assoc())
                {
        ?>
         <div class="modal-header">
            <h5 class="modal-title">Sửa nhà cung cấp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên nhà cung cấp</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="TenNhaThuoc" name="TenNhaThuoc" value="<?php echo $result['TenNhaThuoc'] ?>" placeholder="Nhập tên nhà thuốc" />
                </div>
                <div class="col-6">
                    <label><b>Số đăng ký</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="SoDangKy" name="SoDangKy" value="<?php echo $result['SoDangKy'] ?>" placeholder="Nhập số đăng ký" />
                </div>
                <div class="col-6">
                    <label><b>Ngày đăng ký</b><span class="text-danger"> (*)</span></label>
                    <input type="date" class="form-control" id="NgayDangKy" name="NgayDangKy" value="<?php echo $result['NgayDangKy'] ?>" placeholder="Nhập ngày đăng ký" />
                </div>
                <div class="col-12">
                    <label><b>Địa chỉ</b></label>
                    <input type="text" class="form-control" id="DiaChi" name="DiaChi" placeholder="Nhập địa chỉ" value="<?php echo $result['DiaChi'] ?>" />
                    <input type="text" class="form-control" id="NhaThuocID" name="NhaThuocID"  value="<?php echo $result['NhaThuocID']?>" hidden />
                    <input type="text" class="form-control" id="NhaCungCap" name="NhaCungCap" value="NhaCungCap" hidden />
                </div>
            </div>
        </div>
        <?php }} else {
            
            ?>
            
            <div class="modal-header">
            <h5 class="modal-title">Thêm mới nhà cung cấp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <label><b>Tên nhà cung cấp</b></label>
                    <input type="text" class="form-control" id="TenNhaThuoc" name="TenNhaThuoc" placeholder="Nhập tên nhà thuốc" />
                </div>
                <div class="col-6">
                    <label><b>Số đăng ký</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="SoDangKy" name="SoDangKy" placeholder="Nhập số đăng ký" />
                </div>
                <div class="col-6">
                    <label><b>Ngày đăng ký</b><span class="text-danger"> (*)</span></label>
                    <input type="date" class="form-control" id="NgayDangKy" name="NgayDangKy" placeholder="Nhập ngày đăng ký" />
                </div>
                <div class="col-12">
                    <label><b>Địa chỉ</b><span class="text-danger"> (*)</span></label>
                    <input type="text" class="form-control" id="DiaChi" name="DiaChi" placeholder="Nhập địa chỉ" />
                    <input type="text" class="form-control" id="NhaCungCap" name="NhaCungCap" value="NhaCungCap" hidden />
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
                toastr.success("Đã lưu nhà thuốc")
                $('#dialogNhaCungCap').modal('hide');
                load_danhsach_ncc();   
               console.log(data);           
            },error : function(){
                console.log("bug")
            }
        });
    };
</script>