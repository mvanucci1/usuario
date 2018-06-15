<?php

	ini_set("display_errors", 1);

	function parse_data($data, $op)
	{
		$data_ini = explode(' / ', trim($data));
		switch($op){
			case 'db':
				$data_end = $data_ini[2]."-".$data_ini[1]."-".$data_ini[0];
				return $data_end;
				break;
			case 'usr':
			$data_end = $data_ini[0]."/".$data_ini[1]."/".$data_ini[2];
				return $data_end;
				break;
			default: return null;
		}
	}

	$con = new mysqli('localhost', 'filial85', 'senhafilial', 'atacadao');
	
	if ($con)
		echo 'Conectei ao banco de dados'. "<br>";
	else 
		echo 'erro na conexão';
	
	echo 'Realizando bkp da tabela usuario_f85'. "<br>";
	
	$str_sql = "select * from usuario_f85";
	$query = $con->query($str_sql);
	
	while ($row = $query->fetch_object()){
		
		if ($row->id < 254){
			$sql = "insert into usuario_f85_bkp set ";
			$sql .= "nome = '{$row->nome}', ";
			$sql .= "matricula = '{$row->matricula}', ";
			$sql .= "cpf = '{$row->cpf}', ";
			$sql .= "rg = '{$row->rg}', ";
			$sql .= "setor = '{$row->setor}', ";
			$sql .= "funcao = '{$row->funcao}', ";
			$sql .= "usuario = '{$row->usuario}', ";
			$sql .= "data = '". parse_data($row->data, 'db') ."', ";
			$sql .= "lider = '{$row->lider}', ";
			$sql .= "chamado = '{$row->chamado}', ";
			$sql .= "sistema = '{$row->sistema}', ";
			$sql .= "motivo = '{$row->motivo}', ";
			$sql .= "status = '{$row->status}' ";
			// echo $sql."<br>";
			$commandText = $con->query($sql);
			if ($commandText){
				echo "Importado com sucesso {$row->id}<br>";
			}
		} else {
			$sql = "insert into usuario_f85_bkp set ";
			$sql .= "nome = '{$row->nome}', ";
			$sql .= "matricula = '{$row->matricula}', ";
			$sql .= "cpf = '{$row->cpf}', ";
			$sql .= "rg = '{$row->rg}', ";
			$sql .= "setor = '{$row->setor}', ";
			$sql .= "funcao = '{$row->funcao}', ";
			$sql .= "usuario = '{$row->usuario}', ";
			$sql .= "data = '". $row->data."', ";
			$sql .= "lider = '{$row->lider}', ";
			$sql .= "chamado = '{$row->chamado}', ";
			$sql .= "sistema = '{$row->sistema}', ";
			$sql .= "motivo = '{$row->motivo}', ";
			$sql .= "status = '{$row->status}' ";
			$commandText = $con->query($sql);
			if ($commandText){
				echo "Importado com sucesso {$row->id}<br>";
			}
			
		}
		
		// $commandText = $con->query($sql);
		
	}
	
	echo 'BKP realizado com sucesso <br>';
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	