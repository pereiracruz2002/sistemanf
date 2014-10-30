        
            </div><!-- /.row-->
        </div><!-- /.row-->
    </div><!-- /.container -->

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.ui.datepicker-pt-BR.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <!--<script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>-->
    <script src="<?php echo base_url() ?>assets/js/jquery.mask.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/utility.js"></script>
    <script src="<?php echo base_url() ?>assets/js/site.js"></script>
    <script src="<?php echo base_url() ?>assets/js/grid_relatorios.js"></script>
    <script src="<?php echo base_url() ?>assets/js/source/jquery.fancybox.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/js/source/jquery.fancybox.css" media="screen" />
    <?php if (file_exists(FCPATH.'assets/js/'.$this->uri->segment(1).'.js')): ?>
    <script src="<?php echo base_url() ?>assets/js/<?php echo $this->uri->segment(1) ?>.js"></script>
    <?php endif; ?>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox();
        });
        $('select[name=id_regional] option').each(function(){
        var elm = $(this)
        elm.text(elm.text().replace(/\/  /gi, ''))
        elm.text(elm.text().replace(/\/ $/g, ''))
        elm.text(elm.text().replace(/^ \//g, ''))

        })
    </script>
</body>
</html>
