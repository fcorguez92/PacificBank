<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Transaccione Entity
 *
 * @property int $ID
 * @property int|null $UsuarioRemitenteID
 * @property int|null $UsuarioDestinatarioID
 * @property string $Monto
 * @property \Cake\I18n\Date $FechaTransaccion
 */
class Transaccione extends Entity
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
        'UsuarioRemitenteID' => true,
        'UsuarioDestinatarioID' => true,
        'Monto' => true,
        'FechaTransaccion' => true,
    ];
}
