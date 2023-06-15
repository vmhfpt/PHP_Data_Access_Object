<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sửa hàng hóa "<?=$ten_hh?>"</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Sửa hàng hóa</li>
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
                        <div class="col-md-4">
                            <div class="form-group">
                            <input name="hinh_cu" type="hidden" value="<?=$hinh?>"  >
                            <input name="ma_hh" value="<?=$ma_hh?>" type="hidden" class="form-control" id="ma_hh" placeholder="Tự động tăng" >
                                <label for="ma_hh">MÃ HÀNG HÓA (Tự động tăng)</label>
                                <input value="<?=$ma_hh?>" type="text" class="form-control" id="ma_hh" placeholder="Tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="giam_gia">GIẢM GIÁ</label>
                                <input value="<?=$giam_gia?>" name="giam_gia" type="text" class="form-control" id="giam_gia" placeholder="Nhập giảm giá">
                                <span id="error-giam-gia" class="text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label >NGÀY NHẬP</label>
                                <div class="input-group date " id="datepicker">

                                    <input value="<?=DateTime::createFromFormat("Y-m-d H:m:s" , $ngay_nhap)->format('m/d/Y')?>" name="ngay_nhap"  type="text" class="form-control" id="date" />
                                    <span class="input-group-append">
                                        <span class="input-group-text bg-light d-block">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </span>
                                </div>
                                <span id="error-date" class="text-danger"></span>
                            </div>

                          

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">TÊN HÀNG HÓA</label>
                                <input value="<?=$ten_hh?>" name="ten_hang_hoa" type="text" class="form-control" id="name" placeholder="Nhập tên hàng hóa">
                                <span id="error-name" class="text-danger"></span>
                            </div>

                            <div class="form-group">
                                <label >SỐ LƯỢT XEM</label>
                                <input value="<?=$so_luot_xem?>" type="number" class="form-control"  placeholder="0" disabled>
                            </div>
                            <div class="form-group">
                                <label>LOẠI HÀNG HÓA</label>
                                <select name="loai_hang" class="custom-select">
                                    
                                    <?php
                                        foreach($loai_hang as $key =>$value){
                                    ?>
                                        <option <?=$ma_loai == $value["ma_loai"] ? 'selected' : ''  ?> value="<?=$value["ma_loai"]?>"><?=$value["ten_loai"]?></option>
                                    <?php
                                        }
                                    ?>

                                </select>
                            </div>

                        </div>

                        <div class="col-md-4">


                            <div class="form-group">
                                <label for="don_gia">ĐƠN GIÁ</label>
                                <input value="<?=$don_gia?>" name="don_gia" type="number" class="form-control" id="don_gia" placeholder="Nhập đơn giá">
                                <span id="error-don_gia" class="text-danger"></span>
                            </div>


                            <div class="form-group">
                                <label for="confirm_password">HÀNG ĐẶC BIỆT?</label>
                                <div class="custom-control border border-success rounded ">
                                    <div class="row">
                                        <div style="width : 100px ;padding : 5.9px 0px;" class=" custom-radio ml-3">
                                            <input <?=$dac_biet == 1 ? 'checked=""' : '' ?> value="1" name="hang_dac_biet" class="custom-control-input custom-control-input-danger" type="radio" id="customRadio3"  >
                                            <label for="customRadio3" class="custom-control-label">Đặc biệt</label>
                                        </div>
                                        <div style="width : 130px;padding : 5.9px 0px;" class=" custom-radio ">
                                            <input <?=$dac_biet == 0 ? 'checked=""' : '' ?> value="0" name="hang_dac_biet" class="custom-control-input custom-control-input-danger" type="radio" id="customRadio4"  >
                                            <label for="customRadio4" class="custom-control-label">Bình thường</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            



                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>NỘI DUNG</label>
                                <textarea name="mo_ta" id="compose-textarea" class="form-control" style="height: 300px !important"><?=$mo_ta?> </textarea>
                                <span id="error-compose-textarea" class="text-danger"></span>
                            </div>
                        </div>

                    </div>

                    <h5>Định danh hàng hóa</h5>
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">HÌNH ẢNH</label>
                                <div class="custom-file">

                                    <input accept="image/*" name="hinh" type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label customFile" for="customFile">Chọn một ảnh đại diện sản phẩm</label>
                                </div>
                            </div>
                            <div class="filtr-item col-sm-4" data-category="1" data-sort="white sample">
                                <img id="#imgSrc" src="<?= $IMAGE_DIR_PRODUCT.$hinh?>" class="img-fluid mb-2" alt="white sample" />
                            </div>
                        </div>



                    </div>

                </div>








            <div class="card-footer">
                <button type="submit" class="btn btn-primary m-2">Cập nhật</button>
                <a href="index.php?btn_edit&&ma_hh=<?=$ma_hh?>" class=""><button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                <a href="index.php?btn_list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                <a href="index.php" class=""> <button type="button" class="btn btn-info m-2">Thêm mới</button></a>
            </div>
       </form>

        </div>
    </div>
</section>

<script type="text/javascript">
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
    $.getScript('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js', function() {
        $('#compose-textarea').summernote();
    });
    $.getScript('https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js', function() {
        $('#datepicker').datepicker();
    });


    /////////////////////////////////////////////////////
    var errorGiamGia = $('#giam_gia').val() == '' ? true : false;
    var errorDate = $('#date').val() == '' ? true : false;
    var errorName = $('#name').val() == '' ? true : false;
    var errorDonGia = $('#don_gia').val() == '' ? true : false;
    var errorContent = $('#compose-textarea').val() == '' ? true : false;


    $(document).on("input keyup paste", "#giam_gia", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-giam-gia').text("* Không được để trống");
            $('#giam_gia').addClass("border-danger");
            errorGiamGia = true;
        } else if (/^[0-9\.-]{1,}$/.test(text) && text[0] != ' ') {
            $('#error-giam-gia').text("");
            $('#giam_gia').removeClass("border-danger");
            errorGiamGia = false;
        } else {
            $('#error-giam-gia').text("* Giảm giá không hợp lệ");
            $('#giam_gia').addClass("border-danger");
            errorGiamGia = true;
        }
    });
    $(document).on("input keyup paste", "#name", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-name').text("* Không được để trống");
            $('#name').addClass("border-danger");
            errorName = true;
        } else if (/^[a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,27}$/.test(text) && text[0] != ' ') {
            $('#error-name').text("");
            $('#name').removeClass("border-danger");
            errorName = false;
        } else {
            $('#error-name').text("* Tên hàng hóa phải từ 2 đến 27 ký tự trở lên và không chứa ký tự đặc biệt");
            $('#name').addClass("border-danger");
            errorName = true;
        }
    });
    $(document).on("input keyup paste", "#don_gia", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-don_gia').text("* Không được để trống");
            $('#don_gia').addClass("border-danger");
            errorDonGia = true;
        } else if (/^[0-9\.-]{1,}$/.test(text) && text[0] != ' ') {
            $('#error-don_gia').text("");
            $('#don_gia').removeClass("border-danger");
            errorDonGia = false;
        } else {
            $('#error-don_gia').text("* Giảm giá không hợp lệ");
            $('#don_gia').addClass("border-danger");
            errorDonGia = true;
        }
    });







    $('#submit-form').submit(function(e) {
       
        if ($('#giam_gia').val()  ==  '') {
            $('#error-giam-gia').text("* Không được để trống");
            $('#giam_gia').addClass("border-danger");
            errorGiamGia = true;
        }
        if ($('#name').val()  ==  '') {
            $('#error-name').text("* Không được để trống");
            $('#name').addClass("border-danger");
            errorName = true;
        }
        if ($('#don_gia').val()  ==  '') {
            $('#error-don_gia').text("* Không được để trống");
            $('#don_gia').addClass("border-danger");
            errorDonGia = true;
        }
        if ($('#date').val()  ==  '') {
            $('#error-date').text("* Không được để trống");
            $('#date').addClass("border-danger");
            errorDate = true;
        }else {
            $('#error-date').text("");
            $('#date').removeClass("border-danger");
            errorDate = false;
        }
        if ($('#compose-textarea').val() == ' ' || $('#compose-textarea').val() == '') {
            $('#error-compose-textarea').text("* Không được để trống");
            errorContent = true;
        }else {
            $('#error-compose-textarea').text("");
            errorContent = false;
        }
        if(errorContent || errorDate ||  errorDonGia || errorName  || errorGiamGia || errorHinh) return false;
        return true;
    });



</script>