<?php
$totalSuccess = 0;
$totalPending = 0;
$totalCancel = 0;
$totalRevenue = 0;
  foreach($orderStatistic as $key => $value){
    if($value['active'] == 1){
        $totalSuccess = $totalSuccess + $value['total'];
    }
    if($value['active'] != 1 && $value['active'] != 0){
        $totalPending = $totalPending + $value['total'];
    }
    if($value['active'] == 0){
        $totalCancel = $totalCancel + $value['total'];
    }
    $totalRevenue = $totalRevenue + $value['total_price'];

  }
?>

<section class="content mt-3">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">DashBoard</h3>
                    </div>

                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 class="m-0">Thông tin</h1>
                                </div><!-- /.col -->
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Thông tin</li>
                                    </ol>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </div>
                    <section class="content">
                        <div class="container-fluid">
                            <!-- Small boxes (Stat box) -->
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info">
                                        <div class="inner">
                                            <h3><?=$totalSuccess?></h3>

                                            <p>Đơn hàng thành công</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="<?=$ADMIN_URL?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success">
                                        <div class="inner">
                                            <h3><?=$totalPending?><sup style="font-size: 20px"></sup></h3>

                                            <p>Số đơn hàng đang xử lý</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <a href="<?=$ADMIN_URL?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning">
                                        <div class="inner">
                                            <h3><?=currency_format($totalRevenue)?></h3>

                                            <p>Doanh thu hệ thống</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <a href="<?=$ADMIN_URL?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <h3><?=$totalCancel?></h3>

                                            <p>Số đơn hàng đã hủy</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <a href="<?=$ADMIN_URL?>/don-hang/" class="small-box-footer">Xem thêm <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>

                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-6">

                                            <!-- /.card -->

                                            <div class="card">
                                                <div class="card-header border-transparent">
                                                    <h3 class="card-title">Đơn hàng đầu tiên</h3>

                                                    <div class="card-tools">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <div class="table-responsive">
                                                        <table class="table m-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>STT</th>
                                                                    <th>Họ và tên</th>
                                                                    <th>Trạng thái</th>
                                                                    <th>Ngày</th>
                                                                    <th>Chi tiết</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            <?php
                                     foreach($orderSuggest as $key => $value){
                                    ?>
                                       <tr>
                                        <td><?=$key + 1?></td>
                                        <td><?=$value['name']?></td>
                                        <td>   <?php
                if($value['active'] == 6){
                    echo '<span class="badge badge-danger">Chưa tiếp nhận</span>';
                }
                if($value['active'] == 5){
                    echo '<span class="badge badge-warning">Đã tiếp nhận</span>';
                }
                if($value['active'] == 4){
                    echo '<span class="badge badge-warning">Đã rời kho</span>';
                }
                if($value['active'] == 3){
                    echo '<span class="badge badge-danger">Đang vận chuyển</span>';
                }
                if($value['active'] == 2){
                    echo '<span class="badge badge-warning">Đã đến nơi</span>';
                }
                if($value['active'] == 1){
                    echo '<span class="badge badge-success">Hoàn thành</span>';
                }
                if($value['active'] == 0){
                    echo '<span class="badge badge-dark">Đã hủy</span>';
                }
            ?></td>
                                        <td>
                                          <div class="sparkbar"><?=$value['created_at']?></div>
                                        </td>
                                        <td><a href="<?=$ADMIN_URL?>/don-hang/index.php?btn_detail&order=<?=$value['id']?>" class="btn btn-info"><i class="fas fa-eye"></i></a></td>
                                      </tr>
                                    <?php
                                     }
                                    ?>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer clearfix">
                                                    <a href="<?=$ADMIN_URL?>/don-hang" class="btn btn-sm btn-secondary float-right">Xem tất cả đơn hàng</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                        <!-- /.col-md-6 -->
                                        <div class="col-lg-6">

                                            <!-- /.card -->

                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Người dùng mới</h3>

                                                    <div class="card-tools">
                                                        <span class="badge badge-danger">Tổng 6 thành viên</span>
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">
                                                    <ul class="users-list clearfix">

                                                    <?php
                                                     foreach($userSuggest as $key => $value){
                                                    ?>
                                                             <li>
                                                            <img width="95" height="95" style="border-radius: 100%;
   width : 95px !important;
   height : 95px !important;
   object-fit: cover;" src="<?=$IMAGE_DIR_USER . $value['hinh']?>" alt="User Image">
                                                            <a class="users-list-name" href="#"><?=$value['ho_ten']?></a>
                                                            <span class="users-list-date"><?=$value['email']?></span>
                                                            <span class="users-list-date"><?=$value['vai_tro'] == 1 ? "Nhân viên": "Khách hàng"?></span>
                                                        </li>
                                                    <?php
                                                     }
                                                    ?>

                                                    

                                                    </ul>
                                                    <!-- /.users-list -->
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer text-center">
                                                    <a href="<?=$ADMIN_URL?>/khach-hang/?btn_list">Xem tất cả người dùng</a>
                                                </div>
                                                <!-- /.card-footer -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="card direct-chat direct-chat-primary">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Hỗ trợ trực tiếp</h3>
                                                            <div class="card-tools">
                                                                <span title="3 New Messages" class="badge badge-warning">New</span>
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                                                    <i class="fas fa-comments"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="card-body">

                                                            <div class="direct-chat-messages" id="chat">

                                                            </div>




                                                        </div>

                                                        <div class="card-footer">

                                                            <div class="input-group">
                                                                <input id="input-post" type="text" name="message" placeholder="Type Message ..." class="form-control">
                                                                <span class="input-group-append">
                                                                    <button type="button" class="btn btn-primary app-chat__post-comment-button">Gửi</button>
                                                                </span>
                                                            </div>

                                                        </div>

                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Sản phẩm thêm gần đây</h3>
                                                            <div class="card-tools">
                                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                                    <i class="fas fa-minus"></i>
                                                                </button>
                                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                                    <i class="fas fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="card-body p-0">
                                                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                                                

                                                              <?php foreach($productSuggest as $key => $value){ ?>

                                                                <li class="item">
                                                                    <div class="product-img">
                                                                        <img src="<?=$IMAGE_DIR_PRODUCT.$value['hinh']?>" alt="Product Image" class="img-size-50">
                                                                    </div>
                                                                    <div class="product-info">
                                                                        <a href="<?=$ADMIN_URL?>/hang-hoa/index.php?btn_edit&ma_hh=<?=$value['ma_hh']?>" class="product-title"><?=$value['ten_hh']?>
                                                                            <span class="badge badge-warning float-right"><?=currency_format($value['don_gia'])?></span></a>
                                                                        <span class="product-description">
                                                                        <?=$value['ten_loai']?>
                                                                        </span>
                                                                    </div>
                                                                </li>
                                                              <?php }?>

                                                            </ul>
                                                        </div>

                                                        <div class="card-footer text-center">
                                                            <a href="<?=$ADMIN_URL?>/hang-hoa?btn_list" class="uppercase">Xem tất cả sản phẩm</a>
                                                        </div>

                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <!-- /.col-md-6 -->
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3 class="card-title">Bình luận mới</h3>

                                                    <div class="card-tools">
                                                        <div class="input-group input-group-sm" style="width: 150px;">
                                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-default">
                                                                    <i class="fas fa-search"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.card-header -->
                                                <div class="card-body table-responsive p-0">
                                                    <table class="table table-hover text-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>STT</th>
                                                                <th>Họ và tên</th>
                                                                <th>Ngày</th>
                                                                <th>Sản phẩm</th>
                                                                <th>Nội dung</th>
                                                                <th>Trạng thái</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php foreach($commentSuggest as $key => $value){?>
                                                                <tr>
                                                                <td><?=$key + 1?></td>
                                                                <td><?=$value['ho_ten']?></td>
                                                                <td>2023-05-10 22:59:03</td>
                                                                <td><span class="tag tag-danger"><?=$value['ten_hh']?></span></td>
                                                                <td><?=$value['noi_dung']?></td>
                                                                <td><span class="badge bg-warning">Kiểm duyệt</span> </td>
                                                            </tr>
                                                            <?php } ?>
                                                            
                                                          
                                                        </tbody>

                                                    </table>
                                                   
                                                </div>
                                                <!-- /.card-body -->
                                            </div>
                                            <!-- /.card -->
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.container-fluid -->
                            </div>

                            <!-- /.row -->
                            <!-- Main row -->



                        </div>
                    </section>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row (main row) -->
</section>
<script>
    var listOnline = [];
    var idUser = <?= isset($_SESSION["user"]) ? $_SESSION["user"]['id'] : '' ?>;
    var nameUser = '<?= $_SESSION["user"]['ho_ten'] ?>';
    $(document).ready(function() {


        const myTimeout = setTimeout(myGreeting, 200);

        function myGreeting() {
            $.ajax({
                    method: "GET",
                    url: "https://blog.diaocconsole.tk/get-chat",

                })
                .done(function(msg) {
                    msg.map((value, key) => {
                        //console.log(value)
                        if (value.user_id == idUser) {
                            $('#chat').append(`<div class="direct-chat-msg right">
                                                                    <div class="direct-chat-infos clearfix">
                                                                    <span class="direct-chat-name float-right">(Bạn) ${value.name}</span>
                                                                    <span class="direct-chat-timestamp float-left">${value.createdAt}</span>
                                                                    </div>

                                                                    <img class="direct-chat-img" src="<?= $IMAGE_DIR_USER . $user['hinh'] ?>" alt="message user image">

                                                                    <div class="direct-chat-text">
                                                                     ${value.content}
                                                                    </div>

                                                            </div>`);

                        } else {
                            $('#chat').append(` <div class="direct-chat-msg">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span class="direct-chat-name float-left">${value.name}</span>
                                                                        <span class="direct-chat-timestamp float-right">${value.createdAt}</span>
                                                                    </div>

                                                                  
                                                                    <div class="direct-chat-img text-center bg-secondary pt-2 pb-2"> ${value.name[(value.name).lastIndexOf(" ") + 1]}</div>
                                                                    <div class="direct-chat-text">
                                                                    ${value.content}
                                                                    </div>

                                                                </div>`);

                        }

                    })
                    $("#chat").scrollTop($("#chat")[0].scrollHeight);


                })

        }

    });
    let host = "https://blog.diaocconsole.tk";
    let socket = io.connect(host, {
        path: '/chat/'
    });

    function postComment(value) {
        if (value !== "" && value[0] !== " ") {
            $('#input-post').val("");
            const msg = {
                name: nameUser,
                content: value,
                id: idUser,
                thumb: null
            };
            socket.emit("sendDataClient", msg);
            socket.emit("sendDataClientTyping", null);
        }

    }


    socket.emit('login', {
        userId: idUser
    });

    socket.on("sendDataServer", (item) => {

        const data = {
            thumb: item.thumb,
            name: item.name,
            content: item.content,
            user_id: item.id,
            createdAt: item.createdAt
        }
        if (data.user_id == idUser) {
            $('#chat').append(`<div class="direct-chat-msg right">
                                                                    <div class="direct-chat-infos clearfix">
                                                                    <span class="direct-chat-name float-right">(Bạn) ${data.name}</span>
                                                                    <span class="direct-chat-timestamp float-left">${data.createdAt}</span>
                                                                    </div>

                                                                    <img class="direct-chat-img" src="<?= $IMAGE_DIR_USER . $user['hinh'] ?>" alt="message user image">

                                                                    <div class="direct-chat-text">
                                                                     ${data.content}
                                                                    </div>

                                                            </div>`);

        } else {
            $('#chat').append(`<div class="direct-chat-msg">
                                                                    <div class="direct-chat-infos clearfix">
                                                                        <span class="direct-chat-name float-left">${data.name}</span>
                                                                        <span class="direct-chat-timestamp float-right">${data.createdAt}</span>
                                                                    </div>

                                                                  
                                                                    <div class="direct-chat-img text-center bg-secondary pt-2 pb-2"> ${data.name[(data.name).lastIndexOf(" ") + 1]}</div>
                                                                    <div class="direct-chat-text">
                                                                    ${data.content}
                                                                    </div>

                                                                </div>`);
        }
        $("#chat").scrollTop($("#chat")[0].scrollHeight);

    });

    $(document).on("keyup paste", "#input-post", function(e) {
        var text = $(this).val();
        if (text !== '') {
            socket.emit("sendDataClientTyping", idUser);
        } else {
            socket.emit("sendDataClientTyping", null);
        }


        if (e.keyCode === 13 && e.shiftKey === false) {
            postComment(text);
        }

    });

    $(document).on("click", ".app-chat__post-comment-button", function(e) {
        postComment($('#input-post').val());
    });
</script>