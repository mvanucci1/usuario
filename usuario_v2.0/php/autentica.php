<?php

include '../include/connector.php';

$login = $_REQUEST["usuario"];
$senha = $_REQUEST["senha"];


if (empty($login) || empty($senha)) {
    echo 'Usuário ou senha inválido';
}
else {
    $sql = $mysqli->query("select login, senha from tb_usuario_f85 where login='$login' and senha='$senha'");
    if ($sql->num_rows > 0){
       echo 'validade';
    }
    else {
        echo 'Usuário não cadastrado';
    }
}