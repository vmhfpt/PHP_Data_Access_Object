
<?php
 $arrBgr = ["#0074D9", "#FF4136", "#2ECC40",
            "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00",
            "#001f3f", "#39CCCC", "#01FF70", "#85144b",
            "#F012BE", "#3D9970", "#111111", "#AAAAAA"];
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Thống kê biểu đồ</h3>
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
            <div class="col-md-8">
                <div class="chart-responsive">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="pieChart" height="104" style="display: block; width: 208px; height: 104px;" width="208" class="chartjs-render-monitor"></canvas>
                </div>

            </div>

            <div class="col-md-4">
                <ul class="chart-legend clearfix">
                 
                    <?php
                        foreach($dataItem as $key => $value){
                    ?>
                        <li><i class="far fa-circle" style="color : <?=$arrBgr[$key]?> !important"></i> <?=$value["ten_loai"]?></li>
                    <?php
                        }
                    ?>
                </ul>
            </div>

        </div>

    </div>

    

</div>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js">
</script>
<script>
    

      const ctx = document.getElementById("pieChart").getContext('2d');
      const myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: [<?php foreach($dataItem as $key => $value){ ?>
             "<?=$value["ten_loai"]?>",
          <?php }?>
        ],
          datasets: [{
            label: 'food Items',
            data: [<?php foreach($dataItem as $key => $value){ ?>
             <?=(int) $value["so_luong"]?>,
          <?php }?>],
            backgroundColor: ["#0074D9", "#FF4136", "#2ECC40",
            "#FF851B", "#7FDBFF", "#B10DC9", "#FFDC00",
            "#001f3f", "#39CCCC", "#01FF70", "#85144b",
            "#F012BE", "#3D9970", "#111111", "#AAAAAA"]
          }]
        },
      });
</script>