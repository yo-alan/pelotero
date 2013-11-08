<?php

class myUser extends sfBasicSecurityUser
{
	public function iniciarSesion(){
		
		
		$this->setAuthenticated(true);
	}
	
	public function cerrarSesion(){
		
		
		$this->setAuthenticated(false);
	}
	
	
}
