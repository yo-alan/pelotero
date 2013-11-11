<?php

class myUser extends sfBasicSecurityUser
{
	public function iniciarSesion($usuario){
		
		if($usuario['nombre'] == "admin" && $usuario['contrasena'] == "udc")
			$this->setAuthenticated(true);
		else
			sfContext::getInstance()->getUser()->setFlash('error', 'El usuario o la contraseña no son válidos.');
	}
	
	public function cerrarSesion(){
		
		
		$this->setAuthenticated(false);
	}
	
	
}
