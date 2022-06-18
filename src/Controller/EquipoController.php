<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Equipo Controller
 *
 * @property \App\Model\Table\EquipoTable $Equipo
 * @method \App\Model\Entity\Equipo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquipoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $equipo = $this->paginate($this->Equipo);

        $this->set(compact('equipo'));
    }

    /**
     * View method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipo = $this->Equipo->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('equipo'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $equipo = $this->Equipo->newEmptyEntity();
        if ($this->request->is('post')) {
            $equipo = $this->Equipo->patchEntity($equipo, $this->request->getData());
            if ($this->Equipo->save($equipo)) {
                $this->Flash->success(__('The equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipo could not be saved. Please, try again.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $equipo = $this->Equipo->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipo = $this->Equipo->patchEntity($equipo, $this->request->getData());
            if ($this->Equipo->save($equipo)) {
                $this->Flash->success(__('The equipo has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The equipo could not be saved. Please, try again.'));
        }
        $this->set(compact('equipo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipo = $this->Equipo->get($id);
        if ($this->Equipo->delete($equipo)) {
            $this->Flash->success(__('The equipo has been deleted.'));
        } else {
            $this->Flash->error(__('The equipo could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
