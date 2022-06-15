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
	<title>Doughnut Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <center>Doughnut Chart COVID-19</center>
    <center>Total Cases | Total Deaths | Total Recovered</center>
	<div style="width: 1200px;height: 1200px">
		<canvas id="DoughnutChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("DoughnutChart").getContext('2d');
		var DoughnutChart = new Chart(ctx, {
			type: 'doughnut',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Total Cases',
                    data: <?php echo json_encode($totalcases); ?>,
                    backgroundColor: [
                    'rgba(159, 192, 136, 1)', 
					'rgba(232, 192, 125, 1)', 
					'rgba(204, 112, 75, 1)', 
                    'rgba(97, 65, 36, 1)', 
                    'rgba(224, 216, 176, 1)', 
                    'rgba(252, 255, 231, 1)', 
                    'rgba(222, 160, 87, 1)', 
                    'rgba(206, 148, 97, 1)', 
                    'rgba(58, 56, 69, 1)', 
                    'rgba(130, 111, 102, 1)' 
					],
                    hoverOffset: 4
                },
                {
                    label: 'Total Death',
                    data: <?php echo json_encode($totaldeaths); ?>,
                    backgroundColor: [
                    'rgba(159, 192, 136, 1)', 
					'rgba(232, 192, 125, 1)', 
					'rgba(204, 112, 75, 1)', 
                    'rgba(97, 65, 36, 1)', 
                    'rgba(224, 216, 176, 1)', 
                    'rgba(252, 255, 231, 1)', 
                    'rgba(222, 160, 87, 1)', 
                    'rgba(206, 148, 97, 1)', 
                    'rgba(58, 56, 69, 1)', 
                    'rgba(130, 111, 102, 1)' 
					],
                    hoverOffset: 4
                },
                {
                    label: 'Total Recovered',
                    data: <?php echo json_encode($totalrecovered); ?>,
                    backgroundColor: [
                    'rgba(159, 192, 136, 1)', 
					'rgba(232, 192, 125, 1)', 
					'rgba(204, 112, 75, 1)', 
                    'rgba(97, 65, 36, 1)', 
                    'rgba(224, 216, 176, 1)', 
                    'rgba(252, 255, 231, 1)', 
                    'rgba(222, 160, 87, 1)', 
                    'rgba(206, 148, 97, 1)', 
                    'rgba(58, 56, 69, 1)', 
                    'rgba(130, 111, 102, 1)' 
					],
                    hoverOffset: 4
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