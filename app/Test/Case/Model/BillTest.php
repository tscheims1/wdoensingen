<?php
App::uses('Bill', 'Model');

/**
 * Bill Test Case
 *
 */
class BillTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bill',
		'app.customer',
		'app.bill_type',
		'app.bill_position'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bill = ClassRegistry::init('Bill');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bill);

		parent::tearDown();
	}

}
