<?php include_once(dirname(__FILE__).'/../site/header.php'); ?>

<?php if (isset($save)) echo box_success('Ficha salva com sucesso'); ?>
<?php if(validation_errors()) echo box_alert(validation_errors()); ?>

<form method="post" class="form-horizontal no-margin form-border" action="<?php echo current_url() ?>">
    <fieldset>
        <legend><?php echo $titulo?></legend>
        <?php echo $form ?>
    </fieldset>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Salvar</button>
        </div>
    </div>

</form>
<?php include_once(dirname(__FILE__).'/../site/footer.php'); ?>
