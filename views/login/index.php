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
				<h1><?php echo htmlspecialchars(NAME_NEGOCIO, ENT_QUOTES, 'UTF-8'); ?> <strong>Restaurante</strong></h1>
				<p class="auth-tagline">Control de ventas, caja y operación en un solo lugar. Diseñado para equipos que exigen claridad y velocidad.</p>
				<span class="auth-version">Versión 2.1</span>
			</div>
		</div>
		<div class="auth-main">
			<div class="auth-main-inner">
				<div class="auth-mode-switch">
					<a class="btn btn-outline-primary btn-lg btn-block mb-3" href="<?php echo URL; ?>multimozo">
						<i class="fas fa-tablet-alt mr-1" aria-hidden="true"></i> Acceso multi mozo
					</a>
				</div>
				<div class="auth-card">
					<div class="auth-card-body">
						<h2>Bienvenido</h2>
						<p class="auth-lead mb-0">Ingrese sus credenciales para continuar.</p>
						<form class="mt-4 pt-1" id="frm-login" role="form" method="post" autocomplete="on">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario" autocomplete="username">
								<label for="usuario">Usuario</label>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" autocomplete="current-password">
								<label for="password">Contrase&ntilde;a</label>
							</div>
							<button type="submit" class="btn auth-btn-primary">Entrar al sistema</button>
						</form>
						<p class="auth-footnote mb-0">Si olvid&oacute; su contrase&ntilde;a, contacte al administrador.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
