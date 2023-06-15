<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách bình luận sản phẩm "<?= $data['ten_hh'] ?>"</h1>
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
                        <h3 class="card-title">Danh sách đánh giá sản phẩm "<?= $data['ten_hh'] ?>"</h3>
                    </div>


                    <div class="show-here-comment-children">
                    </div>
                    <div class="show-here-comment-dashboard">


                    </div>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Nội dung</th>
                                <th>Ngày post</th>

                             
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                         <?php
                            foreach($dataItem as $key => $value){
                         ?>
                        <tr id="<?=$value['ma_bl']?>">
                                <td><?=$key+ 1?></td>
                                <td>
                                    <?=$value['ho_ten']?>
                                </td>
                               
                                <td> <?=$value['noi_dung']?></td>
                                <td> <?=$value['ngay_bl']?></td>
                               
                                
                                
                                <td>
                                    <a data-delete="<?=$value['ma_bl']?>"  class="btn btn-danger btn-sm btn-delete-cmt" href="javascript:;">
                                        <i class="fas fa-trash">
                                        </i>
                                        Xóa
                                    </a>
                                </td>

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

<script>
    $(document).on("click", ".btn-delete-cmt", function(e) {
        if (confirm("Bạn có chắc muốn xóa không") == true) {
            var id = $(this).attr("data-delete");
           
            $.ajax({
                 method: "POST",
                 url: "index.php?btn_delete",
                 data: {
                     id: id, 
                 }
             })
             .done(function(msg) {
                 msg = JSON.parse(msg);
                 if (msg.status == 'success') {
                    $('#' + id).remove();
                 }
                 
             });
        } 
    });
</script>

