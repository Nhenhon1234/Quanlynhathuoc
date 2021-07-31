<?php
include '../../service/sanpham.php';
include '../../lib/session.php';
?>
<?php
$nt = new SanPham();
Session::checkSession();
?>
<style>
    .error {
        color: red;
    }

    .file {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .file>label {
        font-size: 1rem;
        font-weight: 300;
        cursor: pointer;
        outline: 0;
        user-select: none;
        border-color: rgb(216, 216, 216) rgb(209, 209, 209) rgb(186, 186, 186);
        border-style: solid;
        border-radius: 4px;
        border-width: 1px;
        background-color: hsl(0, 0%, 100%);
        color: hsl(0, 0%, 29%);
        padding-left: 16px;
        padding-right: 16px;
        padding-top: 16px;
        padding-bottom: 16px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .file>input[type='file'] {
        display: none;
    }
</style>
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Thêm mới sản phẩm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form id="formSanPham" method="POST" id="basicform" data-parsley-validate="">
        <?php
        if ($_GET['id'] > 0) {
            $sanpham = $nt->SanPham_GetSingle($_GET['id']);
            while ($result = $sanpham->fetch_assoc()) {
        ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-6">
                                    <div class="col-12">
                                        <label><b>Tên sản phẩm</b><span class="text-danger"> (*)</span></label>
                                        <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" value="<?php echo $result['TenSanPham'] ?>" placeholder="Nhập tên sản phẩm" />
                                    </div>
                                    <div class="col-12">
                                        <label><b>Giá nhập</b><span class="text-danger"> (*)</span></label>
                                        <input type="text" class="form-control" id="GiaNhap" name="GiaNhap" value="<?php echo $result['GiaNhap'] ?>" placeholder="Nhập giá nhập" />
                                    </div>
                                    <div class="col-12"></label>
                                        <label><b>Giá bán</b> <span class="text-danger"> (*)</span></label>
                                        <input type="text" class="form-control" id="GiaBan" name="GiaBan" value="<?php echo $result['DonGia'] ?>" placeholder="Nhập giá bán" />
                                        <input type="text" class="form-control" name="SoLuong" value="0" placeholder="Nhập giá bán" hidden />

                                    </div>
                                    <div class="col-12">
                                        <label><b>Hạn sử dụng</b> <span class="text-danger"> (*)</span></label>
                                        <input type="date" class="form-control" id="HanSuDung" name="HanSuDung" value="<?php echo $result['HanSuDung'] ?>" placeholder="Nhập hạn sử dụng" />
                                    </div>
                                    <div class="col-12">
                                        <label><b>Hàm lượng</b> <span class="text-danger"> (*)</span></label>
                                        <input type="text" class="form-control" id="HamLuong" name="HamLuong" placeholder="Hàm lượng" value="<?php echo $result['HamLuong'] ?>" />
                                    </div>
                                    <div class="col-12">
                                        <label><b>Hoạt chất</b> <span class="text-danger"> (*)</span></label>
                                        <input type="text" class="form-control" id="HoatChat" name="HoatChat" placeholder="Hoạt chất" value="<?php echo $result['HoatChat'] ?>" />
                                    </div>
                                    <div class="col-12">
                                        <label><b>Còn nợ</b></label>
                                        <input type="text" class="form-control" id="ConNo" name="ConNo" placeholder="Còn nợ" value="<?php echo $result['ConNo'] ?>" />
                                    </div>
                                    <div class="col-12">
                                        <label><b>Hàm lượng</b> <span class="text-danger"> (*)</span></label>
                                        <input type="text" class="form-control" id="HamLuong" name="HamLuong" placeholder="Hàm lượng" value="<?php echo $result['HamLuong'] ?>" />
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="col-md-12" style="text-align: center;">
                                        <label><b>Ảnh đại diện</b><span class="text-danger"> (*)</span></label></label>
                                        <img class="profile-user-img img-avatar img img-responsive img-thumbnail0 img-fluid img-input" id="img_thumb" src="<?php echo $result['AnhDaiDien'] ?>" name="" alt="avatar" style="height: 180px; width: 430px" />
                                        <div class="file"><label for="chooseFile" style="color: #f1f1f1;background: #006b39;">
                                                Upload ảnh &nbsp;<i class="fa fa-upload"></i></label>
                                            <input name="chooseFile" type="file" id="chooseFile">
                                            <input type="text" class="form-control" id="AnhDaiDien" name="AnhDaiDien" value="<?php echo $result['AnhDaiDien'] ?>" hidden />
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label><b>Kiểu bán</b></label>
                                        <select class="form-control" name="KieuBanID" id="KieuBanID">
                                            <?php
                                            $kieuban = $nt->DanhSachKieuBan();
                                            while ($res_kb = $kieuban->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $res_kb['KieuBanId'] ?>"><?php echo $res_kb['TenKieuBan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label><b>Nhà cung cấp</b></label>
                                        <select class="form-control" name="NhaCungCapID">
                                            <?php
                                            $nhacungcap = $nt->DanhSachNhaCungCap();
                                            while ($res_ncc = $nhacungcap->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $res_ncc['NhaThuocID'] ?>"><?php echo $res_ncc['TenNhaThuoc'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label><b>Thể loại</b></label>
                                        <select class="form-control" name="TheLoaiID">
                                            <?php
                                            $theloai = $nt->DanhSachTheLoai();
                                            while ($res = $theloai->fetch_assoc()) {
                                            ?>
                                                <option value="<?php echo $res['TheLoaiID'] ?>"><?php echo $res['TenTheLoai'] ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label><b>Hoạt chất</b> <span class="text-danger"> (*)</span></label>
                                        <input type="text" class="form-control" id="HoatChat" name="HoatChat" placeholder="Hoạt chất" value="<?php echo $result['HoatChat'] ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12">
                        <label><b>Chi tiết</b></label>
                        <textarea class="form-control" name="ChiTiet"><?php echo $result['ChiTiet'] ?>
                            </textarea>
                    </div>
                    <input type="text" class="form-control" id="NguoiTao" name="NguoiTao" value="<?php echo $_SESSION['NguoiDungID'] ?>" hidden />
                    <input type="text" class="form-control" id="TenNguoiNhap" name="TenNguoiNhap" value="<?php echo $_SESSION['HoTen'] ?>" hidden />
                    <input type="text" class="form-control" id="SanPhamID" name="SanPhamID" value="<?php echo $result['SanPhamID'] ?>" hidden />
                    <input type="text" class="form-control" id="SanPham" name="SanPham" value="SanPham" hidden />

                </div>
                <script>
                    $("#NhaCungCapID").val(<?php echo $result['NhaCungCapID'] ?>).trigger("change")
                    $("#KieuBanID").val(<?php echo $result['KieuBanId'] ?>).trigger("change")
                    $("#TheLoaiID").val(<?php echo $result['TheLoaiID'] ?>).trigger("change")
                    $("#NhaCungCapID").val(<?php echo $result['NhaCungCapID'] ?>).trigger("change")
                </script>
            <?php }
        } else { ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="col-12">
                                    <label><b>Tên sản phẩm</b><span class="text-danger"> (*)</span></label>
                                    <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" placeholder="Nhập tên sản phẩm" />
                                </div>
                                <div class="col-12">
                                    <label><b>Giá nhập</b><span class="text-danger"> (*)</span></label>
                                    <input type="text" class="form-control" id="GiaNhap" name="GiaNhap" placeholder="Nhập giá nhập" />
                                    <input type="text" class="form-control" id="GiaNhap2" name="GiaNhap2" placeholder="Nhập giá nhập" hidden />
                                    <input type="text" class="form-control" id="SanPhamID" name="SanPhamID" value="0" hidden />
                                    <input type="text" class="form-control" id="AnhDaiDien" name="AnhDaiDien" value="" hidden />

                                </div>
                                <div class="col-12"></label>
                                    <label><b>Giá bán</b> <span class="text-danger"> (*)</span></label>
                                    <input type="text" class="form-control" id="GiaBan" name="GiaBan" placeholder="Nhập giá bán" />
                                </div>
                                <div class="col-12">
                                    <label><b>Số lượng</b><span class="text-danger"> (*)</span></label>
                                    <input type="number" class="form-control" id="SoLuong" name="SoLuong" placeholder="Nhập tên sản phẩm" />
                                </div>
                                <div class="col-12">
                                    <label><b>Hạn sử dụng</b></label>
                                    <input type="date" class="form-control" id="HanSuDung" name="HanSuDung" placeholder="Nhập hạn sử dụng" />
                                </div>
                                <div class="col-12">
                                    <label><b>Hàm lượng</b> <span class="text-danger"> (*)</span></label>
                                    <input type="text" class="form-control" id="HamLuong" name="HamLuong" placeholder="Hàm lượng" />
                                </div>
                                <div class="col-12">
                                    <label><b>Hoạt chất</b> <span class="text-danger"> (*)</span></label>
                                    <input type="text" class="form-control" id="HoatChat" name="HoatChat" placeholder="Hoạt chất" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="col-md-12" style="text-align: center;">
                                    <label><b>Ảnh đại diện</b><span class="text-danger"> (*)</span></label></label>
                                    <img class="profile-user-img img-avatar img img-responsive img-thumbnail0 img-fluid img-input" id="img_thumb" src="../image/defaul.png" name="" alt="avatar" style="height: 250px; width: 430px" />
                                    <div class="file"><label for="chooseFile" style="color: #f1f1f1;background: #006b39;">
                                            Upload ảnh &nbsp;<i class="fa fa-upload"></i></label>
                                        <input name="chooseFile" type="file" id="chooseFile">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label><b>Kiểu bán</b></label>
                                    <select class="form-control" name="KieuBanID">
                                        <?php
                                        $kieuban = $nt->DanhSachKieuBan();
                                        while ($res_kb = $kieuban->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $res_kb['KieuBanId'] ?>"><?php echo $res_kb['TenKieuBan'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label><b>Nhà cung cấp</b></label>
                                    <select class="form-control" name="NhaCungCapID">
                                        <?php
                                        $nhacungcap = $nt->DanhSachNhaCungCap();
                                        while ($res_ncc = $nhacungcap->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $res_ncc['NhaThuocID'] ?>"><?php echo $res_ncc['TenNhaThuoc'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label><b>Thể loại</b></label>
                        <select class="form-control" name="TheLoaiID">
                            <?php
                            $theloai = $nt->DanhSachTheLoai();
                            while ($res = $theloai->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $res['TheLoaiID'] ?>"><?php echo $res['TenTheLoai'] ?></option>

                            <?php } ?>
                        </select>
                    </div>


                    <div class="col-6">
                        <label><b>Còn nợ</b> </label>
                        <input type="text" class="form-control" id="ConNo" name="ConNo" placeholder="Còn nợ" />
                    </div>

                    <div class="col-12">
                        <label><b>Chi tiết</b></label>
                        <textarea class="form-control ckeditor" name="ChiTiet">
                            </textarea>
                    </div>
                    <input type="text" class="form-control" id="SanPham" name="SanPham" value="SanPham" hidden />
                    <input type="text" class="form-control" id="NguoiTao" name="NguoiTao" value="<?php echo $_SESSION['NguoiDungID'] ?>" hidden />
                    <input type="text" class="form-control" id="TenNguoiNhap" name="TenNguoiNhap" value="<?php echo $_SESSION['HoTen'] ?>" hidden />
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
    $("#GiaNhap").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        $(this).val(n.toLocaleString());
    });
    $("#GiaBan").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        $(this).val(n.toLocaleString());
    });

    $("#ConNo").on('keyup', function() {
        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
        $(this).val(n.toLocaleString());
    });

    function GhiLai(e) {
        if ($("#SoLuong").val() <= 0) {
            toastr.error("Số lượng sản phẩm phải là các số lớn hơn 0")
            return false;
        }
        if ($("#GiaNhap").val().replace(/\D/g, ''), 10 <= 0) {
            toastr.error("Giá nhập sản phẩm phải là các số lớn hơn 0")
            return false;
        }
        if ($("#GiaBan").val().replace(/\D/g, ''), 10 <= 0) {
            toastr.error("Giá bán sản phẩm phải là các số lớn hơn 0")
            return false;
        }
        $form = $(e).closest('form')
        if ($form.valid()) {

            var form_data = new FormData($form[0]);
            if ($("#chooseFile") != "") {
                var fileAnh = $("#chooseFile")[0].files[0];
            }
            if (fileAnh != undefined) {
                form_data.append("file", fileAnh);
            };

            form_data.append('ChiTiet', CKEDITOR.instances['ChiTiet'].getData());
            form_data.append('GiaNhap', parseInt($("#GiaNhap").val().replace(/\D/g, ''), 10));
            form_data.append('GiaBan', parseInt($("#GiaBan").val().replace(/\D/g, ''), 10));
            form_data.append('ConNo', parseInt($("#ConNo").val().replace(/\D/g, ''), 10));
            $.ajax({
                url: "../../service/insertOrUpdate_Product.php",
                method: "POST",
                data: form_data,
                dataType: 'text',
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == -1) {
                        toastr.error("Tên sản phẩm đã được sử dụng, vui lòng chọn một tên khác.")

                    } else if (data == 1) {
                        toastr.success("Đã lưu sản phẩm")
                        $('#dialogSanPham').modal('hide');
                        load_danhsach_sanpham();
                    }

                    console.log(data);
                },
                error: function() {
                    console.log("bug")
                }
            });
        }

    };

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img_thumb').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#chooseFile").change(function() {
        readURL(this);
    });

    CKEDITOR.replace('ChiTiet');
</script>