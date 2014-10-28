<?php
App::uses('AppController', 'Controller');
/**
 * BillTypes Controller
 *
 * @property BillType $BillType
 * @property PaginatorComponent $Paginator
 */
class BillTypesController extends AppController {

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
		$this->BillType->recursive = 0;
		$this->set('billTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BillType->exists($id)) {
			throw new NotFoundException(__('Invalid bill type'));
		}
		$options = array('conditions' => array('BillType.' . $this->BillType->primaryKey => $id));
		$this->set('billType', $this->BillType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BillType->create();
			if ($this->BillType->save($this->request->data)) {
				$this->Session->setFlash(__('The bill type has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bill type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->BillType->exists($id)) {
			throw new NotFoundException(__('Invalid bill type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BillType->save($this->request->data)) {
				$this->Session->setFlash(__('The bill type has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bill type could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('BillType.' . $this->BillType->primaryKey => $id));
			$this->request->data = $this->BillType->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->BillType->id = $id;
		if (!$this->BillType->exists()) {
			throw new NotFoundException(__('Invalid bill type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BillType->delete()) {
			$this->Session->setFlash(__('The bill type has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The bill type could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
