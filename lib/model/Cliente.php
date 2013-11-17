<?php
/**
 * Skeleton subclass for representing a row from the 'cliente' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class Cliente extends BaseCliente
{
	private $valido = false;
	private $existe = false;
	
	public function validar($datos){
		
		$nombreCorrecto = true;
		$nombre = "";
		$errorNombre = false;
		$errorTelefono = false;
		
		if(strpos($datos['nombre'], ' ') == false){
			
			if(ctype_alpha($datos['nombre']))
				$nombre = ucfirst($datos['nombre']);
			else
				$nombreCorrecto = false;
		}
		else{
			$palabras = explode(' ', $datos['nombre']);
			
			foreach($palabras as $palabra){
				if(ctype_alpha($palabra))
					$nombre = empty($nombre) ? ucfirst($palabra) : $nombre. " ". ucfirst($palabra);
				else
					$nombreCorrecto = false;
			}
		}
		
		if(!$nombreCorrecto){
			$errorNombre = true;
		}
		if(!ctype_digit($datos['telefono'])){
			$errorTelefono = true;
		}
		
		if($errorNombre == false && $errorTelefono == false){
			$nombre = $nombre;
			$telefono = $datos['telefono'];
			
			$this->setNombre($nombre)
				->setTelefono($telefono);
			
			$this->valido = true;
		}
	}
	
	public function esValido(){
		
		return $this->valido;
	}
	
	public function existe(){
		
		$clientes = ClienteQuery::create()
				->filterByNombre($this->getNombre())
				->filterByTelefono($this->getTelefono())
				->find();
		
		foreach($clientes as $cliente){
			if($cliente->getNombre() == $this->getNombre() && $cliente->getTelefono() == $this->getTelefono())
				return true;
		}
		
		return false;
	}
}
