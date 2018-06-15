<?php
$mysqli = new mysqli('localhost', 'filial85', 'senhafilial', 'atacadao');
$mysqli->query("SET CHARACTER SET UTF8");

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
        $data_frm = $_REQUEST["data"];
        $lider = $_REQUEST["lider"];
        $sistema = $_REQUEST["sistema"];
        $motivo = $_REQUEST["motivo"];

        $sql = $mysqli->query("insert into usuario_f85 (nome, matricula"
                . ", cpf, rg, setor, funcao, usuario, data, lider, sistema, motivo, status)"
                . "values('$nome', '$mat', '$cpf', '$rg',"
                . "'$setor', '$funcao', '$usuario', '$data_frm', '$lider', '$sistema', '$motivo', 'Aguardando Chamado')");

        $headers = 'MIME-Version:1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";
        $headers .= 'FROM: Sistema de Usuarios <system@atacadao.com.br>' . "\r\n";
        $destino = "rafaelsorpreso@atacadao.com.br,dianagrossi@atacadao.com.br";
        $remetente = "Sistema de Usuarios";
        $assunto = "NOVO USUARIO ";
        $msg = "<p class='lead'>Favor abrir chamado para o usu&aacute;ro abaixo:</p>";
        $msg.= "<p><strong>Nome:</strong>" . $nome . ",<br><strong>Matr&iacute;cula:</strong>" . $mat . ",<br><strong>Setor</strong> " . $setor . ",<br> <strong>Fun&ccedil;&atilde;o: </strong>" . $funcao . "</p>";
        $msg.= "<br><br>";
        $msg.= "<p class='lead'>Atenciosamente, Inform&aacute;tica Piracicaba.</p>";

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

        $sql = $mysqli->query("select nome, matricula, setor, funcao, status from usuario_f85 where status='Aguardando Chamado'");

        $html = '<table border="1">'
                . '<tr>'
                . '<th>Nome</th>'
                . '<th>Matr&iacute;cula</th>'
                . '<th>Setor</th>'
                . '<th>Fun&ccedil;&atilde;o</th>'
                . '<th>Status</th>'
                . '</tr>';

        while ($row = $sql->fetch_object()):

            $html.= '<tr>'
                    . '<td>' . $row->nome . '</td>'
                    . '<td>' . $row->matricula . '</td>'
                    . '<td>' . $row->setor . '</td>'
                    . '<td>' . $row->funcao . '</td>'
                    . '<td>' . $row->status . '</td>'
                    . '</tr>';
        endwhile;

        $html.= '</table>';

        $headers = 'MIME-Version:1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset="UTF-8"' . "\r\n";
        $headers .= 'FROM: Sistema de Usuarios <system@atacadao.com.br>' . "\r\n";
        $destino = "cpdpiracicaba@atacadao.com.br,rafaelsorpreso@atacadao.com.br,dianagrossi@atacadao.com.br";
        $remetente = "Sistema de Usuarios";
        $assunto = "Usuarios pendentes de abertura de chamados";
        $msg = "<p class='lead'>Favor abrir chamado para os usu&aacute;ros abaixo:</p><br><br>" . $html;
        $msg.= "<br><br>";
        $msg.= "<p class='lead'>Atenciosamente, Inform&aacute;tica Piracicaba.</p>";
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

    if ($action == "atribuir") {

        $p1 = $_REQUEST["chamado"];
        $p2 = "Chamado Aberto";
        $p3 = $_REQUEST["id"];

        if (!empty($p1) or $p1 != 0) {

            $sql = $mysqli->prepare("Update usuario_f85 set chamado = ?,"
                    . "status = ? where id= ?");

            $sql->bind_param('ssi', $p1, $p2, $p3);


            $sql->execute();

            if ($sql->affected_rows > 0) {
                echo 'Chamado atribuido com sucesso';
            } else {
                echo 'Erro ao atribuir o chamado';
            }
        } else {
            echo "Erro! Preencha o campo chamado corretamente.";
        }
    }

    if ($action == "update") {

        $id = $_REQUEST["id"];
        $nome = $_REQUEST["txtnome"];
        $mat = $_REQUEST["matricula"];
        $cpf = $_REQUEST["cpf"];
        $rg = $_REQUEST["rg"];
        $setor = $_REQUEST["setor"];
        $funcao = $_REQUEST["funcao"];
        $usuario = $_REQUEST["usr"];
        $data = $_REQUEST["data"];
        $lider = $_REQUEST["lider"];
        $chamado = $_REQUEST["chamado"];
        $sistema = $_REQUEST["sistema"];
        $motivo = $_REQUEST["motivo"];
        $status = $_REQUEST["status"];

        $sql = $mysqli->query("Update usuario_f85 set nome='$nome', matricula='$mat', "
                . "cpf='$cpf', rg='$rg', setor='$setor', funcao='$funcao', usuario='$usuario', "
                . "data='$data', lider='$lider', chamado='$chamado', sistema='$sistema', motivo='$motivo',"
                . " status='$status' where id='$id'");



        if ($sql) {
            echo "<br><br>";
            echo '<div class="alert alert-success col-md-6" role="alert"><strong>Ficha atualizada com sucesso!</strong>'
            . '<br>'
            . 'As informações da ficha de solicitação foram atualizadas.</div>';
            echo '<meta http-equiv="Refresh" content="3;?url=view/editar.php"';
        } else {
            echo "<br><br>";
            echo '<div class="alert alert-danger col-md-6" role="alert"><strong>Erro !</strong>'
            . '<br>'
            . 'As informações da ficha de solicitação não foram atualizadas.<br>'
            . 'Ficha não cadastrada.</div>';
            echo '<meta http-equiv="Refresh" content="3;?url=view/editar.php"';
        }
    }

    if ($action == 'delete') {

        $p_id = $_REQUEST['id'];

        $sql = $mysqli->prepare("delete from usuario_f85 where id = ?");

        $sql->bind_param('i', $p_id);

        $sql->execute();

        if ($sql->affected_rows > 0) {
            echo "<br><br>";
            echo '<div class="alert alert-success col-md-6" role="alert"><strong>Ficha excluida com sucesso!</strong>'
            . '<br>'
            . 'As informações da ficha de solicitação foi excluida.</div>';
            echo '<meta http-equiv="Refresh" content="3;?url=view/editar.php"';
        } else {
            echo "<br><br>";
            echo '<div class="alert alert-danger col-md-6" role="alert"><strong>Erro !</strong>'
            . '<br>'
            . 'As informações da ficha de solicitação não foram excluidas.<br>'
            . 'Ficha não cadastrada.</div>';
            echo '<meta http-equiv="Refresh" content="3;?url=view/editar.php"';
        }
    }
}


