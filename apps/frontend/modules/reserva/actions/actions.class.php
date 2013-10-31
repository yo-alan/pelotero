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
  
  public function executeLogIn(sfWebRequest $request)
  {
	
	
	
	$this->redirect($request->getPathInfo());
  }
  
  public function executeHome(sfWebRequest $request)
  {
	if($request->getMethod() == "POST"){
		
		$filtrosAceptados = array('hoy', 'semana', 'mes');
		
		if(in_array($request->getParameter("filtro"), $filtrosAceptados))
			$filtro = $request->getParameter("filtro");
		
		//http://stackoverflow.com/questions/17566863/propel-custom-sql-for-view-tables
		$conexion = Propel::getConnection();
		
		if("hoy" == $filtro){
			try{
				
				$sql = "SELECT * FROM reservasDelDia";
				
				$stmt = $conexion->prepare($sql);
				
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				
				$stmt->execute();
				
				$this->reservas = $stmt->fetchAll();
				
			} catch(PDOException $e){
				throw new Exception("Hubo un problema obtener las reservas del dia: ". $e->getMessage());
			}
		}
		else if("semana" == $filtro){
			try{
				
				$sql = "SELECT * FROM reservasDeLaSemana";
				
				$stmt = $conexion->prepare($sql);
				
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				
				$stmt->execute();
				
				$this->reservas = $stmt->fetchAll();
				
			} catch(PDOException $e){
				throw new Exception("Hubo un problema obtener las reservas de la semana: ". $e->getMessage());
			}
		}
		else if("mes" == $filtro){
			try{
				
				$sql = "SELECT * FROM reservasDelMes";
				
				$stmt = $conexion->prepare($sql);
				
				$stmt->setFetchMode(PDO::FETCH_ASSOC);
				
				$stmt->execute();
				
				$this->reservas = $stmt->fetchAll();
				
			} catch(PDOException $e){
				throw new Exception("Hubo un problema obtener las reservas del mes: ". $e->getMessage());
			}
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
			try{
				$cliente->save();
			} catch(PropelException $e){
				$todoCorrecto = false;
				$this->getUser()->setFlash('clienteError', "Cliente: ". $e->getMessage());
			}
		}
		
		if($cliente->existe()){
			
			$cliente = ClienteQuery::create()
				->filterByNombre($cliente->getNombre())
				->filterByTelefono($cliente->getTelefono())
				->findOne();
			
			echo $cliente->getNombre();
			
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
			
			$this->exito = false;
			$this->error = true;
			
			if(ctype_digit($request->getParameter('reserva'))){
				
				$id = $request->getParameter('reserva');
				
				$reservaParaEliminar = ReservaQuery::create()
					->findPK($id);
				
				$reservaParaEliminar->delete();
				
				$this->exito = true;
				$this->error = false;
				
			}
		}
		
	}
	
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Eliminar Reserva | Pelotero S.A.");
	
  }
  
  public function executeEditar(sfWebRequest $request)
  {
	if($request->getMethod() == 'POST'){
		
		if(!$request->getParameter('fecha') == null){
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
		else if(!$request->getParameter('reserva') == null){
			
			$this->exito = false;
			$this->error = true;
			
			if(ctype_digit($request->getParameter('reserva'))){
				
				$id = $request->getParameter('reserva');
				
				$reservaParaEditar = ReservaQuery::create()
					->findPK($id);
				
				
				
				
				$this->exito = true;
				$this->error = false;
				
			}
		}
	}
	
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Editar Reserva | Pelotero S.A.");
  }
  
  public function executeExito(sfWebRequest $request)
  {
	
  }
}
