<?php
 // require "../global.php";
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?=$ADMIN_URL?>/trang-chinh/" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Logout</a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

                

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="show-message-suggests">
                            
                        </div>
                        <a href="<?=$ADMIN_URL?>/" class="dropdown-item dropdown-footer">Xem tất cả tin nhắn</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?=$IMAGE_DIR_USER . $user['hinh']?>" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"><?=$user['ho_ten']?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <li class="user-header bg-primary">
                            <img src="<?=$IMAGE_DIR_USER . $user['hinh']?>" class="img-circle elevation-2" alt="User Image">
                            <p>
                            <?=$user['ho_ten']?> - Nguyễn Thành Long
                                <small><?=$user['email']?></small>
                            </p>
                        </li>

                        <li class="user-body">
                            <div class="row">
                                <div class="col-4 text-center">
                                    <a href="#">Admin</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">Support</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">SEO</a>
                                </div>
                            </div>

                        </li>

                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right">Đăng xuất</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="<?=$ADMIN_URL?>/trang-chinh/" class="brand-link">
                <img src="<?=$IMAGE_DIR_USER . $user['hinh']?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Quản trị viên</span>
            </a>

            <div class="sidebar">

                <div class="form-inline mt-2">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                       

                        <li class="nav-item">
                            <a href="<?=$ADMIN_URL?>/trang-chinh/" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Loại hàng
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=$ADMIN_URL?>/loai-hang?btn_add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm loại hàng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=$ADMIN_URL?>/loai-hang?btn_list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách loại hàng</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Khách hàng
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=$ADMIN_URL?>/khach-hang?btn_add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm khách hàng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=$ADMIN_URL?>/khach-hang?btn_list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách khách hàng</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    Hàng hóa
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?=$ADMIN_URL?>/hang-hoa?btn_add" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm hàng hóa</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?=$ADMIN_URL?>/hang-hoa?btn_list" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách hàng hóa</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$ADMIN_URL?>/don-hang" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Đơn hàng
                                    <span class="right badge badge-danger">5</span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-header">Bình luận</li>
                        <li class="nav-item">
                            <a href="<?=$ADMIN_URL?>/binh-luan" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                   Sản phẩm
                                    <span class="right badge badge-danger">12</span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=$ADMIN_URL?>/thong-ke" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                   Thống kê
                                    
                                </p>
                            </a>
                        </li>
                        
                    </ul>
                </nav>

            </div>

        </aside>



<script>
    var chatSuggest = [];
     $.ajax({
                    method: "GET",
                    url: "https://blog.diaocconsole.tk/get-chat",
                   
                })
                .done(function(msg) {
                   chatSuggest[0] = msg[msg.length - 1];
                   chatSuggest[1] = msg[msg.length - 2];
                   chatSuggest[2] = msg[msg.length - 3];
                  
                   chatSuggest.map((value, index) => {
                        $('.show-message-suggests').append(` <a href="<?=$ADMIN_URL?>/" class="dropdown-item">

<div class="media">
    <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
    <div class="media-body">
        <h3 class="dropdown-item-title">
             ${value.name}
            <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
        </h3>
        <p class="text-sm">${value.content}</p>
        <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> ${value.createdAt}</p>
    </div>
</div>

</a>
<div class="dropdown-divider"></div>`);
                   });
                   

                   
                })

</script>