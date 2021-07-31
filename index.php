<?php
include 'inc/header.php';
?>

<div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Trang chủ bán hàng -->
          <div class="col-lg-8">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>John Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-success">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Alexander Pierce</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-warning">Pending</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Bob Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-primary">Approved</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Mike Doe</td>
                      <td>11-7-2014</td>
                      <td><span class="tag tag-danger">Denied</span></td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              </div>
          </div>
          <div class="col-lg-4" >
            <div class="card" style="padding: 15px;">
                <div class="row">
                    <div class="col-md-6">
                        <i class="fas fa-user"></i> <span>Nguyễn Văn A</span>
                    </div>
                    <div class="col-md-3">
                      <i class="fas fa-calendar-alt"></i> <span>20/1/2020</span>
                  </div>
                  <div class="col-md-3">
                    <i class="fas fa-clock"></i> <span>10 : 30</span>
                </div>
            </div>
            <div class="row mt-4" style="padding: 5px;">
              <div class="col-md-12">
                <div class="input-group">
                  <input type="search" class="form-control" placeholder="Tìm kiếm khách hàng">
                  <div class="input-group-append">
                      <button title="Thêm khách hàng" type="submit" class="btn btn-default">
                          <i class="fa fa-plus"></i>
                      </button>
                  </div>
              </div>
          </div>
        </div>
        <div class="row mt-4" style="padding: 5px;">
          <div class="col-12 col-sm-12">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Hóa đơn</a>
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
                                <label>Tổng tiền hàng  <a class="btn btn-app" style="border: none">
                                  <span class="badge bg-purple">891</span>
                                  <i class="fas fa-cart-plus"></i>
                                </a>
                              </label>
                              </div>
                              <div class="col-md-12">
                                <label>Giảm giá</label>
                              </div>
                              <div class="col-md-12">
                                <label style="text-decoration: underline;">Khách cần trả</label>
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
                          <div class="col-md-6">
                              <div class="row" style="float: right;">
                                <div class="col-md-12 mt-3" style="float: right;">
                                  <label>1.000.000 </label>
                                </div>
                                <div class="col-md-12 mt-3">
                                  <label>1.000.000 </label>
                                </div>
                                <div class="col-md-12 mt-3">
                                  <label style="color: green">1.000.000 </label>
                                </div>
                                <div class="col-md-12">
                                  <input class="form-control effect-1" style="border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;" />
                                </div>
                                <div class="col-md-12 mt-3">
                                  <label>1.000.000 </label>
                                </div>
                                <div class="col-md-12">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text" style="background: none; border: none"><i class="fas fa-pen"></i></span>
                                    </div>
                                    <textarea class="form-control effect-1" style="border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;"></textarea>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="row mt-2" style="border-top: 1px solid #bbcada;">
                      </div>
                      <div class="row mt-2">
                          <button style="width: 100%;" class="btn btn-success" type="button" > <i class="fas fa-comment-dollar"></i> Thanh toán</button>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                              <label>Tổng tiền hàng  <a class="btn btn-app" style="border: none">
                                <span class="badge bg-purple">891</span>
                                <i class="fas fa-cart-plus"></i>
                              </a>
                            </label>
                            </div>
                            <div class="col-md-12">
                              <label>Giảm giá</label>
                            </div>
                            <div class="col-md-12">
                              <label style="text-decoration: underline;">Khách cần trả</label>
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
                        <div class="col-md-6">
                            <div class="row" style="float: right;">
                              <div class="col-md-12 mt-3" style="float: right;">
                                <label>1.000.000 </label>
                              </div>
                              <div class="col-md-12 mt-3">
                                <label>1.000.000 </label>
                              </div>
                              <div class="col-md-12 mt-3">
                                <label style="color: green">1.000.000 </label>
                              </div>
                              <div class="col-md-12">
                                <input class="form-control effect-1" style="border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;" />
                              </div>
                              <div class="col-md-12 mt-3">
                                <label>1.000.000 </label>
                              </div>
                              <div class="col-md-12">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text" style="background: none; border: none"><i class="fas fa-pen"></i></span>
                                  </div>
                                  <textarea class="form-control effect-1" style="border: 0; padding: 7px 0; border-bottom: 1px solid #ccc;"></textarea>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2" style="border-top: 1px solid #bbcada;">
                    </div>
                    <div class="row mt-2">
                        <button style="width: 100%;" class="btn btn-success" type="button" > <i class="fas fa-comment-dollar"></i> Đặt hàng</button>
                    </div>
                </div>                  </div>                 
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
include 'inc/footer.php'
?>