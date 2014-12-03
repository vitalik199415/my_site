<?php

class Products extends CI_Controller
{
    public function view()
    {
        $data['title'] = 'хуйня';

        $this->load->library('template');
        $this->template->add('template/header', $data);
        $this->template->add('template/slider');
        $this->template->add('template/footer');

        $this->template->render();
    }
}