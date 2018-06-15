<?php

ini_set('display_errors', 1);
ini_set('display_startup_erros', 1);
error_reporting(E_ALL);


$usuario = $_REQUEST["usuario"];
$senha = $_REQUEST["senha"];



if (empty($usuario) or empty($senha)) {
    echo '<script>'
    . ' alert ("Preencha o campos usuário e senha corretamente.");'
    . 'history.go(-1);'
    . '</script>';
} else {

    $mysql = new mysqli('localhost', 'filial85', 'senhafilial', 'atacadao');
    $q = "select login, senha, funcao from tb_usuario_f85 where login = ? and senha = ?";
    $sql = $mysql->prepare($q);
    $sql->bind_param('ss', $usuario, $senha);
    $sql->execute();
    $sql->store_result();

    if ($sql->num_rows > 0) {
        $qr = "select funcao from tb_usuario_f85 where login='" . $usuario . "'";
        $sql = $mysql->query($qr);
        $linha = $sql->fetch_object();
		
		
		if ($usuario == 'dgrossi'){
			header("location: usuario_v2.0/dgrossi");
			exit;
		}
        session_start();

        $_SESSION['usuario'] = $usuario;
        $_SESSION['senha'] = $senha;
        $funcao = $linha->funcao;
			
        switch ($funcao) {
            case 'lider':
                $_SESSION['funcao'] = 'lider';
				header("location: usuario_v2.0/lider/");
                break;
            case 'Supervisor':
                $_SESSION['funcao'] = 'Supervisor';
				header("location: usuario_v2.0/supervisor");
                break;
            case 'Administrador':
                $_SESSION['funcao'] = 'Administrador';
				header("location: usuario_v2.0/admin/");
                break;
            default:
                echo "Erro! função não encontrada";
                break;
        }
       
    } else {
        echo "<script>"
        . "alert('usuário não cadastrado no sistema');"
        . "history.go(-1)"
        . "</script>";
    }
}

