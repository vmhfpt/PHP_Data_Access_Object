<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thêm loại hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thêm loại hàng</li>
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
            <form id="submit-form" action="index.php?btn_insert" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">MÃ LOẠI HÀNG (Tự động tăng)</label>
                                <input type="text" class="form-control" id="code" placeholder="Mã loại hàng tự động tăng" disabled>
                            </div>

                            <div class="form-group">
                                <label for="name-category">TÊN LOẠI HÀNG</label>
                                <input name="ten_loai_hang" type="text" class="form-control " id="name-category" placeholder="Nhập tên loại hàng">
                                <span id="error-name" class="text-danger">* Bắt buộc nhập</span>
                            </div>



                        </div>



                    </div>



                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary m-2">Thêm mới</button>
                    <a href="index.php" class=""> <button type="button" class="btn btn-danger m-2">Nhập lại</button></a>
                    <a href="index.php?btn_list" class=""><button type="button" class="btn btn-success m-2">Danh sách</button></a>
                </div>
            </form>

        </div>
    </div>
</section>

<script>
  var errorName = $('#name-category').val()  ==  '' ? true :  false;
    $(document).on("input keyup paste", "#name-category", function() {
        var text = $(this).val();
        if (text == '') {
            $('#error-name').text("* Không được để trống");
            $('#name-category').addClass("border-danger");
            errorName = true;
        } else if (/^[a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,}$/.test(text) && text[0] != ' ') {
            $('#error-name').text("");
            $('#name-category').removeClass("border-danger");
            errorName = false;
        } else {
            $('#error-name').text("* Tên loại hàng phải từ 2 ký tự trở lên và không chứa ký tự đặc biệt");
            $('#name-category').addClass("border-danger");
            errorName = true;
        }
    });
    $('#submit-form').submit(function(e) {
        
        if ($('#name-category').val()  ==  '') {
            $('#error-name').text("* Không được để trống");
            $('#name-category').addClass("border-danger");
            errorName = true;
        }
        if(errorName) return false;
        return true;
        //e.preventDefault();
    });
</script>