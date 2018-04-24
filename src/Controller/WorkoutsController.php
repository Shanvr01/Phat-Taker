<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Workouts Controller
 *
 * @property \App\Model\Table\WorkoutsTable $Workouts
 *
 * @method \App\Model\Entity\Workout[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class WorkoutsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->Auth->allow(['view']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Programs']
        ];
        $workouts = $this->paginate($this->Workouts);

        $this->set(compact('workouts'));
    }

    /**
     * View method
     *
     * @param string|null $id Workout id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $workout = $this->Workouts->get($id, [
            'contain' => ['Programs', 'Exercises']
        ]);

        $this->set('workout', $workout);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $workout = $this->Workouts->newEntity();
        if ($this->request->is('post')) {
            $workout = $this->Workouts->patchEntity($workout, $this->request->getData());
            if ($this->Workouts->save($workout)) {
                $this->Flash->success(__('The workout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workout could not be saved. Please, try again.'));
        }
        $programs = $this->Workouts->Programs->find('list', ['limit' => 200]);
        $exercises = $this->Workouts->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('workout', 'programs', 'exercises'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Workout id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $workout = $this->Workouts->get($id, [
            'contain' => ['Exercises']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $workout = $this->Workouts->patchEntity($workout, $this->request->getData());
            if ($this->Workouts->save($workout)) {
                $this->Flash->success(__('The workout has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The workout could not be saved. Please, try again.'));
        }
        $programs = $this->Workouts->Programs->find('list', ['limit' => 200]);
        $exercises = $this->Workouts->Exercises->find('list', ['limit' => 200]);
        $this->set(compact('workout', 'programs', 'exercises'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Workout id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $workout = $this->Workouts->get($id);
        if ($this->Workouts->delete($workout)) {
            $this->Flash->success(__('The workout has been deleted.'));
        } else {
            $this->Flash->error(__('The workout could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
