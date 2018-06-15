<?php

	/*
	*	sistema de autenticação usuários;
	*
	*	versão 0.5 corrigido o bug de acesso que vai para página de consulta
	*	versão 1.0 atualização de segurança contra mysql insection
	*	versão 1.5 atualização de segurança e correção de bugs de autenticação
	*
	*/

	require_once('connect.class.php');
	require_once('chec_login.class.php');

	if(isset($_REQUEST['app'])){
		if ($_REQUEST['app'] == 'debug'){
			echo "Sistema em manutenção ... por favor tente mais tarde";
			exit();
		} else if ($_REQUEST['app'] == 'prod'){
			
			// sleep(2);

			$acesso = null;

			try{

				if (empty($_REQUEST['usuario']) or empty($_REQUEST['senha'])){
					throw new Exception("Erro... Preencha os campos corretamente");
				}

				$login = new ChecLogin($_REQUEST['usuario'],$_REQUEST['senha']);
				$acesso = $login->acesso($_REQUEST['usuario']);

				 switch ($acesso) {
					case 'lider':
						 echo "lider";
						break;
					case 'Supervisor':
						echo "supervisor";
						break;
					case 'Administrador':
						 echo "admin";
				}

			} catch (Exception $e){
				echo $e->getMessage()."\n";
			}

		}
	}
