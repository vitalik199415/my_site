<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
    
        $this->load->model('mcategory');

        $data['category'] = $this->mcategory->get_categories();

        $this->load->library('template');
        $this->template->add_title('Головна');
        $this->template->add_meta('Головна сторінка сайту Rybachok.', 'home, головна, rybachok, рибальський магазин');
        $this->template->add_navigate('Категорії', 'products/view/cat');
        $this->template->add_navigate('Вудилища');
        $this->template->enable_slider(FALSE);        
        $this->template->add('template/navigate', $data);
        $this->template->add('template/footer');
        
        $this->template->render();
    }
}

/* End of file home.php */
/* Directory application/controllers/home.php */