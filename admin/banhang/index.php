<!-- Main content -->
<?php
include '../../inc/header.php';
?>
<?php
include '../../service/canhbao.php';
?>
<?php
$nt = new CanhBao();
?>
<style>
    .dx-header-row {
        background-color: #006b39;
        color: #f1f1f1;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="row">
                        <marquee scrollamount="10">
                            <?php $loaithuoc = $nt->DanhSachTrangChu();
                            if ($loaithuoc) {
                                while ($result = $loaithuoc->fetch_assoc()) {
                            ?>
                                    <h3 style="color:#006b39"><?php echo $result['TenTinTuc']  ?> </h3> <?php echo $result['NoiDung']  ?> ||
                            <?php }
                            } ?>
                        </marquee>
                    </div>
                    <div class="col-md-12">
                        <input class="form-control" id="DanhSachSanPham" value="Chọn thuốc cần bán" />
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Trang chủ bán hàng -->
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body table-responsive p-0" id="gridSanPham">
                            </div>
                        </div>
                    </div>
                    <?php $dateNow = date('d-m-Y ');
                    ?>
                    <div class="col-lg-4">
                        <div class="card" style="padding: 15px;">
                            <div class="row">
                                <div class="col-md-4">
                                    <i class="fas fa-user"></i> <span><?php echo $_SESSION['HoTen'] ?></span>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-calendar-alt"></i> <span><?php echo $dateNow ?></span>
                                </div>
                                <div class="col-md-4">
                                    <i class="fas fa-clock"></i> <span id="time_now"></span>
                                </div>
                            </div>
                            <div class="row mt-4" style="padding: 5px;" id="load_khachhang">

                            </div>
                            <div class="row mt-4" style="padding: 5px;">
                                <div class="col-12 col-sm-12">
                                    <div class="card card-primary card-tabs">
                                        <div class="card-header p-0 pt-1">
                                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Hóa
                                                        đơn</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Đặt hàng</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="card-body">
                                            <div class="tab-content" id="custom-tabs-one-tabContent">
                                                <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Tổng tiền
                                                                    </label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label>Giảm giá</label>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <label style="text-decoration: underline;">Khách cần
                                                                        trả</label>
                                                                </div>
                                                                <div class="col-md-12 mt-6">
                                                                    <label>Khách đưa</label>
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label>Tiền thừa</label>
                                                                </div>
                                                                <div class="col-md-12 mt-3">
                                                                    <label>Ghi chú</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6" id="cart_des">

                                                        </div>
                                                    </div>
                                                    <div class="row mt-2" style="border-top: 1px solid #bbcada;">
                                                    </div>
                                                    <div class="row mt-2">
                                                        <button style="width: 100%;" class="btn btn-success" type="button" onclick="ThanhToan()"> <i class="fas fa-comment-dollar"></i> Thanh toán</button>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                                    <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <label>Tổng tiền
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label>Giảm giá</label>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label style="text-decoration: underline;">Khách
                                                                            cần trả</label>
                                                                    </div>
                                                                    <div class="col-md-12 mt-6">
                                                                        <label>Khách đưa</label>
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label>Tiền thừa</label>
                                                                    </div>
                                                                    <div class="col-md-12 mt-3">
                                                                        <label>Ghi chú</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id="cart_dathang">

                                                            </div>
                                                        </div>
                                                        <div class="row mt-2" style="border-top: 1px solid #bbcada;">
                                                        </div>
                                                        <div class="row mt-2">
                                                            <button style="width: 100%;" class="btn btn-success" type="button"> <i class="fas fa-comment-dollar"></i> Đặt
                                                                hàng</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
            <?php
            include '../../inc/footer.php'
            ?>
            <script>
                $(document).ready(function() {
                    var isCheckSoLuongSanPham = true
                    load_danhsach_sanpham();

                    function load_danhsach_sanpham() {
                        $.ajax({
                            url: "../../service/danhsachsanpham.php",
                            dataType: "JSON",
                            method: "GET",
                            success: function(data) {
                                $('#DanhSachSanPham').inputpicker({
                                    data: data,
                                    fields: [{
                                            name: 'id',
                                            text: 'ID sản phẩm'
                                        },
                                        {
                                            name: 'TenSanPham',
                                            text: 'Tên sản phẩm'
                                        },
                                        {
                                            name: 'DonGia',
                                            text: 'Đơn giá'
                                        },
                                        {
                                            name: 'KieuBan',
                                            text: 'Kiểu bán'
                                        },
                                        {
                                            name: 'TonKho',
                                            text: 'Tồn kho'
                                        },
                                        {
                                            name: 'AnhDaiDien',
                                            text: 'Ảnh'
                                        },
                                    ],
                                    autoOpen: true,
                                    headShow: true,
                                    fieldText: 'TenSanPham',
                                    fieldValue: 'TenSanPham'
                                });
                            }
                        });
                    }
                })
                let object_input_CheckName;
                (function() {
                    function checkTime(i) {
                        return (i < 10) ? "0" + i : i;
                    }

                    function startTime() {
                        var today = new Date(),
                            h = checkTime(today.getHours()),
                            m = checkTime(today.getMinutes()),
                            s = checkTime(today.getSeconds());
                        document.getElementById('time_now').innerHTML = h + ":" + m + ":" + s;
                        t = setTimeout(function() {
                            startTime()
                        }, 500);
                    }
                    startTime();
                })();




                function loadGridSanPham(data) {
                    localStorage.setItem("arrData_check", JSON.stringify(data))
                    gridthuocphanhoi = $('#gridSanPham').dxDataGrid({
                        dataSource: data,
                        allowColumnReordering: true,
                        allowColumnResizing: true,
                        columnAutoWidth: true,
                        columnChooser: {
                            enabled: true,
                            mode: "dragAndDrop" // or "select"
                        },
                        columnFixing: {
                            enabled: true
                        },
                        showBorders: true,
                        paging: {
                            pageSize: 10
                        },
                        pager: {
                            showPageSizeSelector: true,
                            allowedPageSizes: [10, 25, 50, 100]
                        },
                        showColumnLines: true,
                        showRowLines: true,
                        filterRow: {
                            visible: true,
                            applyFilter: "auto"
                        },
                        selection: {
                            mode: "single"
                        },
                        onToolbarPreparing: function (e) {  
                            debugger
                            var toolbarItems = e.toolbarOptions.items;  
                            $.each(toolbarItems, function(_, item) {  
                                if(item.name === "saveButton") {  
                                    item.options.onClick = function (e) {  
                                        $("#gridSanPham").dxDataGrid('instance').saveEditData()
                                        TongTien()
                                        
                                    }  
                                }  
                            });  
                        }  ,
                        editing: {
                            mode: "batch",
                            allowUpdating: true,

                            onContentReady: function(e) {
                                var buttons = e.component.content().parent().find(".dx-button");

                                buttons.eq(0).dxButton("instance").on("click", function() {
                                    DevExpress.ui.notify("Custom logic goes here", "success", 1000)
                                });
                            }
                        },
                        remoteOperations: true,
                        repaintChangesOnly: true,
                        columns: [{
                                dataField: 'id',
                                caption: 'ID thuốc',
                                alignment: "center",
                                width: "5%"
                            },
                            {
                                dataField: 'TenSanPham',
                                caption: 'Tên thuốc',
                                allowEditing: false,
                                alignment: "center",
                                width: "15%"
                            },
                            {
                                dataField: "DonGia",
                                caption: "Đơn giá",
                                allowEditing: false,
                                width: "10%"


                            },
                            {
                                dataField: "KieuBan",
                                caption: "Kiêu bán",
                                allowEditing: false,
                                width: "10%"
                            },
                            {
                                dataField: "TonKho",
                                caption: "Tồn kho",
                                allowEditing: false,
                                width: "10%"
                            },
                            {
                                dataField: "AnhDaiDien",
                                caption: "Ảnh đại diện",
                                cellTemplate: function(container, options) {
                                    var html = '<img style="width: 100%;height:150px" src=' + options.data
                                        .AnhDaiDien + ' />';
                                    $(html).appendTo(container);
                                }
                            },
                            {
                                dataField: 'SoLuong',
                                caption: 'Số lượng',
                                width: "10%",
                                allowEditing: true,
                                validationRules: [{
                                    type: "required",
                                    "datafield": "NumberParent"
                                }],
                            },
                            {
                                dataField: '',
                                caption: 'Thao tác',
                                allowEditing: false,
                                alignment: "center",
                                allowFiltering: false,
                                allowSearch: false,
                                allowSorting: false,
                                cellTemplate: function(container, options) {
                                    if (options && options.data) {
                                        $('<a href="javascript:" title="Xóa" class="text-blue"><i class=\"fas fa-times\"></i></a>')
                                            .on('click', function(e) {
                                                MEETINGDETAIL_DELETE_Row(options.rowIndex);
                                            }).appendTo(container);
                                    }
                                },
                                width: '5%'
                            }
                        ],
                        onEditorPreparing: function(e) {
                            if (e.parentType == 'dataRow' && e.dataField == 'SoLuong') {
                                e.editorOptions.onValueChanged = function(a) {
                                    debugger
                                    e.component.cellValue(e.row.rowIndex, "SoLuong", a.value);
                                    
                                }
                            }
                        }

                    }).dxDataGrid('instance');
                }
                var data = [];
                $('#DanhSachSanPham').change(function(input) {
                    var isCheck = true
                    object_input_CheckName = $('#DanhSachSanPham').inputpicker("element", $('#DanhSachSanPham').val())
                    var object_input = $('#DanhSachSanPham').inputpicker("element", $('#DanhSachSanPham').val())
                    if (object_input.TonKho <= 0) {
                        toastr.error("Sản phẩm " + object_input.TenSanPham + " đã hết. Vui lòng nhập thêm sản phẩm")
                        return false;
                    }
                    // if(data.length > 0){
                    // for (var i = 0; i < data.length; i++) {
                    //     if(data[i].TonKho < 0){
                    //     toastr.error("Sản phẩm "+ data[i].TenSanPham +"Số lượng không là các số lớn hơn 0")
                    //     break;
                    //     }
                    // }
                    if (data.length > 0) {
                        var arr_dx = $("#gridSanPham").dxDataGrid("getDataSource").items()
                        for (var item = 0; item < arr_dx.length; item++) {
                            if (data[item].id == object_input.id) {
                                isCheck = false
                                break;
                            }
                        }
                    }

                    if (isCheck == true) {
                        object_input['SoLuong'] = 1
                        object_input.DonGia = object_input.DonGia.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")
                        data.push(object_input)
                        loadGridSanPham(data)
                        TongTien()

                    } else {
                        toastr.error("Sản phẩm này đã được chọn")
                        TongTien()
                    }

                })


                function TongTien() {
                    var tongtien = 0;
                    var tienphaitra = 0;
                    var khachdua = 0;

                    for (var i = 0; i < data.length; i++) {
                        if (data[i].SoLuong < 0) {
                            toastr.error("Số lượng không là các số lớn hơn 0")
                        }
                        if (data[i].SoLuong > object_input_CheckName.TonKho) {
                            debugger
                            toastr.error("Số lượng sản phẩm " + object_input_CheckName.TenSanPham + " không đủ để bán")
                            isCheckSoLuongSanPham = false
                            tongtien += parseInt(parseInt(data[i].DonGia.replace(/\D/g, ''), 10) * data[i].SoLuong);
                            tienphaitra += parseInt(parseInt(data[i].DonGia.replace(/\D/g, ''), 10) * data[i].SoLuong)
                            khachdua += parseInt(data[i].DonGia)
                        } else
                         if (data[i].SoLuong != undefined) {
                            tongtien += parseInt(parseInt(data[i].DonGia.replace(/\D/g, ''), 10) * data[i].SoLuong);
                            tienphaitra += parseInt(parseInt(data[i].DonGia.replace(/\D/g, ''), 10) * data[i].SoLuong)
                            khachdua += parseInt(data[i].DonGia)
                            isCheckSoLuongSanPham = true

                        } else {
                            tongtien += parseInt(parseInt(data[i].DonGia.replace(/\D/g, ''), 10));
                            tienphaitra += parseInt(parseInt(data[i].DonGia.replace(/\D/g, ''), 10))
                            khachdua += parseInt(parseInt(data[i].DonGia.replace(/\D/g, ''), 10))
                            isCheckSoLuongSanPham = true
                        }

                    }

                    var html = `<div class="row" style="float: right;">
                                <div class="col-md-12" style="float: right;">
                                  <label>${tongtien.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")}</label>
                                </div>   
                                <div class="col-md-12" style="float: right;">
                                <input class="form-control effect-1" id="GiamGia" value="0" name="GiamGia" style="border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;" />
                                </div>                           
                                <div class="col-md-12">
                                  <label style="color: green" id="TienPhaiTra">${tienphaitra.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.")} </label>
                                </div>
                                <div class="col-md-12">
                                  <input class="form-control effect-1" name="KhachDua" id="KhachDua" style="border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;" />
                                </div>
                                <div class="col-md-12">
                                <label style="color: green" id="TienThua_Text">0</label>
                                </div>
                                <div class="col-md-12">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="background: none; border: none"><i class="fas fa-pen"></i></span>
                                    </div>
                                    <textarea class="form-control" id="ChuThich" effect-1" style="border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;"></textarea>
                                  </div>
                                </div>
                              </div>`;
                    $("#cart_des").html(html);
                    $("#cart_dathang").html(html);
                    $("#GiamGia").on('keyup', function() {
                        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
                        $(this).val(n.toLocaleString());
                    });
                    $("#KhachDua").on('keyup', function() {
                        var n = parseInt($(this).val().replace(/\D/g, ''), 10);
                        $(this).val(n.toLocaleString());
                    });
                    var tienthua = 0;
                    $('input[name=KhachDua]').change(function() {
                        var giamgia = parseInt($("#GiamGia").val().replace(/\D/g, ''), 10)
                        tienthua *= 0
                        tienthua += ($("#KhachDua").val().replace(/\D/g, '') - tongtien) + giamgia
                        $("#TienThua_Text").text(tienthua.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                    });

                    $('input[name=GiamGia]').change(function() {
                        var giamgia = parseInt($("#GiamGia").val().replace(/\D/g, ''), 10)
                        tienthua *= 0
                        tienthua += giamgia
                        if($("#KhachDua").val().replace(/\D/g, '') > 0){
                            tienthua = ($("#KhachDua").val().replace(/\D/g, '') - tongtien) + giamgia
                            $("#TienThua_Text").text(tienthua.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))
                        }else{
                            $("#TienThua_Text").text(tienthua.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1."))

                        }
                    });
                }
                TongTien()
                function MEETINGDETAIL_DELETE_Row(rowIndex) {
                    $("#gridSanPham").dxDataGrid('instance').removeRow(rowIndex);
                    $("#gridSanPham").dxDataGrid('instance').saveEditData();
                    TongTien()
                }
                function ThanhToan() {
                    if(isCheckSoLuongSanPham){
                        var arr_sp = []
                    var grid = gridthuocphanhoi.getDataSource().items()
                    var tongThietHai = 0;
                    var tongtien = 0;
                    var tienphaitra = 0;
                    var khachdua = 0;
                    for (var i = 0; i < grid.length; i++) {
                        var element_SP = {}
                        tongtien += parseInt(grid[i].DonGia.replace(/\D/g, ''), 10 * grid[i].SoLuong);
                        tienphaitra += parseInt(grid[i].DonGia.replace(/\D/g, ''), 10 * grid[i].SoLuong)
                        khachdua += parseInt(grid[i].DonGia.replace(/\D/g, ''), 10)
                        element_SP.SanPhamID = grid[i].id;
                        element_SP.TenSanPham = grid[i].TenSanPham;
                        element_SP.DonGia = parseInt(grid[i].DonGia.replace(/\D/g, ''), 10);
                        element_SP.ThanhTien = tongtien;
                        element_SP.ChuThich = $("#ChuThich").val();
                        element_SP.TenDonHang = grid[i].TenSanPham;
                        element_SP.SoLuong = parseInt(grid[i].SoLuong);
                        tongThietHai += tongtien
                        arr_sp.push(element_SP)
                    }
                    console.log(arr_sp)
                    $.ajax({
                        url: "_thanhtoan.php",
                        dataType: "html",
                        async: true,
                        success: function(data) {
                            var $popup = mac.showDialog({
                                id: 'dialogThanhToan',
                                content: data,
                                width: 800
                            });

                            localStorage.setItem("arrThanhToan", null)
                            localStorage.setItem('arrThanhToan', JSON.stringify(arr_sp));
                            $("#TongThietHai").val((parseInt($("#TienPhaiTra").text().replace(/\D/g, ''), 10) - parseInt($("#GiamGia").val().replace(/\D/g, ''), 10)).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'))
                            $("#TongTien").val(parseInt($("#TienPhaiTra").text().replace(/\D/g, ''), 10) - parseInt($("#GiamGia").val().replace(/\D/g, ''), 10))
                            if ($("#KhachHangID").val() > 0) {
                                $("#KhachHangID").val($("#KhachHangID").val())
                                $("#SoDienThoai").val($("#KhachHangID").find(':selected').data('sodienthoai' + $("#KhachHangID").val() + ''))
                                $("#DiaChi").val($("#KhachHangID").find(':selected').data('diachi' + $("#KhachHangID").val() + ''))
                                $("#HoTen").val($("#KhachHangID").select2('data')[0].text)
                                $("#SoDienThoai").prop("disabled", true)
                                $("#DiaChi").prop("disabled", true)
                                $("#HoTen").prop("disabled", true)

                            }
                            $popup.find("form").validate({
                                messages: {
                                    HoTen: {
                                        required: "Vui lòng nhập tên khách hàng"
                                    }
                                },
                                rules: {
                                    HoTen: {
                                        required: true
                                    }
                                }
                            })
                        },
                        error: function() {
                            toastr.error("Không lấy được thông tin")
                        }
                    })
                    }else{
                        toastr.error("Sản phẩm trong kho không đủ để thực hiện thanh toán này")
                    }
                    
                }

                function ThemMoiKhachHnag() {
                    $.ajax({
                        url: "_themmoikhachhang.php",
                        dataType: "html",
                        async: true,
                        success: function(data) {
                            var $popup = mac.showDialog({
                                id: 'dialogkhachhang',
                                content: data,
                                width: 800
                            });
                            $popup.find("form").validate({
                                messages: {
                                    TenKhachHang: {
                                        required: "Vui lòng nhập tên khách hàng"
                                    }
                                },
                                rules: {
                                    TenKhachHang: {
                                        required: true
                                    }
                                }
                            })
                        },
                        error: function() {
                            toastr.error("Không lấy được thông tin")
                        }
                    })
                }

                function LoadDanhSachKhachHang() {
                    $.ajax({
                        url: "_danhsachkhachhang.php",
                        dataType: "html",
                        success: function(data) {
                            $("#load_khachhang").html(data)
                        },
                        error: function() {
                            toastr.error("Không lấy được thông tin")
                        }
                    })
                }
                LoadDanhSachKhachHang()
            </script>