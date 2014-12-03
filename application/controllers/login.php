<?php

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->model('mlogin');
        $this->mlogin->login();
    }

}

/* End of file login.php */
/* Directory application/controllers/login.php */