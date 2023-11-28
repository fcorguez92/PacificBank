<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CuentasTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CuentasTable Test Case
 */
class CuentasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CuentasTable
     */
    protected $Cuentas;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Cuentas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Cuentas') ? [] : ['className' => CuentasTable::class];
        $this->Cuentas = $this->getTableLocator()->get('Cuentas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Cuentas);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\CuentasTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
