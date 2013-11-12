<?php

class myUser extends sfBasicSecurityUser
{
	public function iniciarSesion($usuario){
		
		if("" == sfConfig::get('app_usuario') && "" == sfConfig::get('app_clave')){
			$this->setFlash('error', 'La aplicación no esta configurada apropiadamente.');
		}	
		else{
			if($usuario['nombre'] == sfConfig::get('app_usuario') && $usuario['contrasena'] == sfConfig::get('app_clave'))
				$this->setAuthenticated(true);
			else
				$this->setFlash('error', 'El usuario o la contraseña no son válidos.');
		}
	}
	
	public function cerrarSesion(){
		$this->setAuthenticated(false);
	}
	
	
}
