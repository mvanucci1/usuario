


<div class="col-lg-11">
    <h3>Consulta de formulários</h3>

    <table id="myGrid" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr style="cursor: pointer;">
                
                <th>Nome</th>
                <th>Matrícula</th>
                <th>Setor</th>
                <th>Função</th>
                <th>Chamado</th>
                <th>Status</th>
                <th>&nbsp;</th>
               
            </tr>
        </thead>
        <tbody id="tgrid">
            <?php
            include '../include/connector.php';

            $sql = $mysqli->query("select * from usuario_f85 where status='Aguardando Chamado' order by nome");

            while ($row = $sql->fetch_object()):
                ?>

                <tr>
                    
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
                    <td><a href="?url=view/solicitacao_chamado.php&id=<?php echo $row->id; ?>">Atribuir chamado</a></td>
                </tr>

                <?php
            endwhile;
            ?>
        </tbody>
    </table> 
</div>

