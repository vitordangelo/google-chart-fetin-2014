<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Direção do Vento</title>
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

		<a href="http://spin1.hospedagemdesites.ws/velocidade_vento/grafico.php">
  			<img src="catavento_white60.png" alt="Sistema" style="position: absolute; left: 500px; top: 20px;" >
		</a>
		<a href="http://spin1.hospedagemdesites.ws/pluviometro/grafico.php">
  			<img src="cloud_white60.png" alt="Sistema" style="position: absolute; left: 580px; top: 20px;" >
		</a>
		<a href="http://spin1.hospedagemdesites.ws/temperatura/grafico.php">
  			<img src="termometro_white60.png" alt="Sistema" style="position: absolute; left: 670px; top: 20px;" >
		</a>

		<a href="http://spin1.hospedagemdesites.ws/umidade_ar/grafico.php">
  			<img src="gota_white60.png" alt="Sistema" style="position: absolute; left: 715px; top: 20px;" >
		</a>



		<div style="float: right; margin-right: 110px">
			<span style="float: left; height: 30px; line-height: 30px; margin-right: 60px; 
		      	         margin-top: 10px; color: #1A0000; font-family: 'Audiowide', cursive; font-size: 12px">
				FETIN 2014
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
				url:"getAllDespesas.php",
				dataType: "json",
				async: false
			}).responseText;

			var dados = new google.visualization.DataTable(jsonData);
			
			var options = {
				width: 1300,
				height: 500,
				title: 'Monitoramento',
				hAxis: {title: 'Leituras',     titleTextStyle: {color: '#000000'}}, //Título Eixo X
				vAxis: {title: 'Ângulo',  titleTextStyle: {color: '#000000'}}, //Título Eixo Y
				title: "SPin", titleTextStyle: {color: '#006400'},
				explorer: {axis: 'horizontal'},
				//explorer: { axis: 'vertical' },
				animation:{ duration: 1000, easing: 'out'},
				//explorer: { actions: ['dragToZoom','rightClickToReset']}, //Selecionar pra dar Zoom 
				enableInteractivity: 'true',
				curveType: 'function'
    			//legend: { position: 'bottom' }
				 
			}

			//var chart = new google.visualization.AreaChart(document.getElementById('div_chart')); 
			var chart = new google.visualization.AreaChart(document.getElementById('div_chart')); 
			


			chart.draw(dados, options);
	}
	</script>

</body>
</html>
