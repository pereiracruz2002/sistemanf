<?php include_once(dirname(__FILE__).'/header.php'); ?>
<div class="panel panel-default table-responsive">
    <div class="panel-heading">
        Adesão: <?php echo $adesao->controle ?>
    </div>
    <div class="panel-body">
        <dl class="dl-horizontal">
       <?php foreach ($this->model->fields as $key => $item): ?>
       <dt><?php echo $item['label'] ?></dt>
       <dd><?php echo $adesao->{$key} ?></dd>
       <?php endforeach; ?>
        </dl>
    </div>
</div>
<?php include_once(dirname(__FILE__).'/footer.php'); ?>
