<?php

class Home extends VD_Controller
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
    }
}

/* End of file home.php */
/* Directory application/controllers/home.php */