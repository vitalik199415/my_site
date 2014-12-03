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

        $this->load->model('mcategory');

        $data['category'] = $this->mcategory->get_categories();

        $this->load->library('template');
        $this->template->add('template/header', $data);
        $this->template->add('template/slider');
        $this->template->add('template/breadcrumb');
        $this->template->add('template/navigate', $data['category']);
        $this->template->add('template/footer');

        $this->template->render();
    }
}

/* End of file home.php */
/* Directory application/controllers/home.php */