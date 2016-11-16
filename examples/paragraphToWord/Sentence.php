<?php

namespace ReevesC\examples\paragraphToWord;

use ReevesC\AtomicData\AbstractAtomicData;

class Sentence extends AbstractAtomicData {


  public $childClass = __NAMESPACE__.'\Word';
  public $parentClass = __NAMESPACE__.'\Paragraph';

  
//----------------------------------------
  

  protected function _fissionReactor( $input = null )
  {
    if(empty($input)) return array();

    return preg_split('/(?<=[.?!;])\s+/', $input, -1, PREG_SPLIT_NO_EMPTY);

  } 


//----------------------------------------


  protected function _fussionReactor( $input = null )
  {
    return implode(' ', $input);

  }


//----------------------------------------


} //end class
