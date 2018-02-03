<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Workouts Model
 *
 * @property \App\Model\Table\ProgramsTable|\Cake\ORM\Association\BelongsTo $Programs
 * @property \App\Model\Table\ExercisesTable|\Cake\ORM\Association\BelongsToMany $Exercises
 *
 * @method \App\Model\Entity\Workout get($primaryKey, $options = [])
 * @method \App\Model\Entity\Workout newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Workout[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Workout|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Workout patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Workout[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Workout findOrCreate($search, callable $callback = null, $options = [])
 */
class WorkoutsTable extends Table
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

        $this->setTable('workouts');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->belongsTo('Programs', [
            'foreignKey' => 'program_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsToMany('Exercises', [
            'foreignKey' => 'workout_id',
            'targetForeignKey' => 'exercise_id',
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['program_id'], 'Programs'));

        return $rules;
    }
}
