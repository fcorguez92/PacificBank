<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TransaccionesFixture
 */
class TransaccionesFixture extends TestFixture
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
                'UsuarioRemitenteID' => 1,
                'UsuarioDestinatarioID' => 1,
                'Monto' => 1.5,
                'FechaTransaccion' => '2023-11-10',
            ],
        ];
        parent::init();
    }
}
