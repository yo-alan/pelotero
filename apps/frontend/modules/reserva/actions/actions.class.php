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
	if($request->getMethod() == "POST"){
		$filtrosAceptados = array('hoy', 'semana', 'mes');
		
		if(in_array($request->getParameter("filtro"), $filtrosAceptados))
			$filtro = $request->getParameter("filtro");
		else
			$filtro = "hoy";//Valor por defecto.
		
		//http://stackoverflow.com/questions/17566863/propel-custom-sql-for-view-tables
		$conexion = Propel::getConnection();
		$sql = "";
		try{
			if("hoy" == $filtro){
				$sql = "SELECT * FROM reservasDelDia";
			}
			else if("semana" == $filtro){
				$sql = "SELECT * FROM reservasDeLaSemana";
			}
			else if("mes" == $filtro){
				$sql = "SELECT * FROM reservasDelMes";
			}
			
			$stmt = $conexion->prepare($sql);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$this->reservas = $stmt->fetchAll();
			
		} catch(PDOException $e){
			throw new Exception("Hubo un problema obtener las reservas del dia: ". $e->getMessage());
		}
	}
  }
  
  public function executeAgregar(sfWebRequest $request)
  {
	if($this->getUser()->isAuthenticated()){
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
						$this->getUser()->setFlash('clienteError', "Cliente: ". $e->getMessage());
					}
				}
				
				//Reserva nueva a ser insertada.
				$reserva = new Reserva();
				$reserva->setCliente($cliente)
						->validar($request->getParameter('reserva'));
				
				if($reserva->esValido()){
					try{
						$reserva->save();
					} catch(PropelException $e){
						$todoCorrecto = false;
						$this->getUser()->setFlash('reservaError', "Reserva: ". $e->getMessage());
					}
				}
				if($todoCorrecto)
					$this->getUser()->setFlash('operacionExitosa', '¡La operación se realizó exitosamente!');
			}
			else
				$this->getUser()->setFlash('error', "Los datos ingresados no son correctos...");
		}
		
		$respuesta = $this->getResponse();
		$respuesta->setTitle("Agregar Reserva | Pelotero S.A.");
	}
	else
		$this->redirect('reserva/entrar');
  }
  
  public function executeEliminar(sfWebRequest $request)
  {
	if($this->getUser()->isAuthenticated()){
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
					
					$reservaParaEliminar = ReservaQuery::create()
						->findPK($id);
					
					try{
						$reservaParaEliminar->delete();
						$this->getUser()->setFlash('operacionExitosa', '¡La operación se realizó exitosamente!');
					} catch(PropelException $e){
						$this->getUser()->setFlash('reservaError', 'Reserva: '. $e.getMessage());
					}
					
					$this->redirect('reserva/eliminar');
				}
			}
		}
		
		$respuesta = $this->getResponse();
		
		$respuesta->setTitle("Eliminar Reserva | Pelotero S.A.");
	}
	else
		$this->redirect('reserva/entrar');
  }
  
  public function executeEditar(sfWebRequest $request)
  {
	if($this->getUser()->isAuthenticated()){
		if($request->getMethod() == 'POST'){
			
			if($request->getParameter('hora') != null){
				$horasAceptadas = array('9:00', '13:00', '15:00', '17:00', '19:00', '21:00');
				$fecha = explode('-', $request->getParameter('fecha'));
				$opciones = array('si', 'no');
				
				$todoCorrecto = true;
				
				if(!in_array($request->getParameter('vigente'), $opciones)){
					$todoCorrecto = false;
				}
				if($todoCorrecto && !(ctype_digit($fecha[0]) && ctype_digit($fecha[1]) && ctype_digit($fecha[2]) && checkdate((int)$fecha[1], (int)$fecha[2], (int)$fecha[0]))){
					$todoCorrecto = false;
				}
				if($todoCorrecto && !in_array($request->getParameter('hora'), $horasAceptadas)){
					$todoCorrecto = false;
				}
				
				if($todoCorrecto && !ctype_digit($request->getParameter('id'))){
					$todoCorrecto = false;
				}
				
				if($todoCorrecto){
					$vigente = $request->getParameter('vigente') == 'si' ? true : false;
					$fecha = $request->getParameter('fecha');
					$hora = $request->getParameter('hora');
					$id = $request->getParameter('id');
					
					$this->reservaParaEditar = ReservaQuery::create()
						->findPK($id);
					
					$this->reservaParaEditar->setVigente($vigente)
						->setFecha($fecha)
						->setHora($hora);
					
					$this->reservaParaEditar->save();
					
					$this->getUser()->setFlash('operacionExitosa', '¡La operación se realizó exitosamente!');
					
					$this->redirect('reserva/editar');
				}
				else
					$this->getUser()->setFlash('error', 'Hubo un error al editar la reserva...');
				
				
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
	else
		$this->redirect('reserva/entrar');
  }
  
  public function executeEntrar(sfWebRequest $request){
	
	if($this->getuser()->isAuthenticated()){
		$this->redirect('reserva/index');
	}
	
	
  }
  
  public function executeIniciarSesion(sfWebRequest $request){
	
	if($this->getUser()->iniciarSesion($request->getParameter('usuario')))
		$this->redirect('reserva/index');
	else
		$this->redirect('reserva/entrar');
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
}
