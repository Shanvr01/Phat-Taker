<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Exercises Model
 *
 * @property \App\Model\Table\WorkoutsTable|\Cake\ORM\Association\BelongsToMany $Workouts
 *
 * @method \App\Model\Entity\Exercise get($primaryKey, $options = [])
 * @method \App\Model\Entity\Exercise newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Exercise[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Exercise|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Exercise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Exercise findOrCreate($search, callable $callback = null, $options = [])
 */
class ExercisesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('exercises');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Workouts', [
            'foreignKey' => 'exercise_id',
            'targetForeignKey' => 'workout_id',
            'joinTable' => 'workouts_exercises'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmpty('title');

        $validator
            ->scalar('description')
            ->maxLength('description', 255)
            ->allowEmpty('description');

        return $validator;
    }
}
