<!DOCTYPE html>

<html>
    <head>

        <meta charset="UTF-8">
        <link href="../lib/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/bootstrap-3.3.6-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/style_lider.css" rel="stylesheet" type="text/css"/>
        <link href="css/style_index.css" rel="stylesheet" type="text/css"/>

        <link href="css/style_solicitar.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/datatables-1.10.10/css/datatables.jqueryui.min.css" rel="stylesheet" type="text/css"/>


        <link href="../lib/jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-1.11.4.custom/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
        <link href="../lib/jquery-ui-1.11.4.custom/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>


        <script src="../lib/jquery-2.1.4/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="../lib/bootstrap-3.3.6-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../lib/datatables-1.10.10/js/datatables.jqueryui.min.js" type="text/javascript"></script>
        <script src="../lib/datatables-1.10.10/js/jquery.datatables.min.js" type="text/javascript"></script>

        <script src="../js/jquery-masked-input-1.4.1.js" type="text/javascript"></script>
        <script src="../js/ajax.js" type="text/javascript"></script>
        <script src="../js/ajax_user_pend.js" type="text/javascript"></script>  
        <script src="../js/ajax_chamado.js" type="text/javascript"></script>




        <title>.: Home - Page :.</title>
    </head>
    <body>

        <div id="interface">

            <div id="menu_teste">

                <?php include './view/menu.php'; ?>

                <!--            <ul  class="menu_lateral">
                                <li><a href="#">teste</a></li>
                                <li><a href="#">teste</a></li>
                                <li><a href="#">teste</a></li>
                            </ul>-->

            </div>

            <div class="conteudo">
                <?php
                if (!empty($_REQUEST['url'])) {
                    $url = $_REQUEST['url'];
                    include ($url);
                } else {
                    echo "<br>"
                    . "<br>"
                    . "<h1>Novo</h1>"
                    . "<br>"
                    . "<h4>Olá seja bem vindo a nova interface do sistema de solicitação de usuários</h4>"
                    . "<p>Nessa nova versão, foi adicinado uma nova ferramenta.</p>";
                }
                ?>
            </div>

        </div>
    </body>
</html>
