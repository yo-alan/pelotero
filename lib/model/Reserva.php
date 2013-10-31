<?php



/**
 * Skeleton subclass for representing a row from the 'reserva' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Reserva extends BaseReserva
{
	private $valido = false;
	
	public function validar($datos){
		
		$horasAceptadas = array('9:00', '13:00', '15:00', '17:00', '19:00', '21:00');
		$fecha = explode('-', $datos['fecha']);
		
		$errorSenia = false;
		$errorFecha = false;
		$errorHora = false;
		
		if(!ctype_digit($datos['senia'])){
			$errorSenia = true;
		}
		if(!(ctype_digit($fecha[0]) && ctype_digit($fecha[1]) && ctype_digit($fecha[2]) && checkdate((int)$fecha[1], (int)$fecha[2], (int)$fecha[0]))){
			$errorFecha = true;
		}
		if(!in_array($datos['hora'], $horasAceptadas)){
			$errorHora = true;
		}
		
		if($errorSenia == false && $errorFecha == false && $errorHora == false){
			
			$senia = $datos['senia'];
			$fecha = $datos['fecha'];
			$hora = $datos['hora'];
			
			$this->setSenia($senia)
				->setFecha($fecha)
				->setHora($hora);
			
			$this->valido = true;
			
			return $this;
		}
		
	}
	
	public function esValido(){
		
		return $this->valido;
	}
}
