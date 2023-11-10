<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cuentas Controller
 *
 * @property \App\Model\Table\CuentasTable $Cuentas
 */
class CuentasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cuentas->find();
        $cuentas = $this->paginate($query);

        $this->set(compact('cuentas'));
    }

    /**
     * View method
     *
     * @param string|null $id Cuenta id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cuenta = $this->Cuentas->get($id, contain: []);
        $this->set(compact('cuenta'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cuenta = $this->Cuentas->newEmptyEntity();
        if ($this->request->is('post')) {
            $cuenta = $this->Cuentas->patchEntity($cuenta, $this->request->getData());
            if ($this->Cuentas->save($cuenta)) {
                $this->Flash->success(__('The cuenta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuenta could not be saved. Please, try again.'));
        }
        $this->set(compact('cuenta'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cuenta id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cuenta = $this->Cuentas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cuenta = $this->Cuentas->patchEntity($cuenta, $this->request->getData());
            if ($this->Cuentas->save($cuenta)) {
                $this->Flash->success(__('The cuenta has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cuenta could not be saved. Please, try again.'));
        }
        $this->set(compact('cuenta'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cuenta id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $cuenta = $this->Cuentas->get($id);
        if ($this->Cuentas->delete($cuenta)) {
            $this->Flash->success(__('The cuenta has been deleted.'));
        } else {
            $this->Flash->error(__('The cuenta could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
