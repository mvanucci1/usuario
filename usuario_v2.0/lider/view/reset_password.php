
<div class="panel panel-primary" style="width: 600px; margin-left: 150px; margin-right: auto;">
    <div class="panel-heading">
        <h3 class="panel-title">Reset de Senha</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="?url=controller/lider_controller.php" method="post">
            <fieldset>
                <input type="hidden" name="action" value="resetPassword">
                <!-- Form Name -->
                <legend>Reinicializar Senha</legend>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="txtNome">Nome</label>  
                    <div class="col-md-4">
                        <input id="txtNome" name="txtNome" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="mat">Matrícula</label>  
                    <div class="col-md-4">
                        <input id="mat" name="mat" type="text" placeholder="" class="form-control input-md" required="">

                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="user">Usuário</label>  
                    <div class="col-md-4">
                        <input id="user" name="user" type="text" placeholder="Digite seu login" class="form-control input-md" required="">

                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-4 control-label" for="user">Sistema</label>  
                    <div class="col-md-4">
                        <input id="user" name="sistema" type="text" placeholder="Ex: Tplinux SAVE, RUB, PORTAL" class="form-control input-md" required="">
                    </div>
                </div>

                <!-- Button -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="btn_reset"></label>
                    <div class="col-md-4">
                        <button type="submit" id="btn_reset" name="btn_reset" class="btn btn-warning">Reinicializar Senha</button>
                    </div>
                </div>

            </fieldset>
        </form>

    </div>
</div>