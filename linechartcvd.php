<?php
include('conndb.php');
$negara = mysqli_query($conn,"select * from tb_country");
while($row = mysqli_fetch_array($negara)){
	$nama_negara    [] = $row['country'];
	
	$query = mysqli_query($conn,"SELECT total_cases, total_deaths, total_recovered FROM tb_total WHERE id_country='".$row['id_country']."'");
	$row = $query->fetch_array();
	$totalcases[] = $row['total_cases'];
    $totaldeaths[] = $row['total_deaths'];
    $totalrecovered[] = $row['total_recovered'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Line Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<center>Line Chart COVID-19</center>
	<div style="width: 1200px;height: 1200px">
		<canvas id="LineChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("LineChart").getContext('2d');
		var LineChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Total Cases',
                    data: <?php echo json_encode($totalcases); ?>,
                    fill: false,
                    borderColor: 'rgba(211, 235, 205, 1)',
                    backgroundColor: 'rgba(211, 235, 205, 1)',
                    tension: 0.1
                },
                {
                    label: 'Total Death',
                    data: <?php echo json_encode($totaldeaths); ?>,
                    fill: false,
                    borderColor: 'rgba(131, 154, 168, 1)',
                    backgroundColor: 'rgba(131, 154, 168, 1)',
                    tension: 0.1
                },
                {
                    label: 'Total Recovered',
                    data: <?php echo json_encode($totalrecovered); ?>,
                    fill: false,
                    borderColor: 'rgba(99, 86, 102, 1)',
                    backgroundColor: 'rgba(99, 86, 102, 1)',
                    tension: 0.1
                }]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>