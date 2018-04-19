<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Measurement Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $user_age
 * @property string $user_gender
 * @property string $user_height
 * @property string $user_weight
 * @property string $user_bodyfat
 * @property string $user_notes
 *
 * @property \App\Model\Entity\User $user
 */
class Measurement extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'user_id' => true,
        'user_age' => true,
        'user_gender' => true,
        'user_height' => true,
        'user_weight' => true,
        'user_bodyfat' => true,
        'user_notes' => true,
        'user' => true
    ];
}
