

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách bình luận sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách bình luận</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách đánh giá sản phẩm</h3>
                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Danh mục</th>
                                <th>Mới nhất</th>
                                <th>Cũ Nhất</th>
                                <th>Tổng đánh giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($dataItem as $key => $value) {
                            ?>

                                <tr>
                                    <td><?=$key+1?></td>
                                    <td> <?=$value['ten_hh']?>
                                    </td>
                                    <td> <img src="<?=$IMAGE_DIR_PRODUCT.$value['hinh']?>" width="80" height="80">
                                    </td>

                                    <td> <?=$value["ten_loai"]?></td>
                                    <td><?=$value["moi_nhat"]?></td>
                                    <td><?=$value["cu_nhat"]?></td>
                                    <td> <a href="index.php?btn_detail&ma_hh=<?=$value['ma_hh']?>"> <button type="button" class="btn btn-primary">Xem chi tiết <?=$value['total']?> đánh giá</button> </a></td>

                                </tr>
                            <?php
                            }
                            ?>


                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
</section>