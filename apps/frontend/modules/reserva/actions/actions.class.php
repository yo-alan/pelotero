<?php

/**
 * abm_reserva actions.
 *
 * @package    pelotero
 * @subpackage abm_reserva
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reservaActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
	//$this->redirect('homeSuccess');
    $this->forward('default', 'module');
  }
  
  public function executeHome(sfWebRequest $request)
  {
	
  }
  
  public function executeAgregar(sfWebRequest $request)
  {
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Agregar Reserva | Pelotero S.A.");
	
	
	
  }
  
  public function executeEliminar(sfWebRequest $request)
  {
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Eliminar Reserva | Pelotero S.A.");
  }
  
  public function executeEditar(sfWebRequest $request)
  {
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Editar Reserva | Pelotero S.A.");
  }
}
