<?php

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "dsfsdf";
    }
    
    public function check()
    {
        if($this->input->post())
        {
            $user_data = $this->input->post();
            
            $this->load->model("mlogin");
            $user = $this->mlogin->check($user_data['login'], $user_data['password']);
            if(count($user) > 0)
            {
                $this->session->set_userdata($user);
                redirect('/');
            }
        }
    }

}

/* End of file login.php */
/* Directory application/controllers/login.php */