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
	$this->validatorSchema['nombre'] = new sfValidatorRegex(array('pattern' => '/^[a-zA-Z\ ]+$/'));
	$this->validatorSchema['telefono'] = new sfValidatorRegex(array('pattern' => '/^[0-9]+$/'));
	
	$this->getWidget('nombre')->setAttribute('class', 'form-control');
	$this->getWidget('telefono')->setAttribute('class', 'form-control');
  }
  
  public function upper(){
	
	return $this;
  }
  
}
