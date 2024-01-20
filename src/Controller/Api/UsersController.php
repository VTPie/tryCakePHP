<?php
namespace App\Controller\Api;

use App\Controller\AppController;
use App\Dao\UsersDao;
use App\Service\UsersService;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property UserService userService
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void{
        parent::initialize();
        // $this->loadComponent('RequestHandler');
        $this->usersDao = new UsersDao();
        $this->usersService = new UsersService();
    }

    public function index()
    {  
        try {
            $users = $this->usersService->fetchAllUsers();
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode(['result'=> $users]));
        } catch (\Exception $e) {
            return $this->response
                ->withType('application/json')
                ->withStatus(500)
                ->withStringBody(json_encode(['error' => $e->getMessage()]));
        }

    }

    public function view($id = null)
    {
        try {
            $result = $this->usersService->fetchUserById($id);
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode(['result'=> $result]));
        } catch (\Exception $e) {
            return $this->response
                ->withType('application/json')
                ->withStatus(500)
                ->withStringBody(json_encode(['error' => $e->getMessage()]));
        }
    }

    public function add()
    {
        try {
            $postData = $this->request->getData();
            $result = $this->usersService->addUser($postData);
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode(['result'=> $result]));
        } catch (\Exception $e) {
            return $this->response
                ->withType('application/json')
                ->withStatus(500)
                ->withStringBody(json_encode(['error' => $e->getMessage()]));
        }
    }

    public function edit($id = null)
    {
        try {
            $postData = $this->request->getData();
            $result = $this->usersService->editUser($id, $postData);           
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode(['result'=> $result])); 
        } catch (\Exception $e) {
            return $this->response
                ->withType('application/json')
                ->withStatus(500)
                ->withStringBody(json_encode(['error' => $e->getMessage()]));
        }
    }

    public function delete($id = null)
    {
        try {
            $result = $this->usersService->deleteUser($id);           
            return $this->response
                ->withType('application/json')
                ->withStringBody(json_encode(['result'=> $result]));
        } catch (\Exception $e) {
            return $this->response
                ->withType('application/json')
                ->withStatus(500)
                ->withStringBody(json_encode(['error' => $e->getMessage()]));
        }
    }
}