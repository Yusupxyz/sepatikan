<script src="<?= base_url();?>assets/bower_components/chart.js/Chart.js"></script>
<script type="text/javascript">

$(function(){
    var areaChartData = {
      labels  : [<?php 
                  $j='0';
                  for ($i=1; $i <= count($label['A']); $i++) { 
                    echo "'".$label['A'][$j++]."'";
                    echo $i!=count($label['A']) ? ',' : '';
                  }
                  ?>],
      datasets: [
        <?php $j='B'; for ($x=0; $x < count($value2); $x++) {  ?>

          {
          label               : 'Dataset 1',
          fillColor           : '<?php echo $color[$x]; ?>',
          strokeColor         : '<?php echo $color[$x]; ?>',
          pointColor          : '<?php echo $color[$x]; ?>',
          pointStrokeColor    : '<?php echo $color[$x]; ?>',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?php for ($i=0; $i < count($value2[$j]) ; $i++) { 
             echo "'".$value2[$j][$i]."'";
             echo $i!=count($value2[$j])-1 ? ',' : '';
          } 
          $j++; ?>]
        },
        <?php } ?>
      ],
      
    }
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
    var barChart                         = new Chart(barChartCanvas)
    var barChartData                     = areaChartData
    var barChartOptions                  = {
      scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'probability'
          }
        }]
      },
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero        : true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines      : true,
      //String - Colour of the grid lines
      scaleGridLineColor      : 'rgba(0,0,0,.05)',
      //Number - Width of the grid lines
      scaleGridLineWidth      : 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines  : true,
      //Boolean - If there is a stroke on each bar
      barShowStroke           : true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth          : 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing         : 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing       : 1,
      //String - A legend template
      legendTemplate          : '',
      //Boolean - whether to make the chart responsive
      responsive              : true,
      maintainAspectRatio     : true
    }

    barChartOptions.datasetFill = false
    <?php if ($id_jenis_grafik=='1'){ ?>
      barChart.Bar(barChartData, barChartOptions)
    <?php }elseif ($id_jenis_grafik=='2'){ ?>
      barChart.Line(barChartData, barChartOptions)
    <?php } ?>
  });
 
$(document).ready(function() {
    // $('#mytable').DataTable( {
    //     data: dataSet,
    //     columns: [
    //        <?php
    //             echo $header;
    //         ?>
    //     ]
    // } );
} );

     
</script>