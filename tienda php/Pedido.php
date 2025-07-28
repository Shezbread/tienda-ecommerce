<?php
class Pedido
{
    public $descripcion, $tipo, $producto, $unidades, $observaciones;

    public function __construct($descripcion, $tipo, $producto, $unidades, $observaciones)
    {
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->producto = $producto;
        $this->unidades = $unidades;
        $this->observaciones = $observaciones;
    }

    public function mostrarResumen()
    {
        return "<div class='resumen'>
            <h3>Resumen del Pedido</h3>
            <strong>Producto:</strong> $this->producto<br>
            <strong>Tipo:</strong> $this->tipo<br>
            <strong>Unidades:</strong> $this->unidades<br>
            <strong>Descripción:</strong> $this->descripcion<br>
            <strong>Observaciones:</strong> $this->observaciones<br>
        </div>";
    }
}
?>