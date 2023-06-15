<section class="app-phone-suggest container-fluid">
  <div class="container">
    <div class="app-phone-suggest__title">
      <div class="app-phone-suggest__title-left">
        <div class="app-phone-suggest__title-left-icon">
          <img src="https://didongthongminh.vn/images/products/cat/original/dienthoai_1637510220.svg" alt="">
        </div>
        <div class="app-phone-suggest__title-left-text">
          Top sản phẩm mua cùng
        </div>
      </div>
      <div class="app-phone-suggest__title-right">
        <ul>
          <li><button>iPad cũ</button></li>
          <li><button>Apple iPad</button></li>
          <li><button>Samsung Tab</button></li>
          <li><button>Máy tính bảng khác</button></li>

          <li>
            <button class="app-phone-suggest__title-right-active">
              Xem tất cả 148 máy tính bảng
            </button>
          </li>
        </ul>
      </div>
    </div>
    <div class="app-phone-suggest__product-flex">
      <div class="app-top-sale__day-carousel app-information__content-four owl-carousel owl-theme owl-loaded owl-drag">
        <div class="owl-stage-outer">
          <div class="owl-stage" style="width: 3577px; transform: translate3d(-1192px, 0px, 0px); transition: all 0s ease 0s;">
            
           <?php
              foreach($productSuggest as $key => $value){
           ?>
            <div class="app-top-sale__day-carousel-item owl-item " style="width: 227.4px; margin-right: 11px;">
              <div class="app-top-sale__day-carousel-item-img-top-sale">
                -<?= (float)$value['giam_gia'] * 100 ?>%
              </div>
              <div class="app-top-sale__day-carousel-item-img">
                <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?> " alt="">
              </div>

              <div class="app-top-sale__day-carousel-item-detail">
                <div class="app-top-sale__day-carousel-item-detail-title">
                  <a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>"><?= $value['ten_hh'] ?></a>
                </div>
                <div class="app-top-sale__day-carousel-item-detail-price">
                  <b><?= currency_format($value['don_gia'] - ($value['don_gia'] * (float)$value['giam_gia'])) ?></b> <span><?= currency_format($value['don_gia']) ?></span>
                </div>

                <div class="sale-product">
                  <span>Giảm 100.000đ khi mua kèm iPhone 14</span>
                </div>
                <div class="app-top-sale__day-carousel-item-detail-bottom">
                  <div class="app-top-sale__day-carousel-item-detail-bottom-vote">
                    <ul>
                      <li>
                        <i class="vote-active fa fa-star" aria-hidden="true"></i>
                      </li>
                      <li>
                        <i class="vote-active fa fa-star" aria-hidden="true"></i>
                      </li>
                      <li>
                        <i class="vote-active fa fa-star" aria-hidden="true"></i>
                      </li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                      <li><i class="fa fa-star" aria-hidden="true"></i></li>
                    </ul>
                  </div>
                  <div class="app-top-sale__day-carousel-item-detail-like-product">
                    <i class="fa fa-heart-o" aria-hidden="true"></i> Yêu thích
                  </div>
                </div>
              </div>
            </div>
           <?php
              }
           ?>

            

          
          </div>
        </div>

        <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
        <div class="owl-dots disabled"></div>
      </div>
    </div>
  </div>
</section>