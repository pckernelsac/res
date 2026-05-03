<?php

/**
 * Variables de entorno (recomendado en EasyPanel / producción):
 * APP_URL, DB_HOST, DB_PORT, DB_NAME, DB_USER, DB_PASS
 * En el panel: App → Environment (o al vincular el servicio MySQL, usa su hostname interno).
 */

// CONFIGURAR AQUI EL NOMBRE DEL NEGOCIO
define('NAME_NEGOCIO', getenv('NAME_NEGOCIO') ?: 'BRAIN TECH');

define('MENSAJE_WHATSAPP', 'Su comprobante de pago electrónico ha sido generado correctamente, puede revisarlo en el siguiente enlace:');

//configuracion del logo print
define('L_DIMENSION', '50');
define('L_CENTER', '15');
define('L_ESPACIO', '25');
define('L_FORMATO', 'png');

//constants
define('HASH_GENERAL_KEY', getenv('HASH_GENERAL_KEY') ?: 'MixitUp200');
define('HASH_PASSWORD_KEY', getenv('HASH_PASSWORD_KEY') ?: 'catsFLYhigh2000miles');

// database
define('DB_TYPE', 'mysql');
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_PORT', getenv('DB_PORT') ?: '3306');
define('DB_NAME', getenv('DB_NAME') ?: 'restaurante');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_CHARSET', getenv('DB_CHARSET') ?: 'utf8');

// URL pública con barra final (obligatoria en producción: APP_URL=https://tudominio.com/)
$appUrl = getenv('APP_URL');
if ($appUrl !== false && $appUrl !== '') {
	$appUrl = rtrim($appUrl, '/') . '/';
} else {
	$appUrl = 'https://restaurante-app-restaurante.bx4rvs.easypanel.host/';
}
define('URL', $appUrl);
define('LIBS', 'libs/');