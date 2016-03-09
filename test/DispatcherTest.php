<?php
class DispatcherTest extends PHPUnit_Framework_TestCase
{
	private $_mapping;
	private $_dispatcher;

	protected function setUp() {
		$this->_mapping = array('a' => 'ClassA', 'b' => 'ClassB');
	}

    public function testDispatchNull() {
    	$this->_dispatcher = new Dispatcher($this->_mapping);
    	$this->assertNull($this->_dispatcher->dispatchBy(NULL));
    }
}
