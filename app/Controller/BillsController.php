<?php
App::uses('AppController', 'Controller');
/**
 * Bills Controller
 *
 * @property Bill $Bill
 * @property PaginatorComponent $Paginator
 */
class BillsController extends AppController {


/**
 * Helpers
 * 
 * @var aray
 */
public $helpers = array('Price');

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
		$this->Bill->recursive = 0;
		$this->set('bills', $this->Paginator->paginate());
	}

/**
 * beforeFilter function
 */
 
 public function beforeFilter(){
 	parent::beforeFilter();
	$this->loadModel("Product");
	$this->set("Product",$this->Product->find("all"));
	
	$this->loadModel("Customer");
	$this->set("Customer",$this->Customer->find("all"));
 }


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bill->exists($id)) {
			throw new NotFoundException(__('Invalid bill'));
		}
		$options = array('conditions' => array('Bill.' . $this->Bill->primaryKey => $id));
		$this->set('bill', $this->Bill->find('first', $options));
	}
	
	
/**
 * view method
 *
 * @throws NotFoundException
 * @return void
 */
	public function search() {
		$options = array("bill_number LIKE" => "%".$this->request->data['Bills']['search']."%");
		$this->set('bills', $this->Paginator->paginate($options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$this->loadModel('BillPosition');
			$dateTime = new DateTime("now");
			$this->request->data['Bill']['create_date'] = $dateTime->format("Y-m-d h:i:s");
			$this->Bill->create();
			if ($this->Bill->save($this->request->data)) {
				
				$billID = $this->Bill->getLastInsertID();
				$request = $this->request->data;
				
				foreach($request['BillPositions'] as $billPosition)
				{
					$billPosition['BillPosition']['bill_id'] = $billID;
					$billPosition['BillPosition']['id'] = '';
					$this->BillPosition->save($billPosition['BillPosition']);
				}				
				$this->Session->setFlash(__('The bill has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bill could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$customerid = $this->request->params['named']['customerid']; 
		$customers = $this->Bill->Customer->find('list');
		$billTypes = $this->Bill->BillType->find('list');
		$this->set(compact('customers', 'billTypes', 'customerid'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bill->exists($id)) {
			throw new NotFoundException(__('Invalid bill'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bill->save($this->request->data)) {
				$this->Session->setFlash(__('The bill has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bill could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Bill.' . $this->Bill->primaryKey => $id));
			$this->request->data = $this->Bill->find('first', $options);
		}
		$customers = $this->Bill->Customer->find('list');
		$billTypes = $this->Bill->BillType->find('list');
		$this->set(compact('customers', 'billTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bill->id = $id;
		if (!$this->Bill->exists()) {
			throw new NotFoundException(__('Invalid bill'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bill->delete()) {
			$this->Session->setFlash(__('The bill has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The bill could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	
	/**
	 * PDF export function
	 * 
	 * @param int $id The Bill ID 
	 */
	public function pdfExport($id =null)
	{
		$this->layout ="pdf";
		App::uses('OWNTCPDF', 'Lib/tcpdf');
		$pdf = new OWNTCPDF();
		$pdf->addPage();
		$bill = $this->Bill->find('first',array('conditions'=> array('Bill.id' => $id)));
		$dateTime = new DateTime("now");
		$bill['Bill']['print_date'] = $dateTime->format("Y-m-d h:i:s");
		unset($bill['Bill']['paid_date']);
		$this->Bill->save($bill);
		$this->set("pdf", $pdf);
		$this->set('bill',$bill);
	}
}
