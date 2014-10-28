<?php
App::uses('AppController', 'Controller');
/**
 * BillPositions Controller
 *
 * @property BillPosition $BillPosition
 * @property PaginatorComponent $Paginator
 */
class BillPositionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->BillPosition->recursive = 0;
		$this->set('billPositions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BillPosition->exists($id)) {
			throw new NotFoundException(__('Invalid bill position'));
		}
		$options = array('conditions' => array('BillPosition.' . $this->BillPosition->primaryKey => $id));
		$this->set('billPosition', $this->BillPosition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BillPosition->create();
			if ($this->BillPosition->save($this->request->data)) {
				$this->Session->setFlash(__('The bill position has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bill position could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$bills = $this->BillPosition->Bill->find('list');
		$this->set(compact('bills'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BillPosition->exists($id)) {
			throw new NotFoundException(__('Invalid bill position'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BillPosition->save($this->request->data)) {
				$this->Session->setFlash(__('The bill position has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bill position could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('BillPosition.' . $this->BillPosition->primaryKey => $id));
			$this->request->data = $this->BillPosition->find('first', $options);
		}
		$bills = $this->BillPosition->Bill->find('list');
		$this->set(compact('bills'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BillPosition->id = $id;
		if (!$this->BillPosition->exists()) {
			throw new NotFoundException(__('Invalid bill position'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BillPosition->delete()) {
			$this->Session->setFlash(__('The bill position has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The bill position could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
