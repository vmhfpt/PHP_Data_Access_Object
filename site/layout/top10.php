<?php
$top16Items = hang_hoa_select_top_16();
?>

<section class="app-name-product__suggest container-fluid">
  <div class="container">
    <div class="row">


    
      <?php
      foreach ($top16Items as $key => $value) {
      ?>
        <div class="col-md-2 col-sm-6 col-6">
          <div class="app-name-product__suggest-item">
            <ul>
                <li class=""><a href="<?= $SITE_URL ?>/hang-hoa/chi-tiet.php?hang_hoa=<?= $value['ma_hh'] ?>" class=""> <?=$value['ten_hh']?></a></li>
             
            </ul>
          </div>
        </div>
      <?php
      }
      ?>




    </div>
  </div>
</section>