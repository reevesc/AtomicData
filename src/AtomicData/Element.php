<?php

namespace ReevesC\AtomicData;

class Element {

  public $atoms;

  public function __construct( $atoms = null )
  {
    if( !empty($atoms) )
    {
      foreach( $atoms as $atom )
      {
        $this->addAtom($atom);
      }
    }
  }


//----------------------------------------


  public function addAtom($atom)
  {
    if( is_array($atom) )
    {
      $this->atoms[] = $atom;
    }
    else
    {
      $this->atoms[]['content'] = $atom;
    }
  }


//----------------------------------------


} //end class