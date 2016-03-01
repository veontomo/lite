<?php
class ViewTest extends PHPUnit_Framework_TestCase
{

    public function testRenderJPGNotExist()
    {
        $view = new View();
        $this->assertNull($view->renderJPG("file that does not exist"));
    }
}