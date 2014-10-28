<?php
/**
 * BillFixture
 *
 */
class BillFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'create_date' => array('type' => 'datetime', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'print_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'paid_date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'bill_type_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'bill_number' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'bill_number' => array('column' => 'bill_number', 'unique' => 1),
			'bill_type_id' => array('column' => 'bill_type_id', 'unique' => 0),
			'customer_id' => array('column' => 'customer_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'customer_id' => 1,
			'create_date' => '2014-10-19 12:01:22',
			'print_date' => '2014-10-19 12:01:22',
			'paid_date' => '2014-10-19 12:01:22',
			'bill_type_id' => 1,
			'bill_number' => 1
		),
	);

}
