<?php 
$total = 0;
$totalRank = 0;
$worstVote = 0;
$badVote = 0;
$normalVote = 0;
$goodVote = 0;
$bestVote = 0;

  foreach($voteRank as $key => $value){
    $totalRank = $totalRank + ($value['total']);
    if($value['vote'] == 1){
      $worstVote = $value['total'];
    }
    if($value['vote'] == 2){
      $badVote = $value['total'];
    }
    if($value['vote'] == 3){
      $normalVote  = $value['total'];
    }
    if($value['vote'] == 4){
      $goodVote = $value['total'];
    }
    if($value['vote'] == 5){
      $bestVote = $value['total'];
    }
    $total = $total + $value['caculation'];
  }
 
   if($totalRank  == 0) $totalRank = 0.1;
   if($total == 0) $total = 0;
  
?>


<section class="app-detail-bottom container-fluid">
  <div class="container">
    <div class="app-detail-bottom__content">
      <div class="app-detail-bottom__item ">
        <div class="app-detail-promotion__tab">

          <img data="https://didongthongminh.vn/modules/products/assets/images/danhgia.svg" alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/icon_pk.svg">
          <span>Bài viết đánh giá</span>

        </div>

        <div class="app-detail-bottom__item-content">
          <?= $item['mo_ta'] ?>
        </div>

        <div class="app-detail-bottom__item-content-btn"><button class="show-more-detail">Xem thêm </button></div>

      </div>
      <div class="app-detail-bottom__item ">
        <div class="app-detail-promotion__tab">

          <img alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/thongso.svg">
          <span>Thông số kỹ thuật</span>

        </div>
        <div class="app-detail-bottom__item-product-right">
          <table>

            <tr>
              <td>Độ phân giải</td>
              <td>2360 x 1640 Pixels</td>

            </tr>
            <tr>
              <td>Màn hình rộng</td>
              <td>10,9 inch</td>

            </tr>
            <tr>
              <td>Hệ điều hành</td>
              <td>iPadOS 16</td>

            </tr>
            <tr>
              <td>Chip xử lý</td>
              <td>A14 Bionic với CPU 6 lõi, GPU 4 lõi và Neural Engine 16 lõi</td>

            </tr>
            <tr>
              <td>Độ phân giải camera sau</td>
              <td>12MP</td>

            </tr>
            <tr>
              <td>Độ phân giải camera trước</td>
              <td>12MP</td>

            </tr>

            <tr>
              <td>Thực hiện cuộc gọi</td>
              <td>Facetime</td>

            </tr>
            <tr>
              <td>Dung lượng pin</td>
              <td>28.6 Wh</td>

            </tr>
            <tr>
              <td>Loại pin</td>
              <td>Li-lon</td>

            </tr>
          </table>

          <div class="app-detail-bottom__item-product-right-btn">
            <button class="">Xem cấu hình chi tiết</button>
          </div>




          <div class=" app-detail-bottom__item-product-right-new">
            <div class="app-detail-promotion__tab">

              <img alt="icon" class="img-responsive icon_cat lazy-loaded" width="42" height="36" src="https://didongthongminh.vn/modules/products/assets/images/new.svg">
              <span>tin tức</span>

            </div>

            <div class="">
              <div class="app-new-suggest__center">
                <div class="app-new-suggest__center-item">
                  <div class="app-new-suggest__center-item-img">
                    <img src="https://didongthongminh.vn/upload_images/images/2022/12/03/ro-ri-them-thong-so-ky-thuat-cua-xiaomi-13-series.jpg" alt="">
                  </div>
                  <div class="app-new-suggest__center-item-detail">
                    <div class="app-new-suggest__center-item-detail-title">
                      <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất?
                        </span></a>
                    </div>

                    <div class="app-new-suggest__center-item-detail-time">
                      <span><i class="fa fa-calendar" aria-hidden="true"></i>
                        20/11/2022</span>
                      <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
                    </div>
                  </div>
                </div>
                <div class="app-new-suggest__center-item">
                  <div class="app-new-suggest__center-item-img">
                    <img src="https://didongthongminh.vn/upload_images/images/2022/12/22/gia%CC%81ng_sinh_ro%CC%A3%CC%82n_ra%CC%80ng.png" alt="">
                  </div>
                  <div class="app-new-suggest__center-item-detail">
                    <div class="app-new-suggest__center-item-detail-title">
                      <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                          màu theo phong thuỷ</span></a>
                    </div>

                    <div class="app-new-suggest__center-item-detail-time">
                      <span><i class="fa fa-calendar" aria-hidden="true"></i>
                        20/11/2022</span>
                      <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
                    </div>
                  </div>
                </div>
                <div class="app-new-suggest__center-item">
                  <div class="app-new-suggest__center-item-img">
                    <img src="https://didongthongminh.vn/upload_images/images/2022/11/28/dem-nguoc-ngay-xiaomi-13-series-ra-mat.jpg" alt="">
                  </div>
                  <div class="app-new-suggest__center-item-detail">
                    <div class="app-new-suggest__center-item-detail-title">
                      <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                          màu theo phong thuỷ</span></a>
                    </div>

                    <div class="app-new-suggest__center-item-detail-time">
                      <span><i class="fa fa-calendar" aria-hidden="true"></i>
                        20/11/2022</span>
                      <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
                    </div>
                  </div>
                </div>
                <div class="app-new-suggest__center-item">
                  <div class="app-new-suggest__center-item-img">
                    <img src="https://didongthongminh.vn/upload_images/images/2022/12/03/Ba%CC%89n_sao_cu%CC%89a_CT_2010_(1280_%C3%97_720_px).png" alt="">
                  </div>
                  <div class="app-new-suggest__center-item-detail">
                    <div class="app-new-suggest__center-item-detail-title">
                      <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                          màu theo phong thuỷ</span></a>
                    </div>

                    <div class="app-new-suggest__center-item-detail-time">
                      <span><i class="fa fa-calendar" aria-hidden="true"></i>
                        20/11/2022</span>
                      <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
                    </div>
                  </div>
                </div>
                <div class="app-new-suggest__center-item">
                  <div class="app-new-suggest__center-item-img">
                    <img src="https://didongthongminh.vn/upload_images/images/2022/12/28/iphone-12-pro-max-co-may-mau.jpg" alt="">
                  </div>
                  <div class="app-new-suggest__center-item-detail">
                    <div class="app-new-suggest__center-item-detail-title">
                      <a href=""><span>iPhone 12 Pro max có mấy màu? Màu nào đẹp nhất? Chọn
                          màu theo phong thuỷ</span></a>
                    </div>

                    <div class="app-new-suggest__center-item-detail-time">
                      <span><i class="fa fa-calendar" aria-hidden="true"></i>
                        20/11/2022</span>
                      <span><i class="fa fa-eye" aria-hidden="true"></i> 520</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
      <div class="app-detail-bottom__item ">
        <div class="app-detail-bottom__item-review-title">
          <b class="">Đánh giá <?= $item['ten_hh'] ?> Chính hãng</b>
        </div>

        <div class="app-detail-bottom__item-review-content">
          <div class="app-detail-bottom__item-review-content-item ">
            <div class="app-detail-bottom__item-review-content-item-total">
              <div class="app-detail-bottom__item-review-content-item-total-top">
                <span class=""><?=round($total / $totalRank , 1)?></span>
                <span class="">/5</span>
              </div>
              <div class="app-detail-bottom__item-review-content-item-total-center">
                <ul class="">
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                  <li><i class="fa fa-star" aria-hidden="true"></i></li>
                </ul>
              </div>
              <div class="app-detail-bottom__item-review-content-item-total-bottom">
                <span class="">(<?=count($comments)?> đánh giá )</span>

              </div>
            </div>
          </div>
          <div class="app-detail-bottom__item-review-content-item ">
            <div class="app-detail-bottom__item-review-content-item-vote">

              <div class="app-detail-bottom__item-review-content-item-vote-flex">
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <ul class="">
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                  </ul>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                    <div style="width : <?=(100/$totalRank) * $bestVote?>%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                  </div>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <span class=""><?=round((100/$totalRank) * $bestVote , 0)?>%</span>
                </div>
              </div>

              <div class="app-detail-bottom__item-review-content-item-vote-flex">
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <ul class="">
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                  </ul>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                    <div style="width : <?=(100/$totalRank) * $goodVote?>%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                  </div>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <span class=""><?=round((100/$totalRank) * $goodVote , 0)?>%</span>
                </div>
              </div>
              <div class="app-detail-bottom__item-review-content-item-vote-flex">
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <ul class="">
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                  </ul>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                    <div style="width : <?=(100/$totalRank) * $normalVote?>%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                  </div>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <span class=""><?=round((100/$totalRank) * $normalVote , 0)?>%</span>
                </div>
              </div>
              <div class="app-detail-bottom__item-review-content-item-vote-flex">
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <ul class="">
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                  </ul>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                    <div style="width : <?=(100/$totalRank) * $badVote?>%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                  </div>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <span class=""><?=round((100/$totalRank) * $badVote , 0)?>%</span>
                </div>
              </div>
              <div class="app-detail-bottom__item-review-content-item-vote-flex">
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <ul class="">
                    <li><i class="fa fa-star fa-star-active" aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                    <li><i class="fa fa-star " aria-hidden="true"></i></li>
                  </ul>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <div class="app-detail-bottom__item-review-content-item-vote-flex-item-process">
                    <div style="width : <?=(100/$totalRank) * $worstVote?>%" class="app-detail-bottom__item-review-content-item-vote-flex-item-process-detail"></div>
                  </div>
                </div>
                <div class="app-detail-bottom__item-review-content-item-vote-flex-item ">
                  <span class=""><?=round((100/$totalRank) * $worstVote , 0)?>%</span>
                </div>
              </div>


            </div>
          </div>
          <div class="app-detail-bottom__item-review-content-item">
            <button class="">viết đánh giá</button>
          </div>
        </div>




        <div class="app-detail-bottom__item-comment-content ">

          <div class="show-comment-ajax">

            <?php
            foreach ($comments as $key => $value) {
            ?>
              <div class="app-detail-bottom__item-comment-content-item">
                <div class="app-detail-bottom__item-comment-content-item-top">
                  <div class="app-detail-bottom__item-comment-content-item-top-left">
                    <span class=""><?= $value['ho_ten'] ?></span>
                    <ul class="">
                      <?=str_repeat('<li><i class="fa fa-star" aria-hidden="true"></i></li>', $value['vote']);?>
                      
                    </ul>
                  </div>
                  <div class="app-detail-bottom__item-comment-content-item-top-right">
                    <span class=""><?= $value['ngay_bl'] ?></span>
                  </div>
                </div>
                <div class="app-detail-bottom__item-comment-content-item-bottom">
                  <p class=""><?= $value['noi_dung'] ?></p>
                </div>
              </div>
            <?php
            }
            ?>
          </div>


          <div class="app-detail-bottom__item-comment-content-btn">
            <button class="">Xem thêm</button>
          </div>

          <div class="app-detail-bottom__item-comment-content-form">
         <style>
          .your-vote {
            margin : 20px 0px;
            display : flex;
            gap : 10px;
            align-items: flex-start;
          }
          .your-vote__item {
            width : 60px;
            justify-content: center;
            align-items: center;
            display : flex;
            flex-direction: column;
            gap : 5px;
            text-align: center;
          }
          .your-vote__item span {
            font-size: 13px;
          }
          .your-vote__item i {
            color : #fe8c23;
            font-size: 30px;
            cursor: pointer;
          }
         </style>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
              <div class=""> <span class="data-product-id" data-id="<?=$item["ma_hh"]?>" >Để lại bình luận của bạn</span></div>
              <div class="row">
                <div class="col-sm-12">
                    <div class="your-vote">
                         <div class="your-vote__item">
                                <i class="fa fa-star-o fa-star-click" aria-hidden="true" data-vote="1"></i>
                                <span class="your-vote__item-label">Rất tệ</span>
                         </div>
                         <div class="your-vote__item">
                         <i class="fa fa-star-o fa-star-click" aria-hidden="true" data-vote="2"></i>
                                <span class="your-vote__item-label">Tệ</span>
                         </div>
                         <div class="your-vote__item">
                         <i class="fa fa-star-o fa-star-click" aria-hidden="true" data-vote="3"></i>
                                <span class="your-vote__item-label">Bình thường</span>
                         </div>
                         <div class="your-vote__item">
                         <i class="fa fa-star-o fa-star-click" aria-hidden="true" data-vote="4"></i>
                                <span class="your-vote__item-label">Tốt</span>
                         </div>
                         <div class="your-vote__item">
                         <i class="fa fa-star-o fa-star-click" aria-hidden="true" data-vote="5"></i>
                                <span class="your-vote__item-label">Tuyệt vời</span>
                         </div>
                    </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">

                    <textarea class="pay-input-content" placeholder="Nhập nội dung ..." name="" id="" cols="30" rows="10"></textarea>
                    <span style="margin-top : 4px;color : red; font-size : 12px" class="error-content">* Bắt buộc
                      nhập</span>
                  </div>
                </div>

                <div class="col-sm-2">
                  <div class="form-group-btns submit-cmt">
                    <button type="button" class="">Gửi</button>
                  </div>
                </div>

              </div>
            <?php
            } else {
              echo '<div class=""> <span class="">Vui lòng  <a href="' . $SITE_URL . '/tai-khoan?dang-nhap" class="">Đăng Nhập</a> để bình luận</span></div>';
            }
            ?>



          </div>

        </div>


      </div>
    </div>
  </div>
</section>
<script>
  var vote = 0;
  $('.fa-star-click').click(function(){
     vote = ($(this).attr("data-vote"));
     $(".your-vote__item-label").removeAttr("style");
     $('.your-vote__item-label').eq((vote-1)).css('color', '#fe8c23');
     $('.fa-star-click').map((index,value) => {
         if($(value).attr("data-vote") <= vote){
            $(value).removeClass('fa-star-o');
            $(value).addClass('fa-star');
         }else {
            $(value).removeClass('fa-star');
            $(value).addClass('fa-star-o');
         }
     });
  })



  var errorInputContent = true;
  $('.pay-input-content').on('input keyup paste', function() {
    text = $(this).val();



    if (/^([a-zA-Z0-9ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềếểỄỆỈỊỌỎỐỒỔỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]{4,})+$/.test(text)) {
      errorInputContent = false;
      $('.error-content').text('');
    } else {
      errorInputContent = true;
      $('.error-content').text('* Nội dung quá ngắn');

    }
  });


  $('.submit-cmt>button').on('click', function() {
    
    if (errorInputContent == false) {
      $.ajax({
          method: "POST",
          url: "chi-tiet.php?insert-comment",
          data: {
            id: $('.data-product-id').attr("data-id"),
            content: $('.pay-input-content').val(),
            vote : vote
          }
        })
        .done(function(msg) {
          location.reload();
          return true;
          msg = JSON.parse(msg);
          const cmtDiv = `<div class="app-detail-bottom__item-comment-content-item">
                <div class="app-detail-bottom__item-comment-content-item-top">
                  <div class="app-detail-bottom__item-comment-content-item-top-left">
                      <span class="">${msg.ho_ten}</span>
                      <ul class="">
                        
                        ${`<li><i class="fa fa-star" aria-hidden="true"></i></li>`.repeat(Number(msg.vote))}
                      </ul>
                  </div>
                  <div class="app-detail-bottom__item-comment-content-item-top-right">
                    <span class="">${msg.ngay_bl}</span>
                  </div>
                </div>
                <div class="app-detail-bottom__item-comment-content-item-bottom">
                  <p class="">${msg.noi_dung}</p>
                </div>
            </div>`;
          $('.show-comment-ajax').prepend(cmtDiv);

          $([document.documentElement, document.body]).animate({
            scrollTop: $(".app-detail-bottom__item-review-content-item-total-bottom").offset().top
          }, 600);

          $('.pay-input-content').val("")
          errorInputContent = true;

        });

    } else {
      $([document.documentElement, document.body]).animate({
        scrollTop: $(".app-detail-bottom__item-comment-content-form").offset().top
      }, 600);
    }
  });
</script>