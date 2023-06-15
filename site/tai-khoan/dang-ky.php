<section class="app-bread-crumb container-fluid">
    <div class="container">
        <ul class="">
            <li class=""><a href="" class="">Trang chủ</a> /</li>
            <li class=""><a href="" class="">Tin tức & Sự kiện</a></li>
        </ul>
    </div>
</section>

<div class="app-form container-fluid">
    <div class="container form-center">
        <div class="app-form-container">
            <div class="app-form-container__left ">
                <div class="app-form-container__left-img">
                    <img src="https://didongthongminh.vn/modules/members/assets/images/log.svg" alt="" class="">
                </div>

                <div class="app-form-container__left-list">
                    <span class="">QUYỀN LỢI THÀNH VIÊN</span>
                    <ul class="">
                        <li class=""><i class="fa fa-check-circle-o" aria-hidden="true"></i> <span class="">Mua hàng khắp thế giới cực dễ dàng, nhanh chóng</span></li>
                        <li class=""><i class="fa fa-check-circle-o" aria-hidden="true"></i><span class="">Theo dõi chi tiết đơn hàng, địa chỉ thanh toán dễ dàng</span></li>
                        <li class=""><i class="fa fa-check-circle-o" aria-hidden="true"></i> <span class="">Nhận nhiều chương trình ưu đãi hấp dẫn từ chúng tôi</span></li>
                    </ul>
                </div>
            </div>
            <div class="app-form-container__right ">
                <div class="app-form-container__right-tab">
                <span class=""><a href="<?= $SITE_URL.'/tai-khoan?dang-nhap'?>" class="">Đăng nhập</a></span>
                    <span class="app-form-container__right-tab-active"><a href="<?= $SITE_URL.'/tai-khoan?dang-ky'?>" class="app-form-container__right-tab-active">Đăng ký</a></span>
                </div>

                <div class="app-form-container__right-form">
                    <form id="submit-form" method="POST" action="?btn_register" >
                        <div class="app-form-container__right-form-content">
                            <div class="app-form-container__right-form-item">
                                <input name="ten_khach_hang" id="name" placeholder="Họ và tên*" type="text" class="">
                                <span id="error-ten-khach-hang" style="font-size : 13px; color : red;" class="">* Bắt buộc nhập</span>
                            </div>
                            <div class="app-form-container__right-form-item">
                                <input name="ma_khach_hang" id="ma-khach-hang" placeholder="Tên đăng nhập*" type="text" class="">
                                <span id="error-ma-khach-hang" style="font-size : 13px; color : red;" class="">* Bắt buộc nhập</span>
                            </div>
                            <div class="app-form-container__right-form-item">
                                <input name="email" id="email" placeholder="Email đăng nhập*" type="email" class="">
                                <span id="error-email" style="font-size : 13px; color : red;" class="">* Bắt buộc nhập</span>
                            </div>
                            <div class="app-form-container__right-form-item">
                                <input name="mat_khau" id="password" placeholder="Mật khẩu*" type="password" class="">
                                <span id="error-password" style="font-size : 13px; color : red;" class="">* Bắt buộc nhập</span>
                            </div>
                           

                            <?php
                            if (isset($MESSAGE) && count($MESSAGE) != 0) {
                                echo '<div class="popup-wrong-user">';
                                foreach ($MESSAGE as $value) {
                                    echo ' <span class=""> ' . $value . '</span> <br/>';
                                }
                                echo '</div>';
                            }

                            ?>
                            <div class="app-form-container__right-form-item">
                                <button type="submit" class="bg-login"> Tạo tài khoản</button>
                            </div>

                            

                        </div>
                    </form>


                </div>


            </div>
        </div>
    </div>
</div>

<script>
    var errorMaKhachHang = $('#ma-khach-hang').val() == '' ? true : false;
    var errorPassword = $('#password').val() == '' ? true : false;
    var errorEmail = $('#email').val() == '' ? true : false;
    var errorName = $('#name').val() == '' ? true : false;

    $(document).on("input keyup paste", "#ma-khach-hang", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-ma-khach-hang').text("* Không được để trống");
            $('#ma-khach-hang').addClass("border-danger");
            errorMaKhachHang = true;
        } else if (/^[a-zA-Z0-9]{2,}$/.test(text) && text[0] != ' ') {
            $('#error-ma-khach-hang').text("");
            $('#ma-khach-hang').removeClass("border-danger");
            errorMaKhachHang = false;
        } else {
            $('#error-ma-khach-hang').text("* Mã khách hàng phải từ 2 ký tự và không chứa ký tự đặc biệt");
            $('#ma-khach-hang').addClass("border-danger");
            errorMaKhachHang = true;
        }
    });
    $(document).on("input keyup paste", "#name", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-ten-khach-hang').text("* Không được để trống");
            $('#name').addClass("border-danger");
            errorName = true;
        } else if (/^[a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,27}$/.test(text) && text[0] != ' ') {
            $('#error-ten-khach-hang').text("");
            $('#name').removeClass("border-danger");
            errorName = false;
        } else {
            $('#error-ten-khach-hang').text("* Tên khách hàng phải từ 2 đến 27 ký tự trở lên và không chứa ký tự đặc biệt");
            $('#name').addClass("border-danger");
            errorName = true;
        }
    });
    $(document).on("input keyup paste", "#password", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-password').text("* Không được để trống");
            $('#password').addClass("border-danger");
            errorPassword = true;
        } else if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(text) && text[0] != ' ') {
            $('#error-password').text("");
            $('#password').removeClass("border-danger");
            errorPassword = false;
        } else {
            $('#error-password').text("* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số");
            $('#password').addClass("border-danger");
            errorPassword = true;
        }
    });
    $(document).on("input keyup paste", "#email", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-email').text("* Không được để trống");
            $('#email').addClass("border-danger");
            errorEmail = true;
        } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text) && text[0] != ' ') {
            $('#error-email').text("");
            $('#email').removeClass("border-danger");
            errorEmail = false;
        } else {
            $('#error-email').text("* Email không hợp lệ");
            $('#email').addClass("border-danger");
            errorEmail = true;
        }
    });



    $('#submit-form').submit(function(e) {
        
        if ($('#ma-khach-hang').val() == '') {
            $('#error-ma-khach-hang').text("* Không được để trống");
            $('#ma-khach-hang').addClass("border-danger");
            errorMaKhachHang = true;
        }
        if ($('#password').val() == '') {
            $('#error-password').text("* Không được để trống");
            $('#password').addClass("border-danger");
            errorPassword = true;
        }
        if ($('#name').val() == '') {
            $('#error-ten-khach-hang').text("* Không được để trống");
            $('#name').addClass("border-danger");
            errorName = true;
        }

        if ($('#email').val() == '') {
            $('#error-email').text("* Không được để trống");
            $('#email').addClass("border-danger");
            errorEmail = true;
        }
        if (errorName || errorEmail || errorPassword || errorMaKhachHang) return false;
        return true;
    });
</script>