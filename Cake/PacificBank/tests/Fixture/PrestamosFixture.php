<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PrestamosFixture
 */
class PrestamosFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'ID' => 1,
                'UsuarioID' => 1,
                'Monto' => 1.5,
                'TasaInteres' => 1.5,
                'CuotasTotales' => 1,
                'CuotasRestantes' => 1,
            ],
        ];
        parent::init();
    }
}
