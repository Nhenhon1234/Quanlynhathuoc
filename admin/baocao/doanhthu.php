<?php
include '../../inc/header.php';
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <h3>Báo cáo doanh thu</h3>
            </div>
            <div class="row mb-2">
               <div class="col-md-5">
               <label><b>Từ ngày</b> <span class="text-danger"> (*)</span></label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control" id="TuNgay" placeholder="dd-mm-yyyy">                   
                    </div>
               </div>
               <div class="col-md-5">
                <label><b>Đến ngày</b> <span class="text-danger"> (*)</span></label>
               <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control" id="DenNgay" placeholder="Đến ngày"placeholder="dd-mm-yyyy" >                       
                    </div>
               </div>
               <div class="col-md-2">
                    <button class="btn btn-success" style="margin-top: 13%;" type="button" onclick="load_dsDoanhThu()"><i class="fas fa-eye"></i>  Xem</button>
               </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="baocao">

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
    function load_dsDoanhThu() {
        $.ajax({
            url: "_danhsachdoanhthu.php",
            data: {
                TuNgay: $("#TuNgay").val(),
                DenNgay: $("#DenNgay").val(),
                NguoiDungID : null
            },
            method: "GET",
            success: function(data) {
                debugger
                $('#baocao').html(data);
            }
        });
    }
   /*  $('#TuNgay').datetimepicker({
        format: 'DD/MM/YYYY',
        maxDate: 'now'
    });
    $('#DenNgay').datetimepicker({
        format: 'DD/MM/YYYY',
        minDate: 'now'
    }); */
    function XuatExcel() {  
            $("#tbl_doanhthu").table2excel({  
                exclude: ".excludeThisClass",
                name: "Báo cáo tổng hợp",  
                filename: "Báo cáo tổng hợp doanh thu",  
                fileext: ".xls" ,
                exclude_img: true,
                exclude_links: true,
                exclude_inputs: true,
                preserveColors: false
            });  
        }   
</script>