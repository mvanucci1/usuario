<?php
include '../include/connector.php';

ini_set('display_errors', 1);

if (isset($_REQUEST['id'])) {


    $cod = $_REQUEST['id'];
	

    $qr = $mysqli->query("select * from usuario_f85 where id='$cod'");

    $row = $qr->fetch_object();
	
    $id = $row->id;
    $nome = $row->nome;
    $mat = $row->matricula;
    $cpf = $row->cpf;
    $rg = $row->rg;
    $setor = $row->setor;
    $funcao = $row->funcao;
    $usuario = $row->usuario;
    $data = $row->data;
    $lider = $row->lider;
    $chamado = $row->chamado;
    $sistema = $row->sistema;
    $motivo = $row->motivo;
	$status = $row->status;
}
?>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="well well-sm">
                <form class="form-horizontal" action="?url=controller/adm_controller.php" method="post">
                    <input type="hidden" name="action" value="update" />
                    <fieldset>
                        <legend class="text-center">Solicitação <span style="color: red;"><?php echo $id; ?></span></legend>
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Nome</label>
                            <div class="col-md-9">
                                <input id="name" name="txtnome" type="text" class="form-control" value="<?php echo $nome; ?>" >
                            </div>
                        </div>

                        <!-- Email input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="mat">Matrícula</label>
                            <div class="col-md-9">
                                <input id="mat" name="matricula" type="text" class="form-control" value="<?php echo $mat; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="cpf">C.P.F</label>
                            <div class="col-md-9">
                                <input id="cpf" name="cpf" type="text" class="form-control" value="<?php echo $cpf; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="rg">R.G</label>
                            <div class="col-md-9">
                                <input id="rg" name="rg" type="text" class="form-control" value="<?php echo $rg; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="setor">Setor</label>
                            <div class="col-md-9">
                                <input id="setor" name="setor" type="text" class="form-control" value="<?php echo $setor; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="funcao">Função</label>
                            <div class="col-md-9">
                                <input id="setor" name="funcao" type="text" class="form-control" value="<?php echo $funcao; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="usuario">Usuário</label>
                            <div class="col-md-6">
                                <input id="setor" name="usr" type="text" class="form-control" value="<?php echo $usuario; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="data">Data</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="data" value='<?php echo $data; ?>' >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="lider">Líder</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lider" value="<?php echo $lider; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="chamado">Chamado</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="chamado" value="<?php echo $chamado; ?>" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sistema">Sistema</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="sistema" value="<?php echo $sistema; ?>" >
                            </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="motivo">Motivo</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="message" name="motivo" rows="2" ><?php echo $motivo; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="usuario">Status</label>
                            <div class="col-md-4">
                                <select id="status" name="status" class="form-control">
									<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                                    <option value=" ">- Selecione -</option>
                                    <option value="Ok - Chamado Encerrado">Ok - Chamado Encerrado</option>
                                    <option value="Erro - Chamado Encerrado">Erro - Chamado Encerrado</option>
                                    <option value="Chamado Aberto">Chamado Aberto</option>
                                    <option value="Aguardando Chamado">Aguardando Chamado</option>
                                </select>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span>  Atualizar</button>
                                <a href="?url=view/editar.php" class="btn btn-warning">Voltar</a>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>


