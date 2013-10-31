<?php



/**
 * Skeleton subclass for performing query and update operations on the 'cliente' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */
class ClienteQuery extends BaseClienteQuery
{
	private $valido = false;
	
	public function validar($datos){
		
		$palabras = explode(' ', $datos['nombre']);
		
		$nombreCorrecto = true;
		
		$nombre = "";
		
		foreach($palabras as $palabra){
			if(ctype_alpha($palabra))
				$nombre = empty($nombre) ? ucfirst($palabra) : $nombre. " ". ucfirst($palabra);
			else
				$nombreCorrecto = false;
		}
		
		$errorNombre = false;
		$errorTelefono = false;
		
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
			
			return $this;
		}
		
	}
	
	public function esValido(){
		
		return $this->valido;
	}
}
