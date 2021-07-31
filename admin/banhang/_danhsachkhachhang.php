<?php
include '../../service/canhbao.php';
?>
<?php
$nt = new CanhBao();
?>
<div class="col-md-12">
    <div class="input-group">
        <select class="form-control" id="KhachHangID" name="KhachHangID">
            <option value="0">-- Chọn khách hàng --</option>
            <?php $loaithuoc = $nt->DanhSachKhachHang();
            if ($loaithuoc) {
                while ($result = $loaithuoc->fetch_assoc()) {
            ?>
                    <option data-SoDienThoai<?php echo $result['khachhangID'] ?>="<?php echo $result['SoDienThoai'] ?>" data-DiaChi<?php echo $result['khachhangID'] ?>="<?php echo $result['DiaChi'] ?>" value="<?php echo $result['khachhangID'] ?>"><?php echo $result['TenKhachHang'] ?></option>
            <?php }
            } ?>
        </select>
        <div class="input-group-append">
            <button title="Thêm khách hàng" type="submit" class="btn btn-default" onclick="ThemMoiKhachHnag()">
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>
</div>
<script>
    $("#KhachHangID").select2({
        theme: "bootstrap4"
    });
</script>