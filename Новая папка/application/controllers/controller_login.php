<?php

class Controller_Login extends Controller
{
    public function index()
    {
        $this->view->generate('login_view', 'Вход');
    }

    public function login()
    {
        $login = new Mlogin();
        $login->login();
    }
}

/* End of file login.php */
/*  */