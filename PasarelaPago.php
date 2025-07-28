<?php
class PasarelaPago {
    protected $monto;
    protected $moneda;

    public function __construct($monto, $moneda = "USD") {
        $this->monto = $monto;
        $this->moneda = $moneda;
    }

    // Método para iniciar el proceso de pago
    abstract public function procesarPago();

    // Método para validar los datos del pago
    protected function validarDatos() {
        if ($this->monto <= 0) {
            throw new Exception("Monto inválido para el pago.");
        }
        // Más validaciones pueden agregarse aquí
    }
}
?>
