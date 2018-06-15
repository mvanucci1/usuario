


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>.: Home - Page :.</title>
        <link href="../lib/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="css/style_lider.css" rel="stylesheet" type="text/css"/>
        <link href="css/style_solicitar.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/datatables-1.10.10/css/datatables.jqueryui.min.css" rel="stylesheet" type="text/css"/>


        <link href="../lib/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-1.11.4.custom/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>

        <script src="../lib/jquery-2.1.4/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="../lib/bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
		
        <script src="../lib/datatables-1.10.10/js/jquery.datatables.min.js" type="text/javascript"></script>
        <script src="../lib/datatables-1.10.10/js/datatables.jqueryui.min.js" type="text/javascript"></script>

		<script src="../js/moment.min.js" type="text/javascript"></script>
		<script src="../js/datetime-moment.js" type="text/javascript"></script>
		
        <script src="../js/jquery-masked-input-1.4.1.js" type="text/javascript"></script>
        <script src="../js/ajax.js" type="text/javascript"></script>
        <script src="../js/ajax_user_pend.js" type="text/javascript"></script>
        <script src="../js/ajax_chamado.js" type="text/javascript"></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script>
        <script src="../js/validate.js" type="text/javascript"></script>

    </head>
    <body style="padding-top:70px;">

        <?php include 'view/menu.php'; ?>



        <div class="col-md-offset-2" id='conteudo'>

            <?php
              if (!empty($_REQUEST['url'])) {
                  $url = $_REQUEST['url'];
                  include ($url);
              } else {
                  echo "<br>"
                  . "<br>"
                  . "<h1><span class='label label-warning'>Novo</span></h1>"
                  . "<br>"
                  . "<h4>Olá seja bem vindo a nova interface do sistema de solicitação de usuários</h4>"
                  . "<p>Nessa nova versão foi adicinado uma nova ferramenta.</p>";
              }
            ?>

        </div>






    </body>
</html>
