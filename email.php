<?php

	$nome = $_POST["txtNome"];
	$assunto = $_POST["txtAssunto"];
	$m = $_POST["txtMsg"];
	
	
	$headers = 'MIME-Version:1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset="UTF-8"'. "\r\n";
	$headers .= 'FROM: Sistema de USUARIO <system@atacadao.com.br>' . "\r\n";
	$destino = "cpdpiracicaba@atacadao.com.br";
	$remetente = $nome;
	$msg = $m;						

		
		
	try{
		if (empty($nome) or empty($assunto) or empty($m)){
			throw new Exception("Ocorreu um erro na tentativa de enviar o e-mail... Por favor, tente novamente");
		}
		mail($destino,"$assunto",$msg,$headers);
		echo "E-mail enviado com sucesso";
	}
	catch (Exception $e){
		echo $e->getMessage();
	}
	
	
	


