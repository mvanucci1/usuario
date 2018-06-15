<?php

include '../include/connector.php';
// ini_set("display_errors", 1);

if (isset($_REQUEST['action'])) {
    $action = $_REQUEST['action'];

    if ($action == 'solicitar') {
        $nome = $_REQUEST["txtnome"];
        $mat = $_REQUEST["matricula"];
        $cpf = $_REQUEST["cpf"];
        $rg = $_REQUEST["rg"];
        $setor = $_REQUEST["setor"];
        $funcao = $_REQUEST["funcao"];
        $usuario = $_REQUEST["usuario"];
        $data_frm = parse_data($_REQUEST["data_frm"], 'db');
        $lider = $_REQUEST["lider"];
        $sistema = $_REQUEST["sistema"];
        $motivo = $_REQUEST["motivo"];
	
		// echo "<script>alert('".$data_frm."');</script>";
		
        $sql = $mysqli->query("insert into usuario_f85 (nome, matricula"
                . ", cpf, rg, setor, funcao, usuario, data, lider, sistema, motivo, status)"
                . "values('$nome', '$mat', '$cpf', '$rg',"
                . "'$setor', '$funcao', '$usuario', '$data_frm', '$lider', '$sistema', '$motivo', 'Aguardando Chamado')");

        $headers = 'MIME-Version:1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";
        $headers .= 'FROM: Sistema de Usuarios <system@atacadao.com.br>' . "\r\n";
        $destino = "rafaelsorpreso@atacadao.com.br,cpdpiracicaba@atacadao.com.br"; 
        $remetente = "Sistema de Usuarios";
        $assunto = "NOVO USUARIO - Criar Nova conta de usuario. ";
        $msg = "<p class='lead'>Favor abrir chamado para o usu&aacute;ro abaixo:</p>";
        $msg .= "<p><strong>Nome:</strong>" . $nome . ",<br><strong>Matr&iacute;cula:</strong>" . $mat . ",<br><strong>Setor</strong> " . $setor . ",<br> <strong>Fun&ccedil;&atilde;o: </strong>" . $funcao;
        $msg .= ", <br><strong>Sistema: </strong>". $sistema. ", <br> <strong>RG:</strong> {$rg}, <br><strong>CPF:</strong> {$cpf}, <br><strong>Usu&aacute;ro:</strong> {$usuario}, <br> <strong>Lider:</strong> {$lider}, <br> <strong>Motivo: </strong>{$motivo}</p>";
		
		$msg .= "<br><br>";
        $msg .= "<p class='lead'>Atenciosamente, Inform&aacute;tica Piracicaba.</p>";

        if ($sql) {
            mail($destino, "$assunto", $msg, $headers);
            echo "<br><br>";
            echo '<div class="alert alert-success col-md-6" role="alert"><strong>Formulário enviado com sucesso!</strong>'
            . '<br>'
            . 'Um e-mail foi enviado para o Supervisor Administrativo.</div>';
            echo '<meta http-equiv="Refresh" content="3;?url=view/ficha.php"';
        } else {
            echo "<br><br>";
            echo '<div class="alert alert-danger col-md-6" role="alert"><strong>Erro !</strong>'
            . '<br>'
            . 'Não foi possível enviar o formulário. Entre em contato com o administrador do sistema para maiores informções.</div>';
            echo '<meta http-equiv="Refresh" content="3;?url=view/ficha.php"';
        }
    }

    if ($action == 'cobrar') {

        $sql = $mysqli->query("select nome, matricula, setor, funcao, sistema, status from usuario_f85 where status='Aguardando Chamado'");

        $html = '<table border="1">'
                . '<tr>'
                . '<th>Nome</th>'
                . '<th>Matr&iacute;cula</th>'
                . '<th>Setor</th>'
                . '<th>Fun&ccedil;&atilde;o</th>'
				. '<th>Sistema</th>'
                . '<th>Status</th>';
        while ($row = $sql->fetch_object()):


            $html .= '</tr>'
                    . '<tr>'
                    . '<td>' . $row->nome . '</td>'
                    . '<td>' . $row->matricula . '</td>'
                    . '<td>' . $row->setor . '</td>'
                    . '<td>' . $row->funcao . '</td>'
					. '<td>' . $row->sistema . '</td>'
                    . '<td>' . $row->status . '</td>'
                    . '</tr>';
        endwhile;

        $html .= '</table>';

        $headers = 'MIME-Version:1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";
        $headers .= 'FROM: Sistema de Usuarios <system@atacadao.com.br>' . "\r\n";
        $destino = "rafaelsorpreso@atacadao.com.br,cpdpiracicaba@atacadao.com.br";
        $remetente = "Sistema de Usuarios";
        $assunto = "Usuarios pendentes de abertura de chamados";
        $msg = "<p class='lead'>Favor abrir chamado para os usu&aacute;ros abaixo:</p><br><br>" . $html;
        $msg .= "<br><br>";
        $msg .= "<p class='lead'>Atenciosamente, Inform&aacute;tica Piracicaba.</p>";

        if (empty($action)) {
            echo 'Ocorreu um erro';
            throw new Exception("Erro");
        }

        try {
            mail($destino, "$assunto", $msg, $headers);
            echo "<br><br>";
            echo '<div class="alert alert-success col-md-6" role="alert"><strong>Cobrança enviada com sucesso!</strong>'
            . '<br>'
            . 'Um e-mail de cobrança foi enviado para o Supervisor Administrativo.</div>';
            echo '<meta http-equiv="Refresh" content="3;?url=view/user_pend.php"';
        } catch (Exception $ex) {
            echo "Ocorreu um erro ao enviar o e-mail";
        }
    }

    if ($action == "resetPassword") {
        $nome = $_REQUEST["txtNome"];
        $mat = $_REQUEST["mat"];
        $user = $_REQUEST["user"];
        $sistema = $_REQUEST["sistema"];

        $sql = "insert into usuario_pass_reset_f85 set nome='{$nome}', mat='{$mat}', login='{$user}', sistema='{$sistema}'";
        $exec = $mysqli->query($sql);

        $headers = 'MIME-Version:1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";
        $headers .= 'FROM: Sistema de Usuarios <system@atacadao.com.br>' . "\r\n";
        $destino = "rafaelsorpreso@atacadao.com.br,cpdpiracicaba@atacadao.com.br,dianagrossi@atacadao.com.br";
        $remetente = "Sistema de Usuarios";
        $assunto = "Usuario Resetar Senha";
        $msg = "Favor abrir o chamado para resetar a senha do seguinte colaborador:" . "<br><br>";
        $msg .= "<strong>Nome: </strong>{$nome}" . "<br>";
        $msg .= "<strong>Matricula: </strong>{$mat}" . "<br>";
        $msg .= "<strong>Login: </strong>{$user}" . "<br>";
        $msg .= "<strong>Sistema: </strong>{$sistema}" . "<br><br>";
        
        $msg .= "Atenciosamente, Inform&aacute;tica Piracicaba.";

        mail($destino, "$assunto", $msg, $headers);

        echo "<script>alert('Um e-mail foi enviado para o supervisor administrativo solicitando o reset de senha');"
        . "location.href = 'http://piracicaba.atacadao.com.br/portalv2/usuario/usuario_v2.0/lider/?url=view/reset_password.php';"
        . "</script>";
    }
}
/*rafaelsorpreso@atacadao.com.br*/