<?php if (isset($_GET['pc'])) {
	Session::set('host_pc', 'PC0' . preg_replace('/\D/', '', (string) $_GET['pc']));
} ?>
<link rel="stylesheet" href="<?php echo URL; ?>public/css/auth-portal.css">
<div class="auth-page-root">
	<div class="auth-shell">
		<div class="auth-hero" style="background-image:url(<?php echo URL; ?>public/images/background/bg.jpg);">
			<div class="auth-hero-inner">
				<a href="javascript:void(0)" class="auth-logo" aria-hidden="true">
					<img src="<?php echo URL; ?>public/images/logo-white.png" alt="<?php echo htmlspecialchars(NAME_NEGOCIO, ENT_QUOTES, 'UTF-8'); ?>">
				</a>
				<h1>Acceso <strong>Multi mozo</strong></h1>
				<p class="auth-tagline">Ingrese su c&oacute;digo num&eacute;rico en el teclado. Ideal para tablets en sal&oacute;n o barra.</p>
				<span class="auth-version"><?php echo htmlspecialchars(NAME_NEGOCIO, ENT_QUOTES, 'UTF-8'); ?></span>
			</div>
		</div>
		<div class="auth-main">
			<div class="auth-main-inner">
				<div class="auth-mode-switch">
					<a class="btn btn-outline-primary btn-lg btn-block mb-3" href="<?php echo URL; ?>">
						<i class="fas fa-user-shield mr-1" aria-hidden="true"></i> Administrador
					</a>
				</div>
				<div class="auth-card">
					<div class="auth-card-body">
						<h2 class="auth-section-title">C&oacute;digo de acceso</h2>
						<p class="auth-lead">Toque los n&uacute;meros y confirme con continuar.</p>
						<form id="frm-login" role="form" method="post" autocomplete="off">
							<input type="hidden" name="password" id="f-pass" value="">
							<input type="password" name="usuario" id="f-user" class="auth-pin-display" value="" autocomplete="off" required aria-label="C&oacute;digo ingresado">
							<div class="auth-keypad virtual-keyboard">
								<button type="button" class="btn btn-auth-key" data="1" aria-label="1">1</button>
								<button type="button" class="btn btn-auth-key" data="2" aria-label="2">2</button>
								<button type="button" class="btn btn-auth-key" data="3" aria-label="3">3</button>
								<button type="button" class="btn btn-auth-key" data="4" aria-label="4">4</button>
								<button type="button" class="btn btn-auth-key" data="5" aria-label="5">5</button>
								<button type="button" class="btn btn-auth-key" data="6" aria-label="6">6</button>
								<button type="button" class="btn btn-auth-key" data="7" aria-label="7">7</button>
								<button type="button" class="btn btn-auth-key" data="8" aria-label="8">8</button>
								<button type="button" class="btn btn-auth-key" data="9" aria-label="9">9</button>
								<button type="button" class="btn btn-auth-key" data="0" aria-label="0">0</button>
								<button type="button" class="btn btn-auth-key auth-key-wide" data="DEL" aria-label="Borrar">
									<i class="fas fa-backspace" aria-hidden="true"></i> Borrar
								</button>
							</div>
							<button class="btn auth-btn-primary text-uppercase" type="submit">Continuar</button>
						</form>
						<p class="auth-footnote mb-0">El c&oacute;digo es el mismo que usa su mozo en el sistema.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
