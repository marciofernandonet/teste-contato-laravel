<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
	<title>Contato</title>
	<!-- Bootstrap -->
	<link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>

	<!-- HTML5 shim e Respond.js para suporte no IE8 de elementos HTML5 e media queries -->
	<!-- ALERTA: Respond.js não funciona se você visualizar uma página file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="container py-3">
		<div class="row">
			<div class="mx-auto col-sm-6">
				<div class="card">
					<div class="card-header">
						<h4 class="mb-0">Contato</h4>
					</div>
					<div class="card-body">
						<?php echo $this->session->flashdata('alert'); ?>
						<form action="<?php echo base_url()."contato"; ?>" method="post" class="form" autocomplete="off" enctype="multipart/form-data" accept-charset="utf-8">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Nome</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="nome" maxlength="80" value="<?php echo set_value('nome'); ?>" >
									<strong class="text-danger"><?php echo form_error("nome"); ?></strong>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Email</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="email" maxlength="60" value="<?php echo set_value('email'); ?>">
									<strong class="text-danger"><?php echo form_error("email"); ?></strong>
								</div>
							</div>						
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Telefone</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" data-mask="(00) 0000-0000" name="telefone" placeholder="(99) 9999-9999" value="<?php echo set_value('telefone'); ?>">
									<strong class="text-danger"><?php echo form_error("telefone"); ?></strong>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Mensagem</label>
								<div class="col-lg-9">
									<textarea class="form-control" name="mensagem" maxlength="200" rows="3"><?php echo set_value('mensagem'); ?></textarea>
									<strong class="text-danger"><?php echo form_error("mensagem"); ?></strong>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Arquivo</label>
								<div class="col-lg-9">
									<input type="file" class="form-control-file" name="arquivo" >
									<strong class="text-danger"><?php echo $error; ?></strong>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label"></label>
								<div class="col-lg-9">
									<input type="submit" class="btn btn-primary" value="Adicionar">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../vendor/components/jquery/jquery.min.js"></script>
	<script src="../vendor/igorescobar/jquery-mask-plugin/dist/jquery.mask.js"></script>
	<script src="../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>