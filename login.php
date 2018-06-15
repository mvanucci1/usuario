<?php

/*
*	Adicionado a interação com ajax jquery
*
*
*/

?>



<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>.: Login V-2.1 :.</title>
        <link href="lib/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="lib/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style_login.css" rel="stylesheet" type="text/css"/>
		<script src="lib/jquery-2.1.4/jquery-2.2.3.min.js" type="text/javascript"></script>
		<script src="ajax-login.js" type="text/javascript"></script>
		<script src="js/ajax.js" type="text/javascript"></script>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-6">
                    <form name="frm-login" class="form-signin mg-btm">
                        <h3 class="heading-desc">
                            Solicitação de Usuários</h3>

                        <div class="main">
                            <label>Usuário</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="usuario" class="form-control" placeholder="Login" autofocus>
                            </div>
                            <label>Senha</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input type="password" name="senha" class="form-control" placeholder="Senha">
                            </div>

                            <div class="row">

                                <div class="col-xs-6 col-md-6">
                                    <button type="submit" class="btn btn-large btn-success" name="btn-logar">Login</button>
                                </div>
                            </div>
                        </div>

                        <span class="clearfix"></span>

                        <div class="login-footer">
                            <div class="row">
                                <div class="col-xs-6 col-md-6">
                                    <div class="left-section">
                                        <a href="#suporte" data-toggle="modal">Suporte</a>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-md-6 pull-right">
								<p class="pull-right">2.1.6 </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>


        <div class="modal fade" id="suporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Enviar e-mail para o T.I</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="frmEmail">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtNome" class="form-control" id="inputNome" placeholder="Nome">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAssunto" class="col-sm-2 control-label">Assunto</label>
                                <div class="col-sm-10">
                                    <input type="text" name="txtAssunto" class="form-control" id="inputAssunto" placeholder="Assunto">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputMsg" class="col-sm-2 control-label" >Mensagem</label>
                                <div class="col-sm-10">
                                   <textarea class="form-control" name="txtMsg" id="inputMsg" rows="3" placeholder="Mesagem"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancelar</button>
                        <button type="button" id="btn-enviar" class="btn btn-primary" data-loading-text="Enviando e-mail..." class="btn btn-primary" autocomplete="off"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>  Enviar e-mail</button>
                    </div>
                </div>
            </div>
        </div>



        <script src="lib/bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>
