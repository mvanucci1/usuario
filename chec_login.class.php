<?php

	/*
	*	Classe ChecLogin
	*
	*	1 - Verifica se o usuário estão cadastrado no sistema.
	*	2 - Cria a sessão e loga o usuário no sistema de solicitação de usuários.
	*	3 - Verifica o nivel de acesso.
	*/

	class ChecLogin{
		
		private $sessao = true;
		private $autenticado = false;
		
		public function __construct($usr, $pass){
			$this->validaUsuario($usr, $pass);
			//$this->logaUsuario($usr, $pass);
		}
		
		private function validaUsuario($usuario, $senha){
			
			try{
				$pdo = new Connection;
				$sql = "SELECT login, senha FROM tb_usuario_f85 where login = ? AND senha = ?";
				$chec = $pdo->prepare($sql);
				$chec->bindValue(1, $usuario, PDO::PARAM_STR);
				$chec->bindValue(2, $senha, PDO::PARAM_STR);
				$chec->execute();
				
				if ($chec->rowCount() > 0){
					return $this->autenticado = true;
				} else {
					throw new Exception("Erro... usuário não esta cadastrado no sistema");
				}
				
			} catch(Exception $ex){
				echo $ex->getMessage()."\n";
				return false;
			}
		}
		
		private function logaUsuario($usuario, $senha){
			if ($this->validaUsuario($usuario, $senha)){
				try{
					if ($this->sessao){
						session_start();
						$_SESSION['usuario'] = $usuario ;
						$_SESSION['senha'] = $senha;	
						return true;
					} else {
						throw new Exception("Erro... na tentativa de logar o usuário");
					}
				} catch (Exception $ex) {
					echo $ex->getMessage()."\n";
					return false;
				}
			}
			
		}
	
		public function acesso($usuario){
			try {
				$pdo = new Connection;
				$sql = "SELECT funcao FROM tb_usuario_f85 where login = ?";
				$chec = $pdo->prepare($sql);
				$chec->bindValue(1,$usuario, PDO::PARAM_STR);
				$chec->execute();
				$permicao = $chec->fetch(PDO::FETCH_OBJ);
				$funcao = $permicao->funcao;
				
				if ($chec->rowCount() > 0){
					$_SESSION['funcao'] = $funcao;
					return $funcao;
				} else {
					throw new Exception("Erro... Acesso negado");
				}
				
			} catch(Exception $ex){
				echo $ex->getMessage()."\n";
				return false;
			}
		}
	}

