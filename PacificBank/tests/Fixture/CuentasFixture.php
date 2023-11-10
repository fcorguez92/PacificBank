<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CuentasFixture
 */
class CuentasFixture extends TestFixture
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
                'IBAN' => 'Lorem ipsum dolor sit amet',
                'Saldo' => 1.5,
            ],
        ];
        parent::init();
    }
}
