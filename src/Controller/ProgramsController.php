<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use App\Constants\General;

/**
 * Programs Controller
 *
 * @property \App\Model\Table\ProgramsTable $Programs
 *
 * @method \App\Model\Entity\Program[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProgramsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $programs = $this->paginate($this->Programs);

        $this->set(compact('programs'));
    }

    /**
     * View method
     *
     * @param string|null $id Program id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $program = $this->Programs->get($id, [
            'contain' => ['Trainers', 'Clients', 'Workouts']
        ]);

        $this->set('program', $program);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $program = $this->Programs->newEntity();
        if ($this->request->is('post')) {
            $program = $this->Programs->patchEntity($program, $this->request->getData());
            if ($this->Programs->save($program)) {
                $this->Flash->success(__('The program has been saved.'));

                $userId = $this->request->getQuery('id');
                if ($userId) {
                    return $this->redirect(['controller' => 'users', 'action' => 'view', $userId]);
                }
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The program could not be saved. Please, try again.'));
        }
        $users = $this->Programs->Users->find('all');
        $usersCollection = (new Collection($users))->groupBy('role_id')->toArray();

        $users = [];
        foreach(General::ROLES as $role => $roleId) {
            if (empty($usersCollection[$roleId])) {
                continue;
            }

            $users[$role] = (new Collection($usersCollection[$roleId]))->combine('id', 'full_name')->toArray();
        }

        $this->set(compact('program', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Program id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $program = $this->Programs->get($id, [
            'contain' => ['Users']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $program = $this->Programs->patchEntity($program, $this->request->getData());
            if ($this->Programs->save($program)) {
                $this->Flash->success(__('The program has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The program could not be saved. Please, try again.'));
        }
        
        $users = $this->Programs->Users->find('all');
        $usersCollection = (new Collection($users))->groupBy('role_id')->toArray();

        $users = [];
        foreach(General::ROLES as $role => $roleId) {
            if (empty($usersCollection[$roleId])) {
                continue;
            }

            $users[$role] = (new Collection($usersCollection[$roleId]))->combine('id', 'full_name')->toArray();
        }

        $this->set(compact('program', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Program id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $program = $this->Programs->get($id);
        if ($this->Programs->delete($program)) {
            $this->Flash->success(__('The program has been deleted.'));
        } else {
            $this->Flash->error(__('The program could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');

        if (in_array($action, ['index', 'add'])) {
            return true;
        }

        if (!$this->request->getParam('pass.0')) {
            return false;
        }

        $id = $this->request->getParam('pass.0');
        $program = $this->Programs->get($id);

        if ($program->client_id == $user['id']) {
            return true;
        }

        return parent::isAuthorized($user);
    }
}
