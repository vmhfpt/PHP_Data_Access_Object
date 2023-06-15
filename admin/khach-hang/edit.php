<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa khách hàng "<?=$ho_ten?>"</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa khách hàng</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
    <?php
        if(isset($MESSAGE) && count($MESSAGE) != 0){
            echo '<div class="alert alert-danger">';
            foreach($MESSAGE as $value) {
                echo ' <span class=""> '.$value.'</span> <br/>';
            }
            echo '</div>';
        }

    ?>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Điền đầy đủ các thông tin phía dưới</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <form id="submit-form" action="index.php?btn_update" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ma-khach-hang">MÃ KHÁCH HÀNG (Tên đăng nhập)</label>
                            <input name="ma_kh" type="hidden" value="<?=$ma_kh?>"  >
                            <input name="hinh_cu" type="hidden" value="<?=$hinh?>"  >
                            <input value="<?=$ma_kh?>"  type="text" class="form-control" id="ma-khach-hang" placeholder="Nhập mã khách hàng" disabled>

                        </div>

                        <div class="form-group">
                            <label for="password">MẬT KHẨU</label>
                            <input name="mat_khau" type="password" class="form-control" id="password" placeholder="Nhập mật khẩu">
                            <span id="error-password" class="text-danger">* Bắt buộc nhập</span>
                        </div>
                        <div class="form-group">
                            <label for="email">ĐỊA CHỈ EMAIL</label>
                            <input name="email" value="<?=$email?>" type="email" class="form-control" id="email" placeholder="Enter email">
                            <span id="error-email" class="text-danger"></span>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input <?=$kich_hoat == 0 ? 'checked' : ''?> type="checkbox" class="custom-control-input" id="customSwitch1" name="kich_hoat">
                                <label class="custom-control-label" for="customSwitch1">Kích hoạt ?</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">HỌ VÀ TÊN</label>
                            <input value="<?=$ho_ten?>" name="ten_khach_hang" type="text" class="form-control" id="name" placeholder="Nhập tên khách hàng">
                            <span id="error-ten-khach-hang" class="text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">XÁC NHẬN MẬT KHẨU</label>
                            <input name="xac_nhan_mat_khau" type="password" class="form-control" id="confirm_password" placeholder="Nhập mật khẩu">
                            <span id="error-confirm_password" class="text-danger">* Bắt buộc nhập</span>
                        </div>
                        <div class="form-group">
                            <label>VAI TRÒ</label>
                            <select name="vai_tro" class="custom-select">
                                <option <?=$vai_tro == 0 ? 'selected' : '' ?> value="0">Khách hàng</option>
                                <option <?=$vai_tro == 1 ? 'selected' : '' ?>  value="1">Nhân viên</option>

                            </select>
                        </div>



                    </div>

                </div>

                <h5>Định danh khách hàng</h5>
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">HÌNH ẢNH</label>
                            <div class="custom-file">

                                <input accept="image/*" name="hinh" type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label customFile" for="customFile">Chọn một ảnh đại diện sản phẩm</label>
                            </div>
                        </div>
                        <div class="filtr-item col-sm-2" data-category="1" data-sort="white sample">
                            <img id="#imgSrc" src="<?=$hinh ? $IMAGE_DIR_USER.$hinh: 'https://www.freeiconspng.com/thumbs/no-image-icon/no-image-icon-6.png'?>" class="img-fluid mb-2" alt="white sample" />
                        </div>
                    </div>



                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                <a href="index.php?btn_edit&&ma_kh=<?=$ma_kh?>" class=""><button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                <a href="index.php?btn_list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                <a href="index.php" class=""> <button type="button" class="btn btn-info m-2">Thêm mới</button></a>
            </div>
       </form>

        </div>
    </div>
</section>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(".img-fluid").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#customFile").change(function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".customFile").addClass("selected").html(fileName);
        readURL(this);
    });



    var errorMaKhachHang = $('#ma-khach-hang').val()  ==  '' ? true :  false;
    var errorPassword = $('#password').val()  ==  '' ? true :  false;
    var errorEmail = $('#email').val()  ==  '' ? true :  false;
    var errorName = $('#name').val()  ==  '' ? true :  false;
    var errorConfirmPassword = $('#confirm_password').val()  ==  '' ? true :  false;

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
    $(document).on("input keyup paste", "#confirm_password", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-confirm_password').text("* Không được để trống");
            $('#confirm_password').addClass("border-danger");
            errorConfirmPassword  = true;
        } else if(text !== $('#password').val() && $('#password').val() != '' ) {
            $('#error-confirm_password').text("* Mật khẩu nhập lại không khớp");
            $('#confirm_password').addClass("border-danger");
            errorConfirmPassword  = true;
        }else if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(text) && text[0] != ' ') {
            $('#error-confirm_password').text("");
            $('#confirm_password').removeClass("border-danger");
            errorConfirmPassword  = false;
        } else {
            $('#error-confirm_password').text("* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số");
            $('#confirm_password').addClass("border-danger");
            errorConfirmPassword  = true;
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
        if ($('#ma-khach-hang').val()  ==  '') {
            $('#error-ma-khach-hang').text("* Không được để trống");
            $('#ma-khach-hang').addClass("border-danger");
            errorMaKhachHang = true;
        }
        if ($('#password').val()  ==  '') {
            $('#error-password').text("* Không được để trống");
            $('#password').addClass("border-danger");
            errorPassword = true;
        }
        if ($('#name').val()  ==  '') {
            $('#error-name').text("* Không được để trống");
            $('#name').addClass("border-danger");
            errorName = true;
        }
        if ($('#confirm_password').val()  ==  '') {
            $('#error-confirm_password').text("* Không được để trống");
            $('#confirm_password').addClass("border-danger");
            errorConfirmPassword = true;
        }
        if ($('#email').val()  ==  '') {
            $('#error-email').text("* Không được để trống");
            $('#email').addClass("border-danger");
            errorEmail = true;
        }
        if(errorName || errorConfirmPassword || errorEmail || errorPassword  || errorMaKhachHang) return false;
        return true;
    });
</script>


