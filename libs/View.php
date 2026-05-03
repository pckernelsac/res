<?php

/**
 * Vista: datos pasados desde controladores (propiedades explícitas, PHP 8.2+).
 */
class View
{
	/** @var list<string>|null */
	public ?array $js = null;

	public mixed $TipoPedido = null;
	public mixed $Caja = null;
	public mixed $Cliente = null;
	public mixed $TipoDocumento = null;
	public mixed $Repartidor = null;
	public mixed $Categoria = null;
	public mixed $Producto = null;
	public mixed $Presentacion = null;
	public mixed $Mozo = null;
	public mixed $TipoPago = null;
	/** @var array<string, mixed>|object|null */
	public mixed $empresa = null;
	public mixed $dato = null;
	public mixed $Proveedor = null;
	public mixed $Proveedores = null;
	public mixed $Cajero = null;
	public mixed $apc = null;
	public mixed $Personal = null;
	public mixed $Salon = null;
	/** @var array<string, mixed>|null */
	public mixed $usuario = null;
	public mixed $Impresora = null;
	public mixed $AreaProduccion = null;
	public mixed $UnidadMedida = null;
	public mixed $Rol = null;
	public mixed $Responsable = null;
	public mixed $Turno = null;

	public function __construct()
	{
	}

	public function render(string $name, bool $noInclude = false): void
	{
		if ($noInclude === true) {
			require 'views/' . $name . '.php';
		} else {
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';
		}
	}
}
