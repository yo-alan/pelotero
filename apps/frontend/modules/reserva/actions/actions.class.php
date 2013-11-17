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
	if($request->getMethod() == 'GET'){
		
		$this->filtro = 'hoy';
		
		$conexion = Propel::getConnection();
		
		try{
			$sql = "SELECT * FROM reservasDelDia";
			
			$stmt = $conexion->prepare($sql);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$this->reservas = $stmt->fetchAll();
			
		} catch(PDOException $e){
			$this->getUser->setFlash("error", "Hubo un problema al obtener las reservas del dia: ". $e->getMessage());
		}
	}
	if($request->getMethod() == "POST"){
		$filtrosAceptados = array('hoy', 'semana', 'mes');
		
		if(in_array($request->getParameter("filtro"), $filtrosAceptados))
			$this->filtro = $request->getParameter("filtro");
		else
			$this->filtro = "hoy";//Valor por defecto.
		
		//http://stackoverflow.com/questions/17566863/propel-custom-sql-for-view-tables
		$conexion = Propel::getConnection();
		$sql = "";
		try{
			if("hoy" == $this->filtro){
				$sql = "SELECT * FROM reservasDelDia";
			}
			else if("semana" == $this->filtro){
				$sql = "SELECT * FROM reservasDeLaSemana";
			}
			else if("mes" == $this->filtro){
				$sql = "SELECT * FROM reservasDelMes";
			}
			
			$stmt = $conexion->prepare($sql);
			
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			
			$stmt->execute();
			
			$this->reservas = $stmt->fetchAll();
			
		} catch(PDOException $e){
			$this->getUser->setFlash("error", "Hubo un problema al obtener las reservas del dia: ". $e->getMessage());
		}
	}
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
}
