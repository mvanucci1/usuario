
    <div class="col-lg-12">
        <table id="myGrid" class="display nowrap" cellspacing="0" width="100%">
            <thead>
                <tr style="cursor: pointer;">

                    <th>Nome</th>
                    <th>Matrícula</th>
                    <th>Setor</th>
                    <th>Função</th>
                    <th>Data de Abertura</th>
                    <th>Chamado</th>
                    <th>Status</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>

                </tr>
            </thead>
            <tbody id="tgrid">
                <?php
                include '../include/connector.php';

                $sql = $mysqli->query("select * from usuario_f85");

                while ($row = $sql->fetch_object()):
                    ?>

                    <tr>

                        <td><?php echo $row->nome; ?></td>
                        <td><?php echo $row->matricula; ?></td>
                        <td><?php echo $row->setor; ?></td>
                        <td><?php echo $row->funcao; ?></td>
                        <td><?php echo parse_data($row->data, 'usr'); ?></td>
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
                        <td><a href="?url=view/solicitacao.php&id=<?php echo $row->id; ?>">Detalhes</a></td>
                        <td><a href="?url=view/user_editar.php&id=<?php echo $row->id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td><a href="?url=controller/adm_controller.php&action=delete&id=<?php echo $row->id; ?>" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></a></td>
                    </tr>

                    <?php
                endwhile;
                ?>
            </tbody>
        </table> 
    </div>
