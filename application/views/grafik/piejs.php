<script src="<?= base_url();?>assets/js/jquery.min.js"></script>
<script src="<?= base_url();?>assets/js/Chart.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {

	var ctx1 = $("#pie-chartcanvas-1");

	var data1 = {
		labels : [<?php 
                  $j='0';
                  for ($i=1; $i <= count($label['A']); $i++) { 
                    echo "'".$label['A'][$j++]."'";
                    echo $i!=count($label['A']) ? ',' : '';
                  }
                  ?>],
		datasets : 
		[
        <?php $j='B'; for ($x=0; $x < count($value2); $x++) {  ?>
        {
          	label           : 'Dataset 1',
		  	backgroundColor : '<?php echo $color[$x]; ?>',
        	borderColor 	: '#fff',
            borderWidth 	: [2, 1, 1, 1, 1],
          	data            : [<?php for ($i=0; $i < count($value2[$j]) ; $i++) { 
								echo "'".$value2[$j][$i]."'";
								echo $i!=count($value2[$j])-1 ? ',' : '';
								} 
								$j++; ?>]
        },
        <?php } ?>
      ],
	
	};

	var options = {
		legend : {
			display : false,
			position : "bottom"
		}
	};


	var chart1 = new Chart( ctx1, {
		type : "pie",
		data : data1,
		options : options
	});


});
</script>