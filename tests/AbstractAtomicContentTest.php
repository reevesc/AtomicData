<?php

require __DIR__ . '/../vendor/autoload.php';

use ReevesC\AtomicContent\AbstractAtomicContent;
//use \Mockery as m;

class AbstractAtomicContentTest extends PHPUnit_Framework_TestCase
{

  //
  //before each test
  //
  public function setUp()
  {
    //storing everything in _test object because its tidy, and should simplify clean up/garabage collection
    $this->_test = new stdClass();
    $this->_test->stub = $this->getMockForAbstractClass('ReevesC\AtomicContent\AbstractAtomicContent');

  }


// ------------------------------------------------------------------------


  //
  //after each test
  //
  protected function tearDown()
  {
    //clean up
    unset($this->_test);

  }


// ------------------------------------------------------------------------


  public function testHasContent()
  {
    //without
    $this->assertFalse($this->_test->stub->hasContent());

    //with
      //build out stub
      $this->buildAtomizedStub();

      //confirm
      $this->assertTrue( $this->_test->stub->hasContent() );

  }


// ------------------------------------------------------------------------


  public function testHasElements()
  {
    //without
    $this->assertFalse( $this->_test->stub->hasElements() );

    //with
      //build out stub
      $this->buildAtomizedStub();
      
      //confirm
      $this->assertTrue( $this->_test->stub->hasElements() );

  }


// ------------------------------------------------------------------------


  public function testHasChildClass()
  {
    //without
    $this->assertFalse( $this->_test->stub->hasChildClass() );

    //with
    $this->_test->stub->childClass = 'testChildClass';
    $this->assertTrue( $this->_test->stub->hasChildClass() );

  }


// ------------------------------------------------------------------------


  public function testHasParentClass()
  {
    //without
    $this->assertFalse($this->_test->stub->hasParentClass());

    //with
    $this->_test->stub->parentClass = 'testParentClass';
    $this->assertTrue( $this->_test->stub->hasParentClass() );

  }


// ------------------------------------------------------------------------


  public function testAtomize()
  {
    //build out stub
    $this->buildAtomizedStub();

    //confirm
    $this->assertArrayHasKey(0, $this->_test->response->atoms);
    $this->assertInstanceOf('ReevesC\AtomicContent\Element', $this->_test->response);
    $this->assertTrue( $this->_test->stub->hasElements() );

  }


// ------------------------------------------------------------------------


  public function testFuse()
  {
    //build out stub
    $this->buildAtomizedStub();

    //confirm
    $this->assertEquals( $this->_test->content, $this->_test->stub->fuse() );


  }


// ------------------------------------------------------------------------


  private function buildAtomizedStub()
  {

    $this->_test->content = 'A content string.';
    $this->_test->stub = $this->getMockForAbstractClass('ReevesC\AtomicContent\AbstractAtomicContent', array(array(), $this->_test->content));
    
    //_fissionReactor
    $this->_test->stub->expects( $this->any() )
                        ->method('_fissionReactor')
                        ->will( $this->returnValue( explode(' ', $this->_test->content)) );

    //_fussionReactor
    $this->_test->stub->expects( $this->any() )
                        ->method('_fussionReactor')
                        ->will( $this->returnValue( $this->_test->content ));

    $this->_test->response = $this->_test->stub->atomize( $this->_test->content );

  }


// ------------------------------------------------------------------------


}