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
	<title>Bar Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<center>Bar Covid COVID-19</center>
	<div style="width: 1200px;height: 1200px">
		<canvas id="BarChart"></canvas>
	</div>


	<script>
		var ctx = document.getElementById("BarChart").getContext('2d');
		var BarChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($nama_negara); ?>,
                datasets: [{
                    label: 'Total Cases',
                    data: <?php echo json_encode($totalcases); ?>,
                    backgroundColor: 'rgba(211, 235, 205, 1)', 
                    borderWidth: 1
                },
                {
                    label: 'Total Death',
                    data: <?php echo json_encode($totaldeaths); ?>,
                    backgroundColor: 'rgba(131, 154, 168, 1)', 
                    borderWidth: 1
                },
                {
                    label: 'Total Recovered',
                    data: <?php echo json_encode($totalrecovered); ?>,
                    backgroundColor: 'rgba(99, 86, 102, 1)', 
                    borderWidth: 1
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