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
		
		$horasAceptadasSemana = array('15:00', '19:00');
		$horasAceptadasFinde = array('9:00', '13:00', '17:00', '21:00');
		$fecha = explode('-', $datos['fecha']);
		$hora_actual = localtime(time(), true);
		$dia_semana = $hora_actual["tm_wday"];
		
		$todoCorrecto = true;
		
		if(!ctype_digit($datos['senia'])){
			$todoCorrecto = false;
		}
		if($todoCorrecto && !(ctype_digit($fecha[0]) && ctype_digit($fecha[1]) && ctype_digit($fecha[2]) && checkdate((int)$fecha[1], (int)$fecha[2], (int)$fecha[0]))){
			$todoCorrecto = false;
		}
		if($todoCorrecto){
			
			if((!in_array($datos['hora'], $horasAceptadasSemana)) && $dia_semana <= 4){
				$todoCorrecto = false;
			}
			elseif((!in_array($datos['hora'], $horasAceptadasFinde)) && $dia_semana > 4){
				$todoCorrecto = false;
			}
		}
		
		if($todoCorrecto){
			
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
