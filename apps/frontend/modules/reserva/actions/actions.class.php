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
	$hoy = $this->diaDeHoy();
	
	$this->primerDia = array();
	$this->segundoDia = array();
	$this->tercerDia = array();
	$this->cuartoDia = array();
	$this->quintoDia = array();
	$this->sextoDia = array();
	$this->septimoDia = array();
	
	//Determina que dia es para imprimirlo en el template.
	$this->primerDia['fecha'] = $hoy;
	$this->segundoDia['fecha'] = date('Y-m-d', strtotime($hoy. ' +1 day'));
	$this->tercerDia['fecha'] = date('Y-m-d', strtotime($hoy. ' +2 day'));
	$this->cuartoDia['fecha'] = date('Y-m-d', strtotime($hoy. ' +3 day'));
	$this->quintoDia['fecha'] = date('Y-m-d', strtotime($hoy. ' +4 day'));
	$this->sextoDia['fecha'] = date('Y-m-d', strtotime($hoy. ' +5 day'));
	$this->septimoDia['fecha'] = date('Y-m-d', strtotime($hoy. ' +6 day'));
	
	$this->primerDia['nombre'] = $this->queDiaEs($this->primerDia['fecha']);
	$this->segundoDia['nombre'] = $this->queDiaEs($this->segundoDia['fecha']);
	$this->tercerDia['nombre'] = $this->queDiaEs($this->tercerDia['fecha']);
	$this->cuartoDia['nombre'] = $this->queDiaEs($this->cuartoDia['fecha']);
	$this->quintoDia['nombre'] = $this->queDiaEs($this->quintoDia['fecha']);
	$this->sextoDia['nombre'] = $this->queDiaEs($this->sextoDia['fecha']);
	$this->septimoDia['nombre'] = $this->queDiaEs($this->septimoDia['fecha']);
	
	$this->reservasPrimerDia = ReservaQuery::create()->reservasDelDia(0);
	$this->reservasSegundoDia = ReservaQuery::create()->reservasDelDia(1);
	$this->reservasTercerDia = ReservaQuery::create()->reservasDelDia(2);
	$this->reservasCuartoDia = ReservaQuery::create()->reservasDelDia(3);
	$this->reservasQuintoDia = ReservaQuery::create()->reservasDelDia(4);
	$this->reservasSextoDia = ReservaQuery::create()->reservasDelDia(5);
	$this->reservasSeptimoDia = ReservaQuery::create()->reservasDelDia(6);
  }
  
  public function executeAgregar(sfWebRequest $request)
  {
	if($request->getMethod() == 'POST'){
		
		$todoCorrecto = true;
		
		//Cliente nuevo a ser insertado.
		$cliente = new Cliente();
		
		$cliente->validar($request->getParameter('cliente'));
		
		if($cliente->esValido()){
			if($cliente->existe()){
				$cliente = ClienteQuery::create()
					->filterByNombre($cliente->getNombre())
					->filterByTelefono($cliente->getTelefono())
					->findOne();
			}
			else{
				try{
					$cliente->save();
				} catch(PropelException $e){
					$todoCorrecto = false;
					$this->getUser()->setFlash('error', 'Cliente: Hubo un problema al guardar los datos del cliente.');
				}
			}
			
			//Reserva nueva a ser insertada.
			$reserva = new Reserva();
			$reserva->setCliente($cliente);
			
			try{
				$reserva->validar($request->getParameter('reserva'));
			} catch(sfValidatorError $e){
				$todoCorrecto = false;
				$this->getUser()->setFlash('error', "Reserva: Hubo un error al validar los datos.");
			}
			
			if($reserva->esValido()){
				try{
					$reserva->save();
				} catch(PropelException $e){
					$todoCorrecto = false;
					$this->getUser()->setFlash('error', "Reserva: Hubo un error al guardar la reserva.");
				}
			}
			
			if($todoCorrecto)
				$this->getUser()->setFlash('exito', '¡La operación se realizó exitosamente!');
		}
		else
			$this->getUser()->setFlash('error', 'Los datos ingresados no son correctos...');
		
		$this->redirect('reserva/agregar');
	}else{
		
		$this->fecha = $request->getParameter('fecha', $this->diaDeHoy());
		$this->hora = $request->getParameter('hora', '9:00');
		
		
	}
	
	$respuesta = $this->getResponse();
	$respuesta->setTitle("Agregar Reserva | Pelotero S.A.");
  }
  
  public function executeEliminar(sfWebRequest $request)
  {
	if($request->getMethod() == 'POST'){
		
		if($request->getParameter('fecha') != null){
			$fecha = $request->getParameter('fecha');
			
			if(!empty($fecha)){
				
				$fecha = explode("-", $request->getParameter('fecha'));
				
				if(checkdate($fecha[1], $fecha[2], $fecha[0])){
					
					$fecha = $fecha[0]. "-". $fecha[1]. "-". $fecha[2];
					
					$this->reservas = ReservaQuery::create()
						->filterByFecha($fecha)
						->find();
				}
			}
		}
		else if($request->getParameter('reserva') != null){
			
			if(ctype_digit($request->getParameter('reserva'))){
				$id = $request->getParameter('reserva');
				
				$reservaParaEliminar = ReservaQuery::create()->findPK($id);
				
				try{
					$reservaParaEliminar->delete();
					$this->getUser()->setFlash('exito', '¡La operación se realizó exitosamente!');
				} catch(PropelException $e){
					$this->getUser()->setFlash('error', 'Ocurrió un error al eliminar la reserva...');
				}
				
				$this->redirect('reserva/eliminar');
			}
		}
	}
	
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Eliminar Reserva | Pelotero S.A.");
  }
  
  public function executeEditar(sfWebRequest $request)
  {
	if($request->getMethod() == 'POST'){
		
		if(ctype_digit($request->getParameter('id'))){
			$id = $request->getParameter('id');
			
			$reserva = ReservaQuery::create()->findPK($id);
			
			$reserva->setFecha($request->getParameter('fecha'))
					->setHora($request->getParameter('hora'))
					->setVigente($request->getParameter('vigente'));
			
			try{
				$reserva->save();
				$this->getUser()->setFlash('exito', '¡La reserva se editó exitosamente!');
			} catch (PropelException $e){
				$this->getUser()->setFlash('error', 'Ocurrió un error al editar la reserva...');
			}
			
			$this->redirect('reserva/editar');
		}
		else if($request->getParameter('fecha') != null){
			$fecha = $request->getParameter('fecha');
			
			if(!empty($fecha)){
				$fecha = explode("-", $request->getParameter('fecha'));
				
				if(checkdate($fecha[1], $fecha[2], $fecha[0])){
					$fecha = $fecha[0]. "-". $fecha[1]. "-". $fecha[2];
					
					$this->reservas = ReservaQuery::create()
						->filterByFecha($fecha)
						->find();
				}
			}
		}
		else if($request->getParameter('reserva') != null){
			if(ctype_digit($request->getParameter('reserva'))){
				$id = $request->getParameter('reserva');
				
				$this->reservaParaEditar = ReservaQuery::create()
					->findPK($id);
			}
		}
	}
	
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Editar Reserva | Pelotero S.A.");
  }
  
  public function executeEntrar(sfWebRequest $request){
	
	if($request->getMethod() == 'POST'){
		if($this->getUser()->iniciarSesion($request->getParameter('usuario')))
			$this->redirect('reserva/index');
		else
			$this->redirect('reserva/entrar');
	}
	else{
		if($this->getuser()->isAuthenticated()){
			$this->redirect('reserva/index');
		}
	}
	
	$this->getResponse()->setTitle("Entrar | Pelotero S.A.");
  }
  
  public function executeCerrarSesion(sfWebRequest $request){
	
	$this->getUser()->cerrarSesion();
	
	$this->redirect('reserva/index');
  }
  
  public function executeGetReservas(sfWebRequest $request){
	
	$reservas = ReservaQuery::create()
							->find();
	
	$this->getResponse()->setContentType('application/json');
	
	$reservas = $reservas->toArray();
	
	$this->renderText(json_encode($reservas));
	
	return sfView::NONE;
  }
  
  private function queDiaEs($fecha){
	
	$semana = array('domingo', 'lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado');
	
	$dia = localtime(strtotime($fecha), true);
	
	return $semana[$dia['tm_wday']];
  }
  
  private function diaDeHoy(){
	
	$local = localtime(time(), true);
	
	return ($local['tm_year']+1900). "-". ($local['tm_mon']+1). "-". $local['tm_mday'];
  }
  
}
