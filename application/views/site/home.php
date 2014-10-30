<?php include_once(dirname(__FILE__).'/header_home.php'); ?>
<div class="col-md-12">
	<div class="row">
			<div class="col-md-9 banner-home">
				<img class="marginLeft30" src="<?php echo base_url() ?>assets/img/hotsite_pin.png" alt="hotsite" />
			</div>
			<div id="home_lateral" class="col-md-3 well">
				<img src="<?php echo base_url() ?>assets/img/logo.png" alt="pin" />
				<h3 class="padTop30 padBottom30">Conheça o PIN Produtividade Integrada</h3>
				<a class="btVerde btn btn-success" href="<?php echo site_url('site/pin')?>">Clique aqui</a>
			</div>
	</div>
</div>
<div class="clearfix"></div>
	<div class="well text-right">
	  <?php if ($this->session->userdata('usuario')): ?>
	    Bem vindo <strong class="nome"><?php echo $this->session->userdata('usuario')->nome ?></strong> <a href="<?php echo site_url('site/sair') ?>">Sair</a>

	  <?php else: ?>
	      <form class="form-inline" role="form" method="post" id="login" action="<?php echo site_url('site/login') ?>">
	    <strong>Acesse o sistema</strong>
	          <div class="form-group">
	              <input type="text" class="form-control" placeholder="CPF" name="cpf" />
	          </div>
	          <div class="form-group">
	              <input type="password" class="form-control" placeholder="Senha" name="senha" />
	          </div>
	          <button type="submit" class="btn btn-inverse" id="login">Entrar</button>
	      </form>
	      <a href="<?php echo site_url('usuario/lembrete') ?>">Esqueci minha senha</a>
	  <?php endif; ?>
	</div>
	<div class="row">
		<div class="col-md-2"><img src="<?php echo base_url() ?>assets/img/ibp.jpg" width="94px" height="38px" /></div>
		<div class="col-md-2 paddingRight170"><img src="<?php echo base_url() ?>assets/img/integrare.jpg"  width="138px" height="38px" /></div>
		<div class="col-md-2 paddingRight170"><img src="<?php echo base_url() ?>assets/img/trigold.jpg"  width="138px" height="38px" /></div>
		<div class="col-md-2 paddingRight170"><img src="<?php echo base_url() ?>assets/img/granotop.jpg"  width="149px" height="38px" /></div>
		<div class="col-md-2"><img src="<?php echo base_url() ?>assets/img/maismaiz.jpg"  width="94px" height="38px" /></div>
	</div>
	
	<div class="clearfix"></div>
    <div class="text-center"><img src="<?php echo base_url() ?>assets/img/solucoes.jpg" class="img-responsive center-block" /></div>

<?php include_once(dirname(__FILE__).'/footer.php'); ?>
