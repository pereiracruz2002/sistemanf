<?php include_once(dirname(__FILE__).'/../site/header.php'); ?>
<?php foreach ($solucoes as $item): ?>
<div class="col-md-<?php echo $col ?>">
    <p><a href="<?php echo site_url('contrato/ficha/'.$item->id_solucao) ?>"><?php echo $item->solucao ?></a></p>
</div>
<?php endforeach; ?>
<?php include_once(dirname(__FILE__).'/../site/footer.php'); ?>
