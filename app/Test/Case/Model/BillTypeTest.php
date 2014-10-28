<?php
App::uses('BillType', 'Model');

/**
 * BillType Test Case
 *
 */
class BillTypeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bill_type',
		'app.bill'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BillType = ClassRegistry::init('BillType');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BillType);

		parent::tearDown();
	}

}
