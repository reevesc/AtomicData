<?php

namespace ReevesC\examples\paragraphToWord;

use ReevesC\AtomicContent\AbstractAtomicContent;

class Paragraph extends AbstractAtomicContent {


  public $childClass = __NAMESPACE__.'\Sentence';


//----------------------------------------


  protected function _fissionReactor( $input = null )
  {
    if(empty($input)) return array();

    preg_match_all('/.+/', $input, $matches);
    return $matches[0];

  } 


//----------------------------------------


  protected function _fussionReactor( $input = null )
  {
    return implode("\r\n\r\n", $input);

  }


//----------------------------------------


} //end class
