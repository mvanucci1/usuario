
<br>
<div class="col-lg-11">
    <h3>Consulta de formulários Pendentes</h3>
    <br>
    <br>
    <form action="?url=controller/sup_controller.php" method="post">
        <input type="hidden" name="action" value="cobrar">
        <table id="usr_pend" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr style="cursor: pointer;">
                    <th>#</th>
                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Setor</th>
                    <th>Função</th>
                    <th>Chamado</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="tgrid">
                <?php
                include '../include/connector.php';

                $sql = $mysqli->query("select id, nome, matricula, setor, funcao, chamado"
                        . ",status from usuario_f85 where status='Aguardando Chamado'");

                while ($row = $sql->fetch_object()):
                    ?>

                    <tr>
                           
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->nome; ?></td>
                        <td><?php echo $row->matricula; ?></td>
                        <td><?php echo $row->setor; ?></td>
                        <td><?php echo $row->funcao; ?></td>
                        <td><?php echo $row->chamado; ?></td>
                        <td><?php
                            if ($row->status == "Aguardando Chamado") {
                                echo "<span class='label label-danger'>" . $row->status . "</span>";
                            } elseif ($row->status == "Chamado Aberto") {
                                echo "<span class='label label-warning'>" . $row->status . "</span>";
                            } elseif ($row->status == "Ok - Chamado Encerrado") {
                                echo "<span class='label label-success'>" . $row->status . "</span>";
                            } elseif ($row->status == "Erro - Chamado Encerrado") {
                                echo "<span class='label label-info'>" . $row->status . "</span>";
                            }
                            ?></td>
                    </tr>

                    <?php
                endwhile;
                ?>
            </tbody>
        </table>
        <br><br>
        <input type="submit" class="btn btn-warning btn-lg" style="margin-left: 1000px;" value="Cobrar">
    </form>
</div>