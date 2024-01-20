<?php
    namespace App\Dao;

    use App\Dao\AppDao;

    class TodosDao extends AppDao{
        public function __construct()
        {
            parent::__construct('todos');
        }
    }
?>