<?php
include('conndb.php');
$negara = mysqli_query($conn,"select * from tb_country");
while($row = mysqli_fetch_array($negara)){
	$nama_negara    [] = $row['country'];
	
	$query = mysqli_query($conn,"SELECT new_cases, new_deaths, new_recovered FROM tb_new WHERE id_country='".$row['id_country']."'");
	$row = $query->fetch_array();
    $newcases[] = $row['new_cases'];
    $newdeaths[] = $row['new_deaths'];
    $newrecovered[] = $row['new_recovered'];
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
    <center>New Cases | New Death | New Recovered</center>
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
                    label: 'New Cases',
                    data: <?php echo json_encode($newcases); ?>,
                    backgroundColor: [
                    'rgba(37, 29, 58, 1)', 
					'rgba(224, 77, 1, 1)', 
					'rgba(42, 37, 80, 1)', 
                    'rgba(7, 97, 125, 1)', 
                    'rgba(247, 98, 98, 1)', 
                    'rgba(33, 101, 131, 1)', 
                    'rgba(207, 253, 248, 1)', 
                    'rgba(99, 0, 0, 1)', 
                    'rgba(0, 0, 0, 1)', 
                    'rgba(216, 182, 164, 1)' 
					],
                    hoverOffset: 4
                },
                {
                    label: 'New Death',
                    data: <?php echo json_encode($newdeaths); ?>,
                    backgroundColor: [
                    'rgba(37, 29, 58, 1)', 
					'rgba(224, 77, 1, 1)', 
					'rgba(42, 37, 80, 1)', 
                    'rgba(7, 97, 125, 1)', 
                    'rgba(247, 98, 98, 1)', 
                    'rgba(33, 101, 131, 1)', 
                    'rgba(207, 253, 248, 1)', 
                    'rgba(99, 0, 0, 1)', 
                    'rgba(0, 0, 0, 1)', 
                    'rgba(216, 182, 164, 1)' 
					],
                    hoverOffset: 4
                },
                {
                    label: 'New Recovered',
                    data: <?php echo json_encode($newrecovered); ?>,
                    backgroundColor: [
                    'rgba(37, 29, 58, 1)', 
					'rgba(224, 77, 1, 1)', 
					'rgba(42, 37, 80, 1)', 
                    'rgba(7, 97, 125, 1)', 
                    'rgba(247, 98, 98, 1)', 
                    'rgba(33, 101, 131, 1)', 
                    'rgba(207, 253, 248, 1)', 
                    'rgba(99, 0, 0, 1)', 
                    'rgba(0, 0, 0, 1)', 
                    'rgba(216, 182, 164, 1)' 
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