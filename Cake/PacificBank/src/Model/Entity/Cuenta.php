<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cuenta Entity
 *
 * @property int $ID
 * @property int|null $UsuarioID
 * @property string $IBAN
 * @property string|null $Saldo
 */
class Cuenta extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'UsuarioID' => true,
        'IBAN' => true,
        'Saldo' => true,
    ];
}
