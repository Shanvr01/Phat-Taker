<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Measurements Controller
 *
 * @property \App\Model\Table\MeasurementsTable $Measurements
 *
 * @method \App\Model\Entity\Measurement[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MeasurementsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $measurements = $this->paginate($this->Measurements);

        $this->set(compact('measurements'));
    }

    /**
     * View method
     *
     * @param string|null $id Measurement id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $measurement = $this->Measurements->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('measurement', $measurement);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $measurement = $this->Measurements->newEntity();
        if ($this->request->is('post')) {
            $measurement = $this->Measurements->patchEntity($measurement, $this->request->getData());
            if ($this->Measurements->save($measurement)) {
                $this->Flash->success(__('The measurement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The measurement could not be saved. Please, try again.'));
        }
        $users = $this->Measurements->Users->find('list', ['valueField' => 'full_name']);
        
        $this->set(compact('measurement', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Measurement id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $measurement = $this->Measurements->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $measurement = $this->Measurements->patchEntity($measurement, $this->request->getData());
            if ($this->Measurements->save($measurement)) {
                $this->Flash->success(__('The measurement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The measurement could not be saved. Please, try again.'));
        }
        $users = $this->Measurements->Users->find('list', ['limit' => 200]);
        $this->set(compact('measurement', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Measurement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $measurement = $this->Measurements->get($id);
        if ($this->Measurements->delete($measurement)) {
            $this->Flash->success(__('The measurement has been deleted.'));
        } else {
            $this->Flash->error(__('The measurement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
