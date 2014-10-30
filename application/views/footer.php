    </div><!-- /.container -->

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.ui.datepicker-pt-BR.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/admin.js"></script>
    <?php if (file_exists(FCPATH.'assets/js/'.$this->uri->segment(1).'.js')): ?>
    <script src="<?php echo base_url() ?>assets/js/<?php echo $this->uri->segment(1) ?>.js"></script>
    <?php endif; ?>

    <?php if (isset($jsFiles) ): foreach($jsFiles as $js): ?>
    <script src="<?php echo base_url() ?>assets/js/<?php echo $js ?>.js"></script>
    <?php endforeach; endif; ?>
</body>
</html>
