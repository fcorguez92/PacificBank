<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cuentas Model
 *
 * @method \App\Model\Entity\Cuenta newEmptyEntity()
 * @method \App\Model\Entity\Cuenta newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cuenta> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cuenta get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cuenta findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cuenta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cuenta> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cuenta|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cuenta saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cuenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cuenta>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cuenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cuenta> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cuenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cuenta>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cuenta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cuenta> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CuentasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('cuentas');
        $this->setDisplayField('IBAN');
        $this->setPrimaryKey('ID');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('UsuarioID')
            ->allowEmptyString('UsuarioID');

        $validator
            ->scalar('IBAN')
            ->maxLength('IBAN', 30)
            ->requirePresence('IBAN', 'create')
            ->notEmptyString('IBAN');

        $validator
            ->decimal('Saldo')
            ->allowEmptyString('Saldo');

        return $validator;
    }
}
