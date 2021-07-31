<?php
include '../../inc/header.php';
include '../../service/sanpham.php';

?>
<?php
$nt = new SanPham();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Thống kê số lượng sản phẩm đã bán trong kho</h3>
            </div>
            <div class="row mb-2">
            <div class="col-md-6">
                    <label><b>Chọn sản phẩm</b></label>
                    <select class="form-control" id="dsSanPham">
                        <option value="0">Chọn sản phẩm</option>
                        <?php
                        $sanpham = $nt->DanhSachSanPham_Search();
                        if ($sanpham) {
                            $i = 0;
                            while ($result = $sanpham->fetch_assoc()) {
                                $i++;
                        ?>
                            <option value="<?php echo $result['SanPhamID'] ?>"><?php echo $result['TenSanPham'] ?></option>
                        <?php 
                            }
                        }
                        ?>
                       
                </select>
            </div>        
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="sanpham_daban">

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
    function load_danhsach_sanpham(id) {
        $.ajax({
            url: "_listsanpham.php",
            dataType: "html",
            data: {
                id : id,
                TuNgay: $("#TuNgay").val(),
                DenNgay : $("#DenNgay").val()
            },
            method: "GET",
            success: function(data) {
                $('#sanpham_daban').html(data);
            }
        });
    }
    load_danhsach_sanpham(0);
    $('#dsSanPham').on('change', function() {
        load_danhsach_sanpham($("#dsSanPham").val())
    });
</script>