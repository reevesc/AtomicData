<?php

namespace ReevesC\examples\paragraphToWord;

use ReevesC\AtomicData\AbstractAtomicData;

class Word extends AbstractAtomicData {

  public $parentClass = __NAMESPACE__.'\Sentence';


//----------------------------------------
  

  protected function _fissionReactor( $input = null )
  {
    if(empty($input)) return array();

    $split = preg_split("/\s+|\b(?=[!\?\.\,\;])(?!\.\s+)/", $input, -1, PREG_SPLIT_NO_EMPTY);
    return $split;

  } 


//----------------------------------------


  protected function _fussionReactor( $input = null )
  {
    return implode(' ', $input);

  }


//----------------------------------------


} //end class
