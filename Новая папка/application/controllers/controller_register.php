<?php

class Controller_Register extends Controller 
{
	public function index()
	{
		$this->view->generate('login_view', 'Регистрация');
	}

	public function save()
	{
		$register = new Mregister;
		$register->save();
	}
}


/* End of file controller_register.php */
/*  */