<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Program Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $trainer_id
 * @property int $client_id
 *
 * @property \App\Model\Entity\User[] $users
 * @property \App\Model\Entity\Workout[] $workouts
 */
class Program extends Entity
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
        'title' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'trainer_id' => true,
        'client_id' => true,
        'users' => true,
        'workouts' => true
    ];
}
