@extends('layout.main')

@section('title') Dashboard @endsection

@section('content')

<div class="pagetitle"><h1>@lang('app.dash')</h1></div>
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
@include('home.overview')

<br>
@include('home.chart')


</section>
@endsection

@section('js')
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
      title:'@lang('app.store_wise_sub')',
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
          text: "@lang('app.chart_month')"
        }
      }
    });
    </script>

@endsection