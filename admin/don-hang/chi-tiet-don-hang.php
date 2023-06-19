<style>
    .un-success {
        opacity: 0.22 !important;
        cursor :not-allowed !important;
    }
    .un-success a {
        cursor: not-allowed !important;
    }

    .over-layer {
        display: none;
        background: rgba(0, 0, 0, 0.71);
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100vw;
        height: 100vh;
        z-index: 998;
    }

    .address-custum {
        display: none;
        box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px !important;
        background-color: white !important;
        width: 400px !important;

        position: fixed !important;
        left: 50% !important;
        top: 50% !important;
        transform: translate(-50%, -50%) !important;
        z-index: 999 !important;

    }
</style>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-12">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Chi tiết Đơn hàng anh "<?= $dataItem["name"] ?>"</h3>
                    </div>


                    <div class="over-layer">

                    </div>
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1>Thống kê tiến trình đơn hàng</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Timeline</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>


                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">

                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User profile picture">
                                            </div>


                                            <h3 class="profile-username text-center name"><?= $dataItem["name"] ?> </h3>

                                            <p class="text-muted text-center   number"><?= $dataItem["phone_number"] ?></p>

                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <b>Tạm tính</b> <a class="float-right get-total"><?= currency_format($dataItem["total"]) ?>đ</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Địa chỉ</b> <a class="float-right address-change-ajax"><?= $dataItem["address_detail"] ?> <i data-edit="address-detail" class="address-change fas fa-eraser"></i>
                                                    </a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Ghi chú</b> <a class="float-right"><?= $dataItem["note"] ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Mã giảm giá</b> <a class="float-right">0đ</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Phí vận chuyển</b> <a class="float-right transport-change-ajax">
                                                        0đ</a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Ngày đặt hàng</b> <a class="float-right"><?= $dataItem["created_at"] ?></a>
                                                </li>
                                                <li class="list-group-item">
                                                    <b>Tổng tiền</b> <a class="float-right total"><?= currency_format($dataItem["total"]) ?>đ</a>
                                                </li>
                                            </ul>

                                            <a href="index.php?btn_list_hh&order=<?= $dataItem['id'] ?>" class="btn btn-primary btn-block"><b>Xem chi tiết đơn hàng</b></a>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- The time line -->

                                </div>
                                <div class="col-lg-6">

                                    
                                    <div class="timeline">
                                       
                                        <div class="time-label">
                                            <span class="bg-red">Bắt đầu</span>
                                        </div>
                                      
                                        <div class="slider-5 <?= $dataItem["active"] == 0 ? 'un-success' : '' ?>">
                                            <i class="far fa-comments bg-dark"></i>
                                            <div class="timeline-item ">
                                                <span class="time time-1"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                                <h3 class="timeline-header timeline-header-1"><a href="#">Đã tiếp nhận đơn hàng</a> Bộ
                                                    phận
                                                    chăm sóc khách hàng </h3>
                                                <div class="timeline-body timeline-1">
                                                </div>
                                                <div class="timeline-footer">


                                                    <?= $dataItem['active'] < 6 ? '<a  class=" btn btn-success btn-sm">Đã xác nhận</a>' : '<a data-active="5" class="set-success btn btn-danger btn-sm">Xác nhận</a>' ?>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div class="slider-4 <?= $dataItem["active"] >= 6 || $dataItem["active"] == 0 ? 'un-success' : '' ?>">
                                            <i class="fas fa-home bg-danger"></i>
                                            <div class="timeline-item ">
                                                <span class="time time-2"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                                <h3 class="timeline-header timeline-header timeline-header-2"><a href="#">Đã rời khỏi
                                                        kho</a> Bộ phận quản lý kho</h3>
                                                <div class="timeline-body timeline-2">
                                                </div>
                                                <div class="timeline-footer">
                                                    <?= $dataItem['active'] >= 5 ? '<a data-active="4" class="set-success btn btn-danger btn-sm">Xác nhận</a>' : '<a class="btn btn-success btn-sm">Đã xác nhận</a>' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="slider-3 <?= $dataItem["active"] >= 5 || $dataItem["active"] == 0 ? 'un-success' : '' ?>">
                                            <i class="fas fa-ambulance bg-warning"></i>
                                            <div class="timeline-item ">
                                                <span class="time time-3"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                                <h3 class="timeline-header timeline-header timeline-header-3"><a href="#">Đang vận
                                                        chuyển</a>
                                                    Bộ phận vận chuyển </h3>
                                                <div class="timeline-body timeline-3">
                                                </div>
                                                <div class="timeline-footer">
                                                    <?= $dataItem['active'] >= 4 ? '<a data-active="3" class="set-success btn btn-danger btn-sm">Xác nhận</a>' : '<a class="btn btn-success btn-sm">Đã xác nhận</a>' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->

                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-green">Tiếp cận</span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div class="slider-2 <?= $dataItem["active"] >= 4 || $dataItem["active"] == 0 ? 'un-success' : '' ?>">
                                            <i class="fas fa-map-marker-alt bg-cyan"></i>
                                            <div class="timeline-item ">
                                                <span class="time time-4"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                                <h3 class="timeline-header timeline-header timeline-header-4"><a href="#">Đã đến
                                                        nơi</a> Bộ
                                                    phận vận chuyển </h3>
                                                <div class="timeline-body timeline-4">
                                                </div>
                                                <div class="timeline-footer">
                                                    <?= $dataItem['active'] >= 3 ? '<a data-active="2" class="set-success btn btn-danger btn-sm">Xác nhận</a>' : '<a class="btn btn-success btn-sm">Đã xác nhận</a>' ?>
                                                </div>
                                            </div>
                                        </div>

                                    
                                        <div class="slider-1 <?= $dataItem["active"] >= 3 || $dataItem["active"] == 0 ? 'un-success' : '' ?>">
                                            <i class="fas fa-tasks bg-success"></i>
                                            <div class="timeline-item ">
                                                <span class="time time-5"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                                <h3 class="timeline-header timeline-header timeline-header-5"><a href="#">Hoàn
                                                        thành</a> Bộ
                                                    phận vận chuyển</h3>
                                                <div class="timeline-body timeline-5">
                                                </div>
                                                <div class="timeline-footer">
                                                    <?= $dataItem['active'] >= 2 ? '<a data-active="1" class="set-success btn btn-danger btn-sm">Xác nhận</a>' : '<a class="btn btn-success btn-sm">Đã xác nhận</a>' ?>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="slider-6 ">
                                            <i class="far fa-frown bg-dark"></i>
                                            <div class="timeline-item ">
                                                <span class="time time-6"><i class="fas fa-clock"></i> Chưa xác nhận</span>
                                                <h3 class="timeline-header timeline-header-6"><a href="#">Hủy đơn hàng</a> Toàn nhân viên
                                                </h3>

                                                <div class="timeline-footer">

                                                    <?= $dataItem['active'] == 0 ? '<a data-active="0" class="success-6 btn btn-dark btn-sm submit">Đã hủy</a>' : ' <a data-active="0" class="set-success success-6 btn btn-dark btn-sm submit">Xác nhận</a>' ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                               
                            </div>
                        </div>
                       

                    </section>
                    

                </div>


            </div>
        </div>
    </div>
</section>








<script>
    $(document).on("click", ".set-success", function() {
        var that = this;
        var url = new URL(window.location.href);


        var order_id = url.searchParams.get("order");
        var dataActive = ($(this).attr("data-active"));

        $.ajax({
                method: "POST",
                url: "index.php?btn_change_active",
                data: {
                    active: dataActive,
                    order_id: order_id
                }
            })
            .done(function(msg) {
                msg = JSON.parse(msg);
                console.log(msg)
                if (msg.status == 'success') {
                    $(that).text('Đã xác nhận');
                    $(that).removeClass('set-success btn-danger');
                    $(that).addClass('btn-success');

                    $('.slider-' + (dataActive - 1)).removeClass('un-success');
                } else {
                    alert('Xác nhận không hợp lệ');
                }
            });


    });
</script>