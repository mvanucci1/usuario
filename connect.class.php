<?php 

	/*
	*
	*	Classe que realiza a conexão com o banco de dados.
	*
	*/

	class Connection extends PDO {
		
		private $dns = "mysql:host=localhost;dbname=atacadao";
		private $user = "root";
		private $pass = "suasenha";
		public 	$handle = null;
		
		public function __construct(){
			try{
				if ($this->handle == null){
					$conect = parent::__construct($this->dns, $this->user, $this->pass);
					$this->handle = $conect;
					return $this->handle;
				}
			} catch(PDOException $ex){
				echo $ex->getMessage();
				return false;
			}
		}
		
		public function __descruct(){
			$this->handle = null;
		}
	
	}
