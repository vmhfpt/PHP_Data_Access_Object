<?php
$keyboard = '';
if (isset($_GET['keywords'])) {
    $keyboard = $_GET['keywords'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="<?= $CONTENT_URL ?>/site/css/category.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/css/grid.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/css/index.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/css/new.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/css/cart.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/css/introduce.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/css/form.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/responsive/new.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/css/detail.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/responsive/index.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/responsive/form.css" rel="stylesheet" />
    <link href="<?= $CONTENT_URL ?>/site/responsive/detail.css" rel="stylesheet" />
    <title>Home</title>
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/site/carousel/dist/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/site/carousel/dist/assets/owl.theme.default.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
</head>

<body>
    <header class="app-header container-fluid">
        <div class="container">
            <div class="app-header__top">
                <div class="app-header__top-item">
                    <a href="<?= $SITE_URL ?>/trang-chinh" class=""><img class="logo-desktop" src="https://didongthongminh.vn/images/config/lg_1648528949.svg" alt="" /></a>
                    <a href="<?= $SITE_URL ?>/trang-chinh" class=""><img class="logo-mobile" src="https://didongthongminh.vn/images/config/logo_1648529142.svg" alt="" /></a>
                </div>
                <div class="app-header__top-item show-nav-app">
                    <div class="app-header__top-item-icons">
                        <i class="fa fa-bars" aria-hidden="true"></i>
                    </div>
                    <div class="app-header__top-item-title">Danh mục</div>
                </div>
                <div class="app-header__top-item">
                    <div class="app-header__top-item-title-address">
                        Xem giá, <span> tồn kho</span> tại :
                    </div>

                    <div class="app-header__top-item-title-zone">
                        Đà Nẵng<i class="fa fa-caret-down" aria-hidden="true"></i>
                    </div>
                </div>
                <form action="<?= $SITE_URL ?>/hang-hoa/liet-ke.php" method="GET" class="app-header__top-item">
                    <div class="app-header__top-item-input">
                        <input value="<?= $keyboard ?>" name="keywords" placeholder="Bạn tìm gì ..." />
                    </div>
                    <div class="app-header__top-item-icon">
                        <button class=""> <i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </form>
                <div class="app-header__top-item">
                    <div class="">
                        <img src="https://didongthongminh.vn/templates/default/images/call.svg" alt="" />
                    </div>
                    <div class="app-header__top-item-detail-ship">
                        <span>Gọi mua hàng </span>
                        <b> 0855100001</b>
                    </div>
                </div>
                <div class="app-header__top-item">
                    <div class="">
                        <img src="https://didongthongminh.vn/templates/default/images/store-w.svg" alt="" />
                    </div>
                    <div class="app-header__top-item-detail-ship">
                        <span>Cửa hàng gần bạn </span>
                    </div>
                </div>
                <div class="app-header__top-item">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <a href="<?= $SITE_URL . '/gio-hang' ?>">
                        <div class="app-header__top-item-icon-cart-quantity"></div>
                    </a>
                </div>
                <div class="app-header__top-item">
                    <a href="<?= isset($_SESSION["user"])  ?  $SITE_URL . '/dashboard' :  $SITE_URL . '/tai-khoan?dang-nhap' ?>" class=""> <i class="fa fa-user-o" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </header>
    <?php require "layout/loai-hang.php" ?>
    <main>
        <?php require $VIEW_NAME; ?>
    </main>
    <?php require "layout/top10.php" ?>
    <!--nav mobile -->

    <!---------------------------------------------------------------- -->

    <?php
      if(isset($_SESSION["user"])){
        $user = $_SESSION["user"];
    ?>

<div class="show-app__chat">
        <div class="app-chat__content">
            <div class="app-chat__container">
                <div class="app-chat__tab">
                    <div class="app-chat__tab-image ">
                        <div class="app-chat__tab-image-name">
                            <?= $user['hinh'] ? '<img src="'.$IMAGE_DIR_USER.$user['hinh'].'"   alt="" />' : '<div>'.$user['ho_ten'][0].'</div>'?>
                            <div class="app-chat__tab-image-point"></div>
                        </div>
                    </div>
                    <div class="app-chat__tab-name ">
                        <div class="app-chat__tab-name-title"><span><?=$user['ho_ten']?> (Bạn)</span></div>
                        <div class="app-chat__tab-name-status"><span>Đang hoạt động</span></div>
                    </div>
                    <div class="app-chat__tab-close ">
                        <div>×</div>
                    </div>
                </div>
                <div class="app-chat__detail" id="chat">
                  
                    
                        
                
               
                </div>

              
                <div class="app-chat__post-comment">
                    <div class="app-chat__post-comment-input "><input id="input-post" type="text" placeholder="Aa" value=""></div>
                    <div class="app-chat__post-comment-button ">
                        <div><i class="fa fa-paper-plane" aria-hidden="true"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
      }
    ?>

    <!--------------------------------------------------------------------- -->

    <div class="chat-now" >
       <a href="<?=!isset($_SESSION["user"]) ? $SITE_URL.'/tai-khoan?dang-nhap' : 'javascript:;'?> " class="<?=isset($_SESSION["user"]) ? "show-chat-click": ''?>"> <img src="https://vuminhhung.netlify.app/static/media/200w.002949c9c69a8105b467.gif" alt=""></a>
    </div>

    <footer class="app-footer container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 support-paying">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Thông tin liên hệ</li>
                            <li><a href="<?= $SITE_URL ?>/trang-chinh/?gioi-thieu">Giới thiệu công ty</a></li>
                            <li><a href="<?= $SITE_URL ?>/trang-chinh/?cua-hang">Hệ thống cửa hàng</a></li>
                            <li><a href="">Chính sách bảo mật</a></li>
                            <li><a href="">Mail : online@dcenter.vn</a></li>
                            <li class="app-footer-item__title">Hỗ trợ thanh toán</li>
                            <div class="app-footer-paying__icon">
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/visa.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/master_card.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/jbc.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/money.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/inter.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/tragop.svg" alt="" />
                                </div>
                            </div>

                            <div class="app-footer-paying__icon">
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/bct.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://images.dmca.com/Badges/_dmca_premi_badge_4.png?ID=2dc901db-8576-4fea-ac8f-709448f10282" alt="" />
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Thông tin khác</li>
                            <li><a href="">Chính sách đổi trả</a></li>
                            <li><a href="">Quy chế hoạt động</a></li>
                            <li><a href="">Chính sách bảo hành</a></li>
                            <li><a href="">Tuyển dụng</a></li>
                            <li><a href="">Khách hàng doanh nghiệp</a></li>
                            <li><a href="">Tin tức</a></li>
                            <li><a href="">Trade-in thu cũ lên đời</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Thông tin hỗ trợ</li>
                            <li><a href="">Mua và thanh toán Online</a></li>
                            <li><a href="">Mua trả góp Online</a></li>
                            <li><a href="">Trung tâm bảo hành chính hãng</a></li>
                            <li><a href="">Quy định về viêc sao lưu dữ liệu</a></li>
                            <li><a href="">Hướng dẫn thanh toán chuyển đổi</a></li>
                            <li><a href="">Dịch vụ bảo hành điền thoại</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="app-footer-item">
                        <ul>
                            <li class="app-footer-item__title">Gọi tư vấn & khiếu nại</li>
                            <li><a href="">Gọi mua hàng : 0855100001</a></li>
                            <li><a href="">Hỗ trợ ký thuật : 18006502</a></li>
                            <li><a href="">Hợp tác kinh doanh : 19006122</a></li>
                            <li class="app-footer-item__title">Kết nối với chúng tôi</li>
                            <div class="app-footer-paying__icon">
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/fb.svg" alt="" />
                                </div>
                                <div class="app-footer-paying__icon-item">
                                    <img src="https://didongthongminh.vn/templates/default/images/ytb.svg" alt="" />
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="app-copyright container-fluid">
        <span class="">@ Bản quyền thuộc về Công Ty Cổ Phần Viễn Thông Di Động Thông
            Minh</span>
    </div>
    <script src="<?= $CONTENT_URL ?>/site/carousel/dist/owl.carousel.min.js"></script>
    <script src="<?= $CONTENT_URL ?>/site/javascript/index.js">

    </script>
    <script>
        var owls = $(".app-detail-top__content-carousel-bottom-detail");
        var owl = $(".app-detail-top__content-carousel-top-detail");

        owl.owlCarousel({
            //onDragged: callback,
            onChanged: callback,
            items: 1,
            margin: 11,
            autoplay: false,
            center: true,
            loop: true,
            dots: false,
            nav: true,
            autoplayTimeout: 5000,

        });



        owls.owlCarousel({
            items: 1,
            margin: 11,
            autoplay: false,

            loop: false,
            dots: false,
            nav: false,
            autoplayTimeout: 5000,

            responsive: {
                0: {
                    items: 6,
                },
                600: {
                    items: 6,
                },

                800: {
                    items: 6,
                },
                1000: {
                    items: 6,
                },
                1200: {
                    items: 6,
                },
            },
        });





        $(".click-show-slide").click(function() {
            $(
                ".app-detail-top__content-carousel-bottom-detail .owl-item"
            ).removeClass("carousel-active-border");
            $(this).addClass("carousel-active-border");

            let point = $(this).attr("data-slide");

            owl.trigger("to.owl.carousel", Number(point) - 1, [300]);
        });



        function callback(event) {
            // var item     = event.item.index;
            let current =
                event.item.index + 1 - event.relatedTarget._clones.length / 2;
            let itemsCount = event.item.count;

            if (current > itemsCount) {
                current = 1;
            }

            if (current === 0) {
                current = event.item.count;
            }



            owls.trigger("to.owl.carousel", current - 1, [300]);
            $('.app-detail-top__content-carousel-bottom-detail .owl-item').removeClass('carousel-active-border');
            var selectors = $('.click-show-slide');
            selectors.eq(current - 1).addClass('carousel-active-border');
        }
        $(window).on('popstate', function(event) {
            if (location.href.search('slide=true') >= 0) {

                $('.app-click-show__library').addClass('position-carousel');
                owl.trigger("refresh.owl.carousel", [300]);
                owls.trigger("refresh.owl.carousel", [300]);
            } else {
                $('.app-click-show__library').removeClass('position-carousel');
                owl.trigger("refresh.owl.carousel", [300]);
                owls.trigger("refresh.owl.carousel", [300]);
            }
        });

        $(".app-detail-promotion__content-flex").owlCarousel({
            items: 1,
            margin: 22,
            autoplay: false,

            loop: false,
            dots: false,
            nav: true,
            autoplayTimeout: 5000,


            responsive: {
                0: {
                    items: 2,
                    center: true,
                    autoplay: false,
                },
                600: {
                    items: 3,
                },

                800: {
                    items: 3,
                },
                1000: {
                    items: 4,
                },
                1200: {
                    items: 4,
                },
            },
        });
    </script>
    <script>
        $(document).on("click", ".show-more-detail", function() {
            $('.app-detail-bottom__item-content').css('height', 'auto');
            $(this).addClass('close-more-detail');
            $(this).removeClass('show-more-detail');
            $(this).text('Thu gọn');
        })



        $(document).on("click", ".close-more-detail", function() {
            $(this).removeClass('close-more-detail');
            $(this).addClass('show-more-detail');
            $('.app-detail-bottom__item-content').css('height', '700px');
            $(this).text('Xem thêm');
        });
    </script>


  <?php
    if(isset($_SESSION["user"])){
  ?>

<script>
      
        var listOnline = [];
        var idUser = <?= isset($_SESSION["user"]) ? $_SESSION["user"]['id'] : '' ?> ;
        var nameUser = '<?=$_SESSION["user"]['ho_ten']?>';
        $(document).ready(function() {
            $('.show-chat-click').click(function(){
              $('.show-app__chat').toggle();
              $("#chat").scrollTop($("#chat")[0].scrollHeight);
            });
            $('.app-chat__tab-close ').click(function(){
                $('.show-app__chat').toggle();
            });
            const myTimeout = setTimeout(myGreeting, 1000);

            function myGreeting() {
                $.ajax({
                    method: "GET",
                    url: "https://blog.diaocconsole.tk/get-chat",
                   
                })
                .done(function(msg) {
                    var template = ``;
                    msg.map((value, key) => {
                        //console.log(value)
                        if(value.user_id == idUser){
                            $('#chat').append(`<div class="app-chat__detail-item">
                            <div class="app-chat__detail-item-flex">
                                <div class="app-chat__detail-my-chat-image"></div>
                                <div class="app-chat__detail-my-chat-content"><span> ${value.content}</span></div>
                            </div>
                            <div class="app-chat__detail-someone-date-my-chat">
                                <div><span class="time-current" data-chat="2023-05-14T15:21:50.000Z">${value.createdAt}</span></div>
                            </div>
                        </div>`);
                        
                        }else {
                            $('#chat').append(`<div class="app-chat__detail-item ">
                        <div class="app-chat__detail-someone">
                            <div class="app-chat__detail-someone-name">
                                <div class="${value.user_id == 3 ? "app-chat__detail-someone-name-char border-admin": "app-chat__detail-someone-name-char"}">
                                    <div>${value.name[(value.name).lastIndexOf(" ") + 1]}</div>
                                    ${value.user_id == 3 ? '<div class="app-chat__supper-admin"> AD </div>': ''}
                                    <div class="${checkOnline(value.user_id)}"></div>
                                </div>
                            </div>
                            <div>
                                <div class="app-chat__detail-someone-name"><span>${value.name}</span></div>
                                <div class="app-chat__detail-someone-content"><span> ${value.content}</span></div>
                            </div>
                        </div>
                        <div class="app-chat__detail-someone-date-someone">
                            <div><span class="time-current" data-chat="2023-05-13T02:04:40.000Z">${value.createdAt}</span></div>
                        </div>
                    </div>`);
                    
                        }
                      
                    })
                   
                    
                   
                })
               
            }
            
        });
          let host = "https://blog.diaocconsole.tk";
          let socket = io.connect(host, { path: '/chat/' });
          function postComment(value){
                if (value !== "" && value[0] !== " ") {
                    $('#input-post').val("");
                    const msg = {
                        name: nameUser,
                        content: value,
                        id: idUser,
                        thumb :  null
                    };
                    socket.emit("sendDataClient", msg);
                    socket.emit("sendDataClientTyping", null);
                }
            
          }
          
          function checkOnline(id)  {
            
                let exists = Object.values(listOnline).includes(Number(id));
              //  console.log(">" ,listOnline)
                if(exists){
                    return "app-chat__is-online";
                }
                return "app-chat__is-offline" ;
          }
          socket.emit('login', { userId: idUser });
          socket.on("sendDataServerOnline", (item) => {
             listOnline = (item.users);
          });
          socket.on("sendDataServer", (item) => {
          
                const data = {
                    thumb : item.thumb,
                    name: item.name,
                    content: item.content,
                    user_id: item.id,
                    createdAt: item.createdAt
                }
              if(data.user_id == idUser){
                 $('#chat').append(`<div class="app-chat__detail-item">
                            <div class="app-chat__detail-item-flex">
                                <div class="app-chat__detail-my-chat-image"></div>
                                <div class="app-chat__detail-my-chat-content"><span> ${data.content}</span></div>
                            </div>
                            <div class="app-chat__detail-someone-date-my-chat">
                                <div><span class="time-current" data-chat="2023-05-14T15:21:50.000Z">${data.createdAt}</span></div>
                            </div>
                        </div>`);
                        
                 }else {
                     $('#chat').append(`<div class="app-chat__detail-item">
                        <div class="app-chat__detail-someone">
                            <div class="app-chat__detail-someone-name">
                                <div class="${data.user_id == 3 ? "app-chat__detail-someone-name-char border-admin": "app-chat__detail-someone-name-char"}">
                                    <div>${data.name[(data.name).lastIndexOf(" ") + 1]}</div>
                                    ${data.user_id == 3 ? '<div class="app-chat__supper-admin"> AD </div>': ''}
                                    <div class="${checkOnline(data.user_id)}"></div>
                                </div>
                            </div>
                            <div>
                                <div class="app-chat__detail-someone-name"><span>${data.name}</span></div>
                                <div class="app-chat__detail-someone-content"><span> ${data.content}</span></div>
                            </div>
                        </div>
                        <div class="app-chat__detail-someone-date-someone">
                            <div><span class="time-current" data-chat="2023-05-13T02:04:40.000Z">${data.createdAt}</span></div>
                        </div>
                    </div>`);
                 }
                 $("#chat").scrollTop($("#chat")[0].scrollHeight);

          });
          socket.on("sendDataServerTyping", (item) => {
            
            if($('#chat').find('.app-chat__detail-text-typing').length !== 0){
                if (item.length === 0 ) {
                    $('.add-typing-chat').remove();
                }
            }else {
                if (item.length === 0 ) {
                    $('.add-typing-chat').remove();
                } else {
                    if (item.length >= 1) {
                        $('#chat').append(`<div class="app-chat__detail-item add-typing-chat">
                           <div class="app-chat__detail-someone">
                            <div class="app-chat__detail-text-typing"><span>Ai đó đang nhập </span></div>
                            <div>
                                <div class="app-chat__detail-typing"><img src="https://vuminhhung.netlify.app/static/media/typing.4912cac814f4413ba9df.gif" alt=""></div>
                            </div>
                            </div>
                        </div>`);
                        $("#chat").scrollTop($("#chat")[0].scrollHeight);
                    } else {
                        $('.add-typing-chat').remove();
                    }
                }
                
            }
           
               // console.log(item);
         });
         $(document).on("keyup paste", "#input-post", function(e) {
            var text = $(this).val();
            if (text !== '') {
                socket.emit("sendDataClientTyping", idUser);
            } else {
                socket.emit("sendDataClientTyping", null);
            }


            if(e.keyCode === 13 && e.shiftKey === false){
                postComment(text);
            }
            
         });
         
         $(document).on("click", ".app-chat__post-comment-button", function(e) {
            postComment($('#input-post').val());
         });
    </script>

<?php
    }
?>

   
</body>

</html>