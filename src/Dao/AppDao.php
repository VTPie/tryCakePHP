<?php
    namespace App\Dao;

    use Cake\ORM\TableRegistry;
    use Cake\ORM\ResultSet;
    use Cake\Database\Expression\QueryExpression;
    use Cake\Datasource\EntityInterface;

    class AppDao{
        protected $table;

        public function __construct(string $alias)
        {
            $this->table = TableRegistry::getTableLocator()->get($alias);
        }

        public function fetchAll(): ResultSet
        {
            return $this->table->find('all')->all();
        }

        public function fetchById(int $id): ?EntityInterface
        {
            return $this->table
                ->find()
                ->where(
                    function (QueryExpression $exp) use ($id) {
                        return $exp->eq('id', $id);
                    }
                )
                ->first();
        }

        public function createNewEntity(array $data = null): EntityInterface
        {
            return $this->table->newEntity($data);
        }

        public function patchEntity(EntityInterface $entity, array $data): EntityInterface
        {
            return $this->table->patchEntity($entity, $data);
        }

        public function saveEntity(EntityInterface $entity)
        {
            return $this->table->save($entity);
        }

        public function deleteEntity(EntityInterface $entity)
        {
            return $this->table->delete($entity);
        }
    }
?>