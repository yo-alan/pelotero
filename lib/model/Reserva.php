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
		
		$v = new sfValidatorDate(
			array('min' => time())
		);
		
		$fecha = $v->clean($datos['fecha']);
		
		
		//~ $v = new sfValidatorPropelUnique(
			//~ array('max' => time())
		//~ );
		
		//$fecha = $v->clean($datos['fecha']);
		
		
		
		$horasAceptadasSemana = array('15:00', '19:00');
		$horasAceptadasFinde = array('9:00', '13:00', '17:00', '21:00');
		$hora_actual = localtime(time(), true);
		$dia_semana = $hora_actual["tm_wday"];
		
		$todoCorrecto = true;
		
		if(!ctype_digit($datos['senia'])){
			echo "mal la seña";
			$todoCorrecto = false;
		}
		if($todoCorrecto){
			if($dia_semana != 0 && $dia_semana != 6){
				if((!in_array($datos['hora'], $horasAceptadasSemana))){
					$todoCorrecto = false;
				}
			}
			else{
				if((!in_array($datos['hora'], $horasAceptadasFinde))){
					$todoCorrecto = false;
				}
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
