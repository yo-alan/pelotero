<?php

/**
 * Cliente form.
 *
 * @package    pelotero
 * @subpackage form
 * @author     Your name here
 */
class ClienteForm extends BaseClienteForm
{
  public function configure()
  {
	//$this->getWidget('nombre')->setAtributte('class', 'form-control');
  }
  
  public function upper(){
	
	return $this;
  }
  
}
