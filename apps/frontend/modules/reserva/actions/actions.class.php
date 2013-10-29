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
		
		$horasAceptadas = array('9:00', '13:00', '15:00', '17:00', '19:00', '21:00');
		$fecha = explode('-', $request->getParameter('fecha'));
		$palabras = explode(' ', $request->getParameter('nombre'));
		
		$nombreCorrecto = true;
		
		$nombre = "";
		
		foreach($palabras as $palabra){
			if(ctype_alpha($palabra))
				$nombre = empty($nombre) ? ucfirst($palabra) : $nombre. " ". ucfirst($palabra);
			else
				$nombreCorrecto = false;
		}
		
		$this->errorNombre = false;
		$this->errorTelefono = false;
		$this->errorSenia = false;
		$this->errorFecha = false;
		$this->errorHora = false;
		
		if(!$nombreCorrecto){
			$this->errorNombre = true;
		}
		if(!ctype_digit($request->getParameter('telefono'))){
			$this->errorTelefono = true;
		}
		if(!ctype_digit($request->getParameter('senia'))){
			$this->errorSenia = true;
		}
		if(!checkdate((int)$fecha[1], (int)$fecha[2], (int)$fecha[0])){
			$this->errorFecha = true;
		}
		if(!in_array($request->getParameter('hora'), $horasAceptadas)){
			$this->errorHora = true;
		}
		
		if($this->errorNombre == false && $this->errorTelefono == false && $this->errorSenia == false && $this->errorFecha == false && $this->errorHora == false){
			$nombre = $nombre;
			$telefono = $request->getParameter('telefono');
			$senia = $request->getParameter('senia');
			$fecha = $request->getParameter('fecha');
			$hora = $request->getParameter('hora');
			
			$cliente = new Cliente();
			
			$cliente->setNombre($nombre)
					->setTelefono($telefono)
					->save();
			
			$reserva = new Reserva();
			$reserva->setCliente($cliente)
					->setSenia($senia)
					->setFecha($fecha)
					->setHora($hora)
					->save();
		}
	}
	
	$respuesta = $this->getResponse();
	$respuesta->setTitle("Agregar Reserva | Pelotero S.A.");
  }
  
  public function executeEliminar(sfWebRequest $request)
  {
	if($request->getMethod() == 'POST'){
		
		$request-getParameter('id');
		
		
	}
	
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Eliminar Reserva | Pelotero S.A.");
  }
  
  public function executeEditar(sfWebRequest $request)
  {
	$respuesta = $this->getResponse();
	
	$respuesta->setTitle("Editar Reserva | Pelotero S.A.");
  }
  
  public function executeExito(sfWebRequest $request)
  {
	
  }
}
