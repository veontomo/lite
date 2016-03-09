<?php
class DispatcherTest extends PHPUnit_Framework_TestCase
{
	private $_mapping;
	private $_dispatcher;

	protected function setUp() {
		$this->_mapping = array('images' => 'ClassImages', 'articles' => 'ClassArticles');
		$this->_dispatcher = new Dispatcher($this->_mapping);
	}

    public function testDispatchNull() {
    	$this->assertNull($this->_dispatcher->dispatchBy(NULL));
    }

    public function testDispatchByExisting() {
    	$this->assertNull($this->_dispatcher->dispatchBy("images/simple.jpg"));
    }


    public function testRender404String() {
    	$this->_dispatcher->render404("a string");
    	$this->expectOutputString('page not found');
    }

}
