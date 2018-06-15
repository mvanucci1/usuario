<?php
    $dd = date("d");
    $mm = date("m");
    $aa = date("Y");
?>

<script>
    $(document).ready(function () {
        $("#cpf").mask("999.999.999-99");
        $("#rg").mask("99.999.999-9");
    });
</script>


<br>
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="well well-sm">
                <form class="form-horizontal" action="?url=controller/lider_controller.php" method="post" id="frm-solicita">
                    <input type="hidden" name="action" value="solicitar" />
                    <fieldset>
                        <legend class="text-center">Formulário de Solicitação</legend>

                        <!-- Name input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name">Nome</label>
                            <div class="col-md-9">
                                <input id="name" name="txtnome" type="text" placeholder="Nome ex: M�rcio Santos" class="form-control">
                            </div>
                        </div>

                        <!-- Email input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="mat">Matrícula</label>
                            <div class="col-md-9">
                                <input id="mat" name="matricula" type="text" placeholder="Sua Matrícula" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="cpf">C.P.F</label>
                            <div class="col-md-9">
                                <input id="cpf" name="cpf" type="text" placeholder="Seu CPF ex: 222.222.222-22" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="rg">R.G</label>
                            <div class="col-md-9">
                                <input id="rg" name="rg" type="text" placeholder="Seu RG ex: 22.222.222-2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="setor">Setor</label>
                            <div class="col-md-9">
                                <input id="setor" name="setor" type="text" placeholder="Seu setor ex: Frios" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="funcao">Função</label>
                            <div class="col-md-9">
                                <input id="setor" name="funcao" type="text" placeholder="Sua função ex: Repositor" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="usuario">Usuário</label>
                            <div class="col-md-6">
                                <select id="usuario" name="usuario" class="form-control">
                                    <option value="">-- Selecione --</option>
                                    <option value="Usu�rio-Criar">Usuário-Criar</option>
                                    <option value="Usu�rio-Bloquear">Usuário-Bloquear</option>
                                    <option value="Usu�rio-Desbloquear">Usuário-Desbloquear</option>
                                    <option value="Usu�rio-Reset-Senha">Usuário-Reset-Senha</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="data">Data</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="data" value='<? echo "$dd / $mm / $aa"; ?>' readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label" for="lider">Líder</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="lider" placeholder="Seu(a) Líder ex: 'Jos�'">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="sistema">Sistema</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="sistema" placeholder="ex: TPLinux moedeiro ou TPLinux pdv">
                            </div>
                        </div>

                        <!-- Message body -->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="motivo">Motivo</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="message" name="motivo" placeholder="" rows="2"></textarea>
                            </div>
                        </div>

                        <!-- Form actions -->
                        <div class="form-group">
                            <div class="col-md-6 text-left"><span id="msg"></span></div>
                            <div class="col-md-6 text-right">
                                <input type="submit" class="btn btn-warning" value="Enviar">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>