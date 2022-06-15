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
	<title>Bar Chart COVID-19</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>
<body>
<center>Bar Chart COVID-19</center>
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
                    label: 'New Cases',
                    data: <?php echo json_encode($newcases); ?>,
                    backgroundColor: 'rgba(0, 110, 127, 1)', 
                    borderWidth: 1
                },
                {
                    label: 'New Death',
                    data: <?php echo json_encode($newdeaths); ?>,
                    backgroundColor: 'rgba(248, 203, 46, 1)', 
                    borderWidth: 1
                },
                {
                    label: 'New Recovered',
                    data: <?php echo json_encode($newrecovered); ?>,
                    backgroundColor: 'rgba(178, 39, 39, 1)', 
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