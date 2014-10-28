<?php
App::uses('BillPosition', 'Model');

/**
 * BillPosition Test Case
 *
 */
class BillPositionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bill_position',
		'app.bill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BillPosition = ClassRegistry::init('BillPosition');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BillPosition);

		parent::tearDown();
	}

}
