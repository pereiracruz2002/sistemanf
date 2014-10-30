<!DOCTYPE html>
<html lang="pt_br">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/ico/favicon.ico">

    <title>Syngenta</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/site.css" rel="stylesheet">
    <script>
      var base_url = '<?php echo base_url() ?>';
    </script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <body id="<?php echo $this->uri->segment(1) ?>" class="<?php echo str_replace('/','-', $this->uri->uri_string()) ?>">
      <div class="container">
          <h3 class="text-muted pull-right"><img src="<?php echo base_url() ?>assets/img/syngenta.jpg" alt="Syngenta" /></h3>
          <h3 class="text-muted"><img src="<?php echo base_url() ?>assets/img/pin.jpg" alt="PIN" /></h3>
          <?php if ($this->session->flashdata('message_name')): ?>
            <div class="alert alert-success">
              <?php echo $this->session->flashdata('message_name'); ?>
            </div>
          <?php endif ?>
          <div class="container-fluid">
            <div class="container-nav">
              <div class="col-md-3 sidebar">
                <?php include_once(dirname(__FILE__).'/sidebar.php'); ?>
              </div>
              
            </div>
            <div class="col-md-9">
      
