<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Главная';
        $this->load->view('template/header', $data);
        $this->load->view('template/footer');
        dff
        as

    }
}

/* End of file home.php */
/* Directory application/controllers/home.php */