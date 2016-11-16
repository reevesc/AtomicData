<?php

namespace ReevesC\AtomicData;

use ReevesC\AtomicData\AtomicDataInterface;

/**
 * 
 *
 * @package   reevesC/AtomicData
 * @author    Clinton Reeves
 * @copyright Copyright (c) 2016
 * @link    http://clintonreeves.com
 *
 *
**/

// ------------------------------------------------------------------------

/**
 *
 *
 * Abstract Atomic Model
 *
 * Notes about this class...
 *
 * @package     
 * @subpackage  
 * @category    
 * @author      
 * @link        
 *
 *
**/

abstract class AbstractAtomicData implements AtomicDataInterface {

  public $_data;
  public $elements;
  public $content;
  
  public $childClass;
  public $parentClass;


  /**
   *
   * @param properties - array
   * @param originalContent - string
   *
  **/
  public function __construct(Array $properties = array(), $originalContent = null )
  {
    $this->_data = $properties;

    if( !empty($originalContent) )
    {
      $this->atomize( $originalContent );
      unset($originalContent);
    }

  }
 

// ------------------------------------------------------------------------


  /**
   * 
   * magic setter
   *
   * @param property - string - name of class property (array key in _data)
   * @param value - string - value to set class property to
   *
   * @return string
   *
  **/
  public function __set( $property, $value )
  {
    return $this->_data[$property] = $value;

  }


// ------------------------------------------------------------------------


  /**
   * 
   * magic getter
   *
   * @param property - string - name of class property to return value from
   *
   * @return mixed - string (if property exists) / null (if property doesn't exist)
   *
  **/
  public function __get( $property )
  {
    return (array_key_exists($property, $this->_data)) ? $this->_data[$property] : null;

  }


// ------------------------------------------------------------------------


  /**
   * 
   * hasExtractedContent()
   *
   * @param none
   *
   * @return boolean
   *
  **/
  public function hasContent()
  {
    return ( empty($this->content) ) ? false : true;

  }


// ------------------------------------------------------------------------


  /**
   * 
   * hasExtractedContent()
   *
   * @param none
   *
   * @return boolean
   *
  **/
  public function hasElements()
  {
    return ( is_a($this->content, "ReevesC\AtomicData\Element") ) ? true : false;

  }


// ------------------------------------------------------------------------


  /**
   * 
   * hasChildClass()
   *
   * @param none
   *
   * @return boolean
   *
  **/
  public function hasChildClass()
  {
    return ( empty($this->childClass) ) ? false : true;

  }


// ------------------------------------------------------------------------


  /**
   * 
   * hasParentClass()
   *
   * @param none
   *
   * @return boolean
   *
  **/
  public function hasParentClass()
  {
    return ( empty($this->parentClass) ) ? false : true;

  }


// ------------------------------------------------------------------------


  /**
   * 
   * _fusionReactor()
   * 
   * define how rawContent should be split
   *
   * @param none 
   *
  **/
  abstract protected function _fissionReactor( $input = null );


// ------------------------------------------------------------------------


  /**
   * 
   * _fussionReactor()
   * 
   * define how content should be "fused" back together
   *
   * @param none 
   *
  **/
  abstract protected function _fussionReactor( $input = null );


// ------------------------------------------------------------------------


  /**
   * 
   * atomize
   * 
   * splits content into inividual pieces
   *
   * @param content string - content to run through atomizer
   *
  **/
  public function atomize( $content = null )
  {
    if( empty($content) ) return;

    $matches = $this->_fissionReactor( $content );
 
    if( empty($matches) )
    {
      return $this->content = false;
    }
    else
    {
      if( $this->hasChildClass() )
      {
        foreach( $matches as $index => $data )
        {
          $this->content[] = new $this->childClass( array('id' => $index), $data );
        }
      }
      else
      {
        $this->content = new Element( $matches );
      }
    }
    return $this->content;

  }


// ------------------------------------------------------------------------


  /**
   * 
   * fuse
   * 
   * fuse pieces back together into their original state
   *
   * @param none 
   *
  **/
  public function fuse()
  {

    if( $this->hasElements() )
    {
      $ret = array_map(function($elem){ return $elem['content']; }, $this->content->atoms);
    }
    else
    {
      foreach( $this->content as $c )
      {
        $ret[] = $c->fuse();
      }
    }
    return $this->_fussionReactor($ret);

  }


// ------------------------------------------------------------------------


  /**
   * 
   * formatProperty()
   *
   * additional custom formatting for specific class properties
   *   checks to see if format<PropertyName>() function exists and calls it if it does.
   *
   * @param $name string - class property to format
   *
   * @return void
   *
  **/
/*
  public function formatProperty($name)
  {
    if( method_exists($this, "format{$name}") )
    {
      call_user_func($name);
    }
    return;

  }
*/

// ------------------------------------------------------------------------



}


