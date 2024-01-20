<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Dao\TodosDao;

/**
 * Todos Controller
 *
 * @property \App\Model\Table\TodosTable $Todos
 *
 * @method \App\Model\Entity\Todo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TodosController extends AppController
{
    public function initialize(){
        $this->TodosDao = new TodosDao();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $todos = $this->TodosDao->fetchAll();
        $this->set('todos', $todos);
    }

    /**
     * View method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function viewTodo($id = null)
    {
        $todo = $this->TodosDao->fetchById($id);

        $this->set('todo', $todo);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function addTodo()
    {
        $todo = $this->Todos->newEntity();
        if ($this->request->is('post')) {
            $todo = $this->Todos->patchEntity($todo, $this->request->getData());
            if ($this->Todos->save($todo)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('todo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function editTodo($id = null)
    {
        $todo = $this->Todos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $todo = $this->Todos->patchEntity($todo, $this->request->getData());
            if ($this->Todos->save($todo)) {
                return $this->redirect(['action' => 'index']);
            }
        }
        $this->set(compact('todo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Todo id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteTodo($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $todo = $this->Todos->get($id);
        $this->Todos->delete($todo);
        return $this->redirect(['action' => 'index']);
    }
}
