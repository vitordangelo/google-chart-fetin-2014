<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Grafico de despesas usando Json</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" type="text/javascript"></script>
	<script src="https://www.google.com/jsapi" type="text/javascript"></script>

	<script type="text/javascript"> //Script para carregar o gráfico a cada n milisegundos
		$(function(){
			var refreshAutomatico = setInterval(function() {
				$('div_chart').load(desenhaGraficoDespesas());
			},5000)	
	});
	</script>

	<link href="estilos.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

	<header>

		<img src="branco64.png" alt="Logo" height="110" width="110" style="margin-left: 8px; margin-top: -10px;">

		<a href="http://localhost:8080/PedidoVenda/Home.xhtml">
  			<img src="emitir.png" alt="Sistema" style="position: absolute; left: 500px; top: 20px;" 
  			     height="60" width="110">
		</a>



		<div style="float: right; margin-right: 110px">
			<span style="float: left; height: 30px; line-height: 30px; margin-right: 60px; 
		      	         margin-top: 10px; color: #1A0000; font-family: 'Audiowide', cursive; font-size: 12px">
				Olá usuário
			</span>
		</div>
	</header>

	<div id="div_chart"></div>
	<script type="text/javascript">
		google.load('visualization','1',{'packages': ['corechart'], 'language':'pt-BR'});
		google.setOnLoadCallback(desenhaGraficoDespesas);

		function desenhaGraficoDespesas()
		{
			var jsonData = $.ajax({
				url:"getAllGauge.php",
				dataType: "json",
				async: false
			}).responseText;

			var dados = new google.visualization.DataTable(jsonData);
			
			var options = {
				width: 400, height: 120,
          		redFrom: 90, redTo: 100,
          		yellowFrom:75, yellowTo: 90,
          		minorTicks: 5
			};

			//var chart = new google.visualization.AreaChart(document.getElementById('div_chart')); 
			var chart = new google.visualization.Gauge(document.getElementById('div_chart')); 
			


			chart.draw(dados, options);
	}
	</script>

</body>
</html>
