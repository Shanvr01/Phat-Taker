<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Measurements Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Measurement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Measurement newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Measurement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Measurement|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Measurement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Measurement[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Measurement findOrCreate($search, callable $callback = null, $options = [])
 */
class MeasurementsTable extends Table
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

        $this->setTable('measurements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
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
            ->decimal('user_height')
            ->allowEmpty('user_height');

        $validator
            ->decimal('user_weight')
            ->allowEmpty('user_weight');

        $validator
            ->decimal('user_bodyfat')
            ->allowEmpty('user_bodyfat');

        $validator
            ->scalar('user_notes')
            ->allowEmpty('user_notes');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
