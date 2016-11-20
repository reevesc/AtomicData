<?php

namespace ReevesC\AtomicContent;

/**
 *
 * @package   reevesc/atomic-content
 * @author    Clinton Reeves
 * @copyright Copyright (c) 2016
 * @link http://clintonreeves.com
 * 
 */

// ------------------------------------------------------------------------

Interface AtomicContentInterface {


  public function atomize();
  public function fuse();

  public function hasElements();
  public function hasContent();

  public function hasChildClass();
  public function hasParentClass();

  //public function formatProperty($name);


}

// EOF