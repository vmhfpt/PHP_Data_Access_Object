<style>
   .custom-infor-file {
      display: none;
   }

   .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
   }

   .app-detail-bottom__item-comment-content-form-image-custom img {
      object-fit: cover;
      margin: 12px 0px;
      width: 130px;
      height: 150px;
   }
</style>

<div class="app-user-content__item ">
   <div class="app-user-content__item-detail">
      <div class="app-user-content__item-detail-title">
         <h3 class="">Thông tin tài khoản</h3>
      </div>
      <?= is_string($MESSAGE) ? '<div class="popup-success-user">
                                                    <strong>Thành công </strong> ' . $MESSAGE . '
                                                </div>' : '' ?>
      <?php
      if (is_array($MESSAGE) && isset($MESSAGE) && count($MESSAGE) != 0) {
         echo '<div class="popup-wrong-user">';
         foreach ($MESSAGE as $value) {
            echo ' <span class=""> ' . $value . '</span> <br/>';
         }
         echo '</div>';
      }

      ?>

      <div class="app-user-content__item-detail-content">
         <div class="app-detail-bottom__item-comment-content-form">
            <div class=""> <span class="">Cập nhật thông tin của bạn</span></div>


            <form id="submit-form" action="index.php?btn_update" method="POST" enctype="multipart/form-data">
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input value="<?= $user['ma_kh'] ?>" placeholder="Mã đăng nhập" type="text" class="pay-input-name" disabled>
                        <input name="ma_kh" value="<?= $user['ma_kh'] ?>" type="hidden">
                        <input name="hinh_cu" value="<?= $user['hinh'] ?>" type="hidden">
                     </div>
                  </div>


                  <div class="col-sm-6">
                     <div class="form-group">

                        <input id="name" name="name" value="<?= $user["ho_ten"] ?>" placeholder="Họ và tên" type="text" class="pay-input-phone">
                        <span style="margin-top : 4px;color : red; font-size : 12px" class="error-ten-khach-hang">* Bắt buộc nhập</span>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input id="email" name="email" value="<?= $user["email"] ?>" placeholder="email" type="email" class="pay-input-name">
                        <span style="margin-top : 4px;color : red; font-size : 12px" class="error-email">* Bắt buộc nhập</span>
                     </div>
                  </div>


                  <div class="col-sm-6">
                     <div class="form-group">

                        <input id="password" name="password" placeholder="Mật khẩu" type="password" class="pay-input-phone">
                        <span style="margin-top : 4px;color : red; font-size : 12px" class="error-password">* Bắt buộc nhập</span>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">

                        <label for="file-upload" class="custom-file-upload">
                           <i class="fa fa-cloud-upload"></i> Chọn ảnh đại diện
                        </label>
                        <input accept="image/*" class="custom-infor-file" id="file-upload" type="file" name="hinh" />


                        <div class="app-detail-bottom__item-comment-content-form-image-custom">
                           <img src="<?=$user['hinh'] ? $IMAGE_DIR_USER.$user['hinh'] : "https://png.pngtree.com/png-clipart/20190921/original/pngtree-user-avatar-boy-png-image_4693645.jpg" ?>" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>



                  <div class="col-sm-2">
                     <div class="form-group-btns submit-cmt">
                        <button type="submit" class="">Cập nhật</button>
                     </div>
                  </div>

               </div>
            </form>

         </div>


      </div>
   </div>
</div>
</div>

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
   $("#file-upload").change(function() {
      var fileName = $(this).val().split("\\").pop();
      $('.custom-file-upload').html(`<i class="fa fa-cloud-upload"></i> ${fileName}`);
      readURL(this);
   });



   //////////////////////////////////////////////////////////////

   var errorPassword = $('#password').val() == '' ? true : false;
   var errorEmail = $('#email').val() == '' ? true : false;
   var errorName = $('#name').val() == '' ? true : false;



   $(document).on("input keyup paste", "#name", function() {
      var text = $(this).val();
      if (text == '') {
         $('.error-ten-khach-hang').text("* Không được để trống");
         $('#name').addClass("border-danger");
         errorName = true;
      } else if (/^[a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{2,27}$/.test(text) && text[0] != ' ') {
         $('.error-ten-khach-hang').text("");
         $('#name').removeClass("border-danger");
         errorName = false;
      } else {
         $('.error-ten-khach-hang').text("* Tên khách hàng phải từ 2 đến 27 ký tự trở lên và không chứa ký tự đặc biệt");
         $('#name').addClass("border-danger");
         errorName = true;
      }
   });
   $(document).on("input keyup paste", "#password", function() {
      var text = $(this).val();
      if (text == '') {
         $('.error-password').text("* Không được để trống");
         $('#password').addClass("border-danger");
         errorPassword = true;
      } else if (/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/.test(text) && text[0] != ' ') {
         $('.error-password').text("");
         $('#password').removeClass("border-danger");
         errorPassword = false;
      } else {
         $('.error-password').text("* Mật khẩu phải từ 8 kí tự và bao gồm chữ cái in hoa, thường và số");
         $('#password').addClass("border-danger");
         errorPassword = true;
      }
   });
   $(document).on("input keyup paste", "#email", function() {
      var text = $(this).val();
      if (text == '') {
         $('.error-email').text("* Không được để trống");
         $('#email').addClass("border-danger");
         errorEmail = true;
      } else if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(text) && text[0] != ' ') {
         $('.error-email').text("");
         $('#email').removeClass("border-danger");
         errorEmail = false;
      } else {
         $('.error-email').text("* Email không hợp lệ");
         $('#email').addClass("border-danger");
         errorEmail = true;
      }
   });



   $('#submit-form').submit(function(e) {
      if ($('#password').val() == '') {
         $('.error-password').text("* Không được để trống");
         $('#password').addClass("border-danger");
         errorPassword = true;
      }
      if ($('#name').val() == '') {
         $('.error-name').text("* Không được để trống");
         $('#name').addClass("border-danger");
         errorName = true;
      }
      if ($('#email').val() == '') {
         $('.error-email').text("* Không được để trống");
         $('#email').addClass("border-danger");
         errorEmail = true;
      }
      if (errorName || errorEmail || errorPassword) return false;
      return true;
   });
</script>