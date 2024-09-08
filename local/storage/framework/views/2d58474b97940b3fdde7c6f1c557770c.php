<?php $__env->startSection('title'); ?> Dashboard <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="pagetitle"><h1><?php echo app('translator')->get('app.dash'); ?></h1></div>
<section class="section">
<style>
.total
{
    border-left: 10px solid #03a9f4;
}

.current
{
    border-left: 10px solid #009688;
}

.last
{
    border-left: 10px solid #ff9800;
}
</style>
<br>
<?php echo $__env->make('home.overview', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<br>
<?php echo $__env->make('home.chart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

<?php
$jsArray = "const data = google.visualization.arrayToDataTable([\n";
$jsArray .= "  ['Contry','Mhl'],\n";

foreach ($chart['sub'] as $store) {
    $storeName = $store['store'];
    $jsArray .= "  ['$storeName', $store[total]],\n";
}

$jsArray .= "]);";
?>

<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    
    function drawChart() {
    
    <?php echo $jsArray; ?>
      
    
    const options = {
      title:'<?php echo app('translator')->get('app.store_wise_sub'); ?>',
      is3D:true
    };
    
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
      chart.draw(data, options);
    }
    </script>

<script>
    var xValues = [<?php echo implode(",",$chart['months']); ?>];
    var yValues = [<?php echo implode(",",$chart['com']); ?>];
    var barColors = ["red", "green","blue","orange","brown","pink"];
    
    new Chart("monthWise", {
      type: "bar",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        legend: {display: false},
        title: {
          display: true,
          text: "<?php echo app('translator')->get('app.chart_month'); ?>"
        }
      }
    });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/tifin_app/local/resources/views/home/home.blade.php ENDPATH**/ ?>