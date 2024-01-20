<?php
namespace App\Service;

use App\Dao\UsersDao;

class UsersService{
    protected $usersDao;
    public function __construct()
    {
        $this->usersDao = new UsersDao();
    }

    public function fetchAllUsers(){
        return $this->usersDao->fetchAll();
    }

    public function fetchUserById($id){
        $user = $this->usersDao->fetchById($id); 
        if(!empty($user)){
            return $user;
        } else {
            return array(
                "message" => "Invalid ID.",
            );
        }
    }

    public function deleteUser($id){
        $user = $this->usersDao->fetchById($id);
        if(!empty($user)){
            $message = 'Deleting new user failed. Please try again.';
            if ($this->usersDao->deleteEntity($user)) {
                $message = 'Delete user successfully.';
            }
            return array(
                "message" => $message,
            );
        } else {
            return array(
                "message" => "Invalid ID.",
            );
        }
    }

    public function addUser($data){
        $user = $this->usersDao->createNewEntity();
        $user = $this->usersDao->patchEntity($user, $data);
        if($user->getErrors()){
            return $user->getErrors();
        }
        $message = 'Adding new user failed. Please try again.';
        if ($this->usersDao->saveEntity($user)) {
            $message = 'New user added successfully.';
        }
        return array(
            "message" => $message,
        );
    }

    public function editUser($id, $data){
        $user = $this->usersDao->fetchById($id);
        if(!empty($user)){
            $user = $this->usersDao->patchEntity($user, $data);
            $message = 'Edit new user failed.';
            if ($this->usersDao->saveEntity($user)) {
                $message = 'Edit user successfully.';
            }
            return array(
                "message" => $message,
            );
        } else {
            return array(
                "message" => "Invalid ID.",
            );
        }
    }
}
?>