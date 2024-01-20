<?php
    namespace App\Dao;

    use App\Dao\AppDao;

    class UsersDao extends AppDao{
        public function __construct()
        {
            parent::__construct('users');
        }
    }
?>