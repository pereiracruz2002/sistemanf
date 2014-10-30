<?php include_once(dirname(__FILE__).'/../site/header.php'); ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">Listagem dos Contratos</h2>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Solução</th>
                    <th>Consultor</th>
                    <th>Contrato</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($agricultores as $item): ?>
                <tr>
                    <td><?php echo $item->solucao ?></td>
                    <td><?php echo $item->nome ?></td>
                    <td><?php echo $item->contrato ?></td>
                    <td><?php echo $item->agricultor ?></td>
                    <td><?php echo $item->cpf ?></td>
                    <td><a href="<?php echo site_url('contrato/detalhes/'.$item->id_agricultor) ?>" class="btn btn-xs btn-info">Detalhes</a></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include_once(dirname(__FILE__).'/../site/footer.php'); ?>
