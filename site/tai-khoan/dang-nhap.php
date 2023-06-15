<style>
    .app-form-container__right-form-item-force {
        display : flex;
        gap : 10px;
        font-size: 15px;
        color : #333;
        
    }
    .app-form-container__right-form-item-force label {
        cursor: pointer;
    }
</style>

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
            <div class="show-force"></div>
                <div class="app-form-container__right-tab">
                    
                    <span class="app-form-container__right-tab-active"><a href="<?= $SITE_URL.'/tai-khoan?dang-nhap'?>" class="app-form-container__right-tab-active">Đăng nhập</a></span>
                    <span class=""><a href="<?= $SITE_URL.'/tai-khoan?dang-ky'?>" class="">Đăng ký</a></span>
                </div>

                <div class="app-form-container__right-form">
                    <?= is_string($MESSAGE) ? '<div class="popup-success-user">
                                                    <strong>Thành công </strong> ' . $MESSAGE . '
                                                </div>' : '' ?> <br/>
                    <form id="submit-form" action="?btn_login" method="POST">
                        <div class="app-form-container__right-form-content">
                            <div class="app-form-container__right-form-item">
                                <input value="<?=(get_cookie("user")) ? get_cookie("user")->username : "" ?>" name="username" id="username" placeholder="Username đăng nhập*" type="text" class="">
                                <span id="error-username" style="font-size : 13px; color : red;" class="">* Bắt buộc nhập</span>
                            </div>
                            <div class="app-form-container__right-form-item">
                                <input value="<?=(get_cookie("user")) ? get_cookie("user")->password : "" ?>" name="password" id="password" placeholder="Mật khẩu*" type="password" class="">
                                <span id="error-password" style="font-size : 13px; color : red;" class="">* Bắt buộc nhập</span>
                            </div>
                            <?php
                            if (isset($MESSAGE) && is_array($MESSAGE) && count($MESSAGE) != 0) {
                                echo '<div class="popup-wrong-user">';
                                foreach ($MESSAGE as $value) {
                                    echo ' <span class=""> ' . $value . '</span> <br/>';
                                }
                                echo '</div>';
                            }

                            ?>
                             <div class="app-form-container__right-form-item-force">
                                <input <?=(get_cookie("user")) ? "checked": "" ?> id="remember" name="remember" type="checkbox" class="">
                                <label for="remember" class="">Ghi nhớ tôi</label>
                            </div>


                            <div class="app-form-container__right-form-item app-form-container__right-form-item-right">
                                <span class="onclick-force">Quên mật khẩu?</span>
                            </div>

                            <div class="app-form-container__right-form-item">
                                <button class="bg-login"> Đăng nhập</button>
                            </div>





                        </div>
                    </form>

                    <div class="app-form-container__right-form-policy">
                        <p class="">Di Động Thông Minh cam kết bảo mật và sẽ không bao giờ đăng hay chia sẻ thông tin mà chưa có được sự đồng ý của bạn.</p>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<script>
    var errorPassword = $('#password').val() == '' ? true : false;
    var errorUsername = $('#username').val() == '' ? true : false;


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
    $(document).on("input keyup paste", "#username", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-username').text("* Không được để trống");
            $('#username').addClass("border-danger");
            errorUsername = true;
        } else if (/^[a-zA-Z0-9]{2,}$/.test(text) && text[0] != ' ') {
            $('#error-username').text("");
            $('#username').removeClass("border-danger");
            errorUsername = false;
        } else {
            $('#error-username').text("* Mã khách hàng phải từ 2 ký tự và không chứa ký tự đặc biệt");
            $('#username').addClass("border-danger");
            errorUsername = true;
        }
    });



    $('#submit-form').submit(function(e) {

        if ($('#password').val() == '') {
            $('#error-password').text("* Không được để trống");
            $('#password').addClass("border-danger");
            errorPassword = true;
        }

        if ($('#username').val() == '') {
            $('#error-username').text("* Không được để trống");
            $('#username').addClass("border-danger");
            errorUsername = true;
        }
        if (errorUsername || errorPassword) return false;
        return true;
    });



    ////////////////////////////////////////////////////////
    var errorInputEmail = true;
    var errorInputOTP = true;
    var errorPasswordForgot = true;
    var emailOTP = '';

    $(document).on("input keyup paste", ".password-force-input", function() {


        var text = $(this).val();

        if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(text)) {
            $('.error-password-force').text('');
            errorPasswordForgot = false;
        } else {
            $('.error-password-force').text('* Mật khẩu phải bao gồm chữ cái in hoa, thường và số');
            errorPasswordForgot = true;

        }
    });




    $(document).on("input keyup paste", ".otp-input", function() {


        var text = $(this).val();

        if (/^[0-9]{6}$/.test(text)) {
            $('.error-otp-force').text('');
            errorInputOTP = false;
        } else {
            $('.error-otp-force').text('* Mã OTP chỉ bao gồm 6 số');
            errorInputOTP = true;

        }
    });



    $(document).on("input keyup paste", ".force-input", function() {


        var text = $(this).val();

        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text)) {
            $('.error-email-force').text('');
            errorInputEmail = false;
        } else {
            $('.error-email-force').text('* Email không hợp lệ');
            errorInputEmail = true;

        }
    });

    $(document).on("click", ".auth-otp", function() {
        if (errorPasswordForgot == false && errorInputOTP == false) {
            $.ajax({
                    method: "POST",
                    url: "index.php?send-otp",
                    data: {
                        type: "send-otp",
                        password: $('.password-force-input').val(),
                        otp: $('.otp-input').val(),
                        email: emailOTP
                    }
                })
                .done(function(msg) {
                    msg = JSON.parse(msg);
                    console.log(msg);
                    if (msg.status == 'error') {
                        $('.error-otp-force').text(msg.message);
                    } else {
                        window.location.replace("index.php?dang-nhap");
                    }

                });
        }
    });


    $(document).on("click", ".ajax-force", function() {
        var that = this;

        if (errorInputEmail == false) {
            $(this).html(`<i style="font-size : 23px !important" class=" fa fa-spinner fa-spin"></i>`);
            $(this).css('pointer-events', 'none');
            $.ajax({
                    method: "POST",
                    url: "index.php?authentication",
                    data: {
                        type: "authentication",
                        email: $('.force-input').val(),

                    }
                })
                .done(function(msg) {
                    $(that).html(`Xác thực`);
                    $(that).css('pointer-events', 'auto');
                    msg = JSON.parse(msg);

                    if (msg.status == 'error') {
                        $('.error-email-force').text(msg.message);
                    } else {

                        $('.ajax-force').addClass('auth-otp');
                        $('.ajax-force').removeClass('ajax-force');


                        emailOTP = $('.force-input').val();
                        $('.show-input-list').empty();
                        var template = `  <div class="app-form-container__right-form-item">
                                 <input  placeholder="Mã OTP*" type="number" class="otp-input" >
                               
 
                                 <span style="font-size : 13px; color : red;" class="error-otp-force">* Bắt buộc nhập</span>
                            </div> <br/>
                            <div class="app-form-container__right-form-item">
                                 <input  placeholder="Mật khẩu*" type="password" class="password-force-input" >
                               
 
                                 <span style="font-size : 13px; color : red;" class="error-password-force">* Bắt buộc nhập</span>
                            </div> `;
                        $('.show-input-list').append(template);
                    }

                });


        }
    });


    $(document).on("click", ".onclick-force", function() {
        $('.show-force').after(`<div class="popup-force">
                  
                  <div class="app-form-container__right-form">
                    
                    <form class="force-background" action="" >
                       <div class="popup-force-tab">
                          <span class="">Quên mật khẩu</span>
                          <span class="close-force">&times;</span>
                       </div>
                     
                        <div class="app-form-container__right-form-content">
                         <div class="show-input-list">
                         <div class="app-form-container__right-form-item">
                                 <input  placeholder="Email khôi phục*" type="email" class="force-input" name="email">
                               
 
                                 <span style="font-size : 13px; color : red;" class="error-email-force">* Bắt buộc nhập</span>
                            </div>
                         </div>
                
                        
                         
                           
                           
 
                       <div class="app-form-container__right-form-item">
                       <button type="button" class="bg-login ajax-force"> Xác thực</button>
                   </div>
 
                        </div>
                    </form>
 
                   
                </div>
                  </div>`);
    });
    $(document).on("click", ".close-force", function() {
        $('.popup-force').remove();
    });
</script>