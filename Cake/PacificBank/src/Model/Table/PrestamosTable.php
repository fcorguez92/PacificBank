<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prestamos Model
 *
 * @method \App\Model\Entity\Prestamo newEmptyEntity()
 * @method \App\Model\Entity\Prestamo newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Prestamo> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Prestamo get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Prestamo findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Prestamo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Prestamo> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Prestamo|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Prestamo saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Prestamo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Prestamo>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Prestamo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Prestamo> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Prestamo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Prestamo>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Prestamo>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Prestamo> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PrestamosTable extends Table
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

        $this->setTable('prestamos');
        $this->setDisplayField('ID');
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
            ->decimal('Monto')
            ->requirePresence('Monto', 'create')
            ->notEmptyString('Monto');

        $validator
            ->decimal('TasaInteres')
            ->requirePresence('TasaInteres', 'create')
            ->notEmptyString('TasaInteres');

        $validator
            ->integer('CuotasTotales')
            ->requirePresence('CuotasTotales', 'create')
            ->notEmptyString('CuotasTotales');

        $validator
            ->integer('CuotasRestantes')
            ->requirePresence('CuotasRestantes', 'create')
            ->notEmptyString('CuotasRestantes');

        return $validator;
    }
}
