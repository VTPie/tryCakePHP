<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Todo Model
 *
 * @method \App\Model\Entity\Todo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Todo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Todo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Todo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Todo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Todo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Todo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Todo findOrCreate($search, callable $callback = null, $options = [])
 */
class TodosTable extends Table
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

        $this->setTable('todo');
        $this->setDisplayField('ID');
        $this->setPrimaryKey('ID');
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
            ->integer('ID')
            ->allowEmptyString('ID', null, 'create');

        $validator
            ->scalar('Title')
            ->maxLength('Title', 50)
            ->allowEmptyString('Title');

        $validator
            ->scalar('Description')
            ->maxLength('Description', 50)
            ->allowEmptyString('Description');

        return $validator;
    }
}
