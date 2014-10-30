<?php include_once(dirname(__FILE__).'/header.php'); ?>
    <div class="panel panel-default table-responsive">
        <div class="panel-heading">
            <?= ucfirst($titulo) ?>
        </div>
        <div class="panel-body">
<table class="table table-striped">
    <thead>
        <tr>
            <th>Controle</th>
            <th>Cultura</th>
            <th>Solução</th>
            <th>Consultor</th>
            <th>RTV</th>
            <th>Data do Plantio</th>
            <th>Data da Colheita</th>
            <th>Produtividade Padrão</th>
            <th>Produtividade PIN</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($itens as $item): ?>
        <tr>
            <td><a href="<?php echo site_url('agricultores/adesao/'.$item->id_adesao) ?>"><?php echo $item->controle ?></a></td>
            <td><?php echo $item->cultura ?></td>
            <td><?php echo $item->solucao ?></td>
            <td><?php echo $item->consultor ?></td>
            <td><?php echo $item->rtv ?></td>
            <td><?php echo $item->data_plantio ?></td>
            <td><?php echo $item->data_colheita ?></td>
            <td><?php echo $item->produtividade_padrao ?></td>
            <td><?php echo $item->produtividade_pin ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    </div>
</div>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
