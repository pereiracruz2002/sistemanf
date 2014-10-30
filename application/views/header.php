<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/ico/favicon.ico">

    <title>Syngenta</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/admin.css" rel="stylesheet">
    <script>
      var base_url = '<?php echo base_url() ?>';
    </script>


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

  <body id="<?php echo $this->uri->segment(1) ?>" class="<?php echo str_replace('/','-', $this->uri->uri_string()) ?>">

    <?php if ($this->session->userdata('admin')): ?>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url() ?>">Syngenta</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if ($this->session->userdata('admin')->nivel == 99): ?>

            <li class="<?php echo (in_array($this->uri->segment(1), array('categorias', 'ciclos', 'perfis', 'solucoes', 'tamanhos')) ? 'active' : '') ?> dropdown"><a href="<?php echo site_url() ?>" data-toggle="dropdown" class="dropdown-toggle">Configurações <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('categorias') ?>">Categorias</a></li>
                    <li><a href="<?php echo site_url('ciclos') ?>">Ciclos</a></li>
                    <li><a href="<?php echo site_url('perfil') ?>">Perfis</a></li>
                    <li><a href="<?php echo site_url('distribuidor') ?>">Distribuidores</a></li>
                    <li><a href="<?php echo site_url('solucoes') ?>">Soluções</a></li>
                    <li><a href="<?php echo site_url('tamanhos') ?>">Tamanhos</a></li>
                    <li><a href="<?php echo site_url('grupo_cultivares') ?>">Grupo Cultivares</a></li>
                    <li><a href="<?php echo site_url('regional') ?>">Regional</a></li>
                    <li><a href="<?php echo site_url('unidade') ?>">Unidade</a></li>
                    <li><a href="<?php echo site_url('cultura') ?>">Cultura</a></li>
                    <li><a href="<?php echo site_url('assuntos') ?>">Emails de Contato</a></li>
                </ul>
            </li>
            <li class="<?php echo ($this->uri->segment(1) == 'usuarios' ? 'active' : '') ?>"><a href="<?php echo site_url('usuarios') ?>">Usuários</a></li>
            <?php endif; ?>
            <li class="<?php echo ($this->uri->segment(1) == 'agricultores' ? 'active' : '') ?>"><a href="<?php echo site_url('agricultores') ?>">Produtores</a></li>
            <li class="<?php echo ($this->uri->segment(1) == 'adesoes' ? 'active' : '') ?>"><a href="<?php echo site_url('adesoes') ?>">Adesões</a></li>
            <li><a href="<?php echo base_url(); ?>auth/sair">Sair</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <?php endif; ?>

    <div class="container">


