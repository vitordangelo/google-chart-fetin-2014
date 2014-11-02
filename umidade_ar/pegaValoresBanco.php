<?php 
	include("config.php"); //Inclui o arquivo de configurações

	class Despesas
	{
		public function pesquisaTodasAsDespesas()
		{
			//try - catch para tratar qualquer erro de conexão
			try {
				$conn = new PDO("mysql:host=".HOST.";dbname=".DATABASE,USER,PASS); //Classe para conexão ao BD

				$table = array();
				$rows = array();
				
				$result = $conn -> query('SELECT * FROM leitura'); //Realiza a consulta no BD.
				if ($result) 
				{	
					while ($linha = $result -> fetch(PDO::FETCH_ASSOC)) //Enquanto houver linha na tabela, busca elemento
					{	
						//echo $linha['mes']." - ".$linha['valor_despesa']." - ".$linha['obs']." - ".$linha['ano']."<br>";
						//echo $linha['mes']." - ".$linha['valor_despesa']."<br>";
						$id = $linha['idleitura']; //Guarda o valor do mes no objeto mes
						$num1 = $linha['valor']; //Guarda o valor da despesa no objeto vlDespesa
						//$num2 = $linha['num2'];
						//$limiteTemperatura = 35;
						$temp = array();
						//$temp[] = array('v'=>utf8_encode($id));
						$temp[] = array($num1);
						//$temp[] = array($num2);
						//$temp[] = array($limiteTemperatura);
						$rows[] = array($temp);
					}
					$table['rows'] = $rows;
					$jsonTable = json_encode($table);
				}
				echo $jsonTable;

			} catch (PDOException $i) 
			{
				//Imprime o erro
				print"Erro:".$i ->getMessage(); 	
			}
		}	

	}

 ?>