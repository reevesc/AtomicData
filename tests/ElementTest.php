<?php

require __DIR__ . '/../vendor/autoload.php';

use ReevesC\AtomicContent\Element;


class ElementTest extends PHPUnit_Framework_TestCase
{

  public function testObject()
  {
    $element = new Element( array('content string') );
    $this->assertArrayHasKey(0, $element->atoms);
    $this->assertArrayHasKey('content', $element->atoms[0]);

    $element = new Element( array(array('id' => '1', 'position' => '1', 'content' => 'test string')) );
    $this->assertArrayHasKey(0, $element->atoms);
    $this->assertArrayHasKey('id', $element->atoms[0]);
    $this->assertArrayHasKey('position', $element->atoms[0]);
    $this->assertArrayHasKey('content', $element->atoms[0]);

  }


//----------------------------------------


}