<?php

	function parse_data($data, $op)
	{
		$data_ini = explode('-', trim($data));
		switch($op){
			case 'db':
				$data_end = $data_ini[2]."-".$data_ini[1]."-".$data_ini[0];
				return $data_end;
				break;
			case 'usr':
				$data_end = $data_ini[0]."-".$data_ini[1]."-".$data_ini[2];
				return $data_end;
				break;
			default: return null;
		}
	}

    $mysqli = new mysqli('localhost','filial85','senhafilial','atacadao');
    
    $mysqli->query("SET CHARACTER SET UTF-8");
