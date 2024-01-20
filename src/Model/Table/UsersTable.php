<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
use App\Model\Validation\CustomValidation;
/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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
        $this->setTable('users');
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
        $customValidator = new CustomValidation();

        $validator
            ->maxLength('Name', 30, 'Length must not exceed 30 characters.')
            ->maxLength('Age', 3, 'Length must not exceed 3 characters.')
            ->maxLength('Phone', 6, 'Length must not exceed 6 characters.'); 

        $validator
            -> requirePresence([
                'Name' => [
                    'mode' => 'create',
                    'message' => 'Name is required.',
                ], 
                'Age' => [
                    'mode' => 'create',
                    'message' => 'Age is required.',
                ],
                'DoB' => [
                    'mode' => 'create',
                    'message' => 'Date of Birth is required.',
                ],
                'Phone' => [
                    'mode' => 'create',
                    'message' => 'Phone number is required.',
                ],
        ]);

        $validator
            ->allowEmptyString('ID', 'create')
            ->notEmptyString('Name', 'Name cannot be empty.', 'create')
            ->notEmptyString('Age', 'Age cannot be empty.', 'create')
            ->notEmptyString('Phone', 'Phone number cannot be empty.', 'create')
            ->notEmptyDate('DoB', 'Date of birth cannot be empty.', 'create');
     
        $validator
            ->integer('ID')
            ->scalar('ID')
            ->integer('Age')
            ->integer('Phone')
            ->date('DoB');

        // $validator
        //     ->add('Phone', 'custom', [
        //         'rule' => function ($value, $context) use ($customValidator) {
        //             return $customValidator->isPhoneNumber($value);
        //         },
        //         'provider' => 'custom',
        //         'message' => 'Invalid phone number.'
        //     ]);

        return $validator;
    }
}
