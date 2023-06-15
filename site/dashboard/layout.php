<section class="app-user container-fluid ">
    <div class="container">
        <div class="app-user-content">



            <div class="app-user-content__item ">
                <div class="app-user-content__item-content">
                    <div class="app-user-content__item-content-tab">
                        <?php
                        if ($user['hinh']) {
                            echo ' <img style="border-radius : 100%; width : 50px; height : 50px;" src="'.$IMAGE_DIR_USER.$user['hinh'].'" alt="" class="">';
                        } else {
                            echo ' <i class="fa fa-user" aria-hidden="true"></i>';
                        }
                        ?>
                        <span class="">Xin chào,</span>
                        <b class=""> <?= $user['ho_ten'] ?></b>
                    </div>

                    <div class="app-user-content__item-content-list">
                        <div class="app-user-content__item-content-list-item app-user-content__item-content-list-item-active">
                            <div class="">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <div class="">
                                <a href="<?= $SITE_URL.'/dashboard'?>" class=""> <span class="">Thông tin tài khoản </span></a>
                               
                            </div>
                        </div>
                        <div class="app-user-content__item-content-list-item">
                            <div class="">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </div>
                            <div class="">
                               
                                <a href="<?= $SITE_URL.'/dashboard?don-hang'?>" class=""> <span class="">Quản lý đơn hàng</span></a>
                            </div>
                        </div>
                     <?php if($user['vai_tro'] == 1) {?>
                        <div class="app-user-content__item-content-list-item">
                            <div class="">
                                <i class="fa fa-file-text" aria-hidden="true"></i>
                            </div>
                            <div class="">
                               
                                <a href="<?= $ADMIN_URL?>" class=""> <span class="">Quản trị website</span></a>
                            </div>
                        </div>
                     <?php }?>
            
                        <div class="app-user-content__item-content-list-item">
                            <div class="">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                            </div>


                            <div class="">
                                <a href="<?= $SITE_URL.'/tai-khoan?btn_logout'?>" class=""><span class="">Đăng xuất</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <?php require $VIEW_DASHBOARD; ?>





        </div>
    </div>
</section>