<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Danh sách đơn hàng</li>
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
                        <h3 class="card-title">Danh sách Đơn hàng anh chị <?= $nameOrder['name'] ?></h3>
                    </div>
                    <div class="wrapper">



                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Chi tiết đơn hàng</h1>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                                            <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">


                                            <div class="card-body table-responsive p-0">
                                                <table class="table table-hover text-nowrap">
                                                    <thead>
                                                        <tr>
                                                            <th>STT</th>
                                                            <th>Ảnh</th>
                                                            <th>Tên</th>

                                                            <th>Giá</th>
                                                            <th>Số lượng</th>
                                                            <th>Tổng</th>
                                                            <th> Xóa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $totalProduct = 0;
                                                        $totalPrice = 0;
                                                        foreach ($dataItem as $key => $value) {
                                                            $totalProduct = $totalProduct  + $value['quantity'];
                                                            $totalPrice =  $totalPrice + ($value['quantity'] * $value['price_sale']);
                                                        ?>
                                                            <tr id="data-delete-<?=$value['id']?>">
                                                                <td><?= $key + 1 ?></td>
                                                                <td> <img src="<?= $IMAGE_DIR_PRODUCT . $value['hinh'] ?>" width="80" height="80"></td>
                                                                <td><?= $value['name_product'] ?></td>

                                                                <td><?= currency_format($value['price_sale']) ?></td>
                                                                <td><?= $value['quantity'] ?></td>
                                                                <td> <?= currency_format($value['quantity'] * $value['price_sale']) ?>
                                                                </td>

                                                                <td><a data-order="<?=$_GET["order"]?>" data-delete="<?= $value["id"] ?>" data-total="<?= $value['quantity'] * $value['price_sale'] ?>" href="javascript:;" class="btn btn-danger btn-delete-admin"><i class="fas fa-trash"></i></a></td>
                                                            </tr>

                                                        <?php

                                                        }
                                                        ?>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th>Tổng sản phẩm <?= $totalProduct ?>
                                                            </th>
                                                            <th>Tổng tiền :<?= currency_format($totalPrice) ?></th>
                                                            <th></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </section>


                        <div id="sidebar-overlay"></div>
                    </div>

                </div>


            </div>
        </div>
    </div>
</section>

<script>
    $(document).on("click", ".btn-delete-admin", function(e) {
        if (confirm("Bạn có chắc muốn xóa không") == true) {
            var id = $(this).attr("data-delete");
            var total = $(this).attr("data-total");
            var order_id = $(this).attr("data-order");
            $.ajax({
                 method: "POST",
                 url: "index.php?btn_delete_order",
                 data: {
                     type: 'delete',
                     id: id,
                     total : total,
                     order_id : order_id
                 }
             })
             .done(function(msg) {
                
                 msg = JSON.parse(msg);
                 if (msg.status == 'success') {
                    location.reload();
                 }
                 
             });
        } 
    });
</script>