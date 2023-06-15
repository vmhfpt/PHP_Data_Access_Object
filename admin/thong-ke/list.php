

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Thống kê</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Thống kê hàng hóa</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
    
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Tổng số 12/50 khách hàng</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Thống kê hàng hóa theo loại </h3>
                              
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th >LOẠI HÀNG</th>
                                            <th>SỐ LƯỢNG</th>
                                            <th>GIÁ CAO NHẤT</th>
                                            <th>GIÁ THẤP NHẤT</th>
                                            <th>GIÁ TRUNG BÌNH</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                      <?php
                                       foreach($dataItem as $key => $value){
                                     ?>
                                    <tr>
                                        <td><?=$value['ten_loai']?></td>
                                        <td><?=$value['so_luong']?></td>
                                        <td><?=currency_format($value['max_price'])?></td>
                                        <td><?=currency_format($value['min_price'])?></td>
                                        <td><?=currency_format($value['don_gia_avg'])?></td>
                                      </tr>
                                     <?php
                                       }
                                     ?>
                                      


                                    </tbody>
                                </table>
                            </div>

                            <div class="card-footer clearfix">
                                <ul class="pagination pagination-sm m-0 float-right">
                                    <li class="page-item"><a class="page-link" href="#">«</a></li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>



                </div>


            </div>

            <div class="card-footer">
                <a href="index.php?chart" class=""> <button type="button" class="btn btn-success m-2">Xem biểu đồ</button></a>
            </div>


        </div>
    </div>
</section>