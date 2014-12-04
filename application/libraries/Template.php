<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Template {

    private $page_arr = array();
    private $data_head = array();
    private $data_navigate = array();

    function __construct()
    {
    }

    public function add($view, $data=array())
    {
        $this->page_arr[] = array($view, $data);
    }

    public function add_title($text)
    {
        $this->data_head['title'] = $text;
    }

    public function add_meta($desc, $keywords)
    {
        $this->data_head['meta_desc'] = $desc;
        $this->data_head['meta_keywords'] = $keywords;
    }

    public function add_navigate($text, $link = '')
    {

    }

    public function render()
    {

        $CI = &get_instance();
        $HTML = '';

        $HTML .= $CI->load->view('template/header', $this->data_head, TRUE);

        foreach($this->page_arr as $temp)
        {
            $HTML .= $CI->load->view($temp[0], $temp[1], TRUE);
        }

        //$CI->output->enable_profiler(TRUE);
        $CI->output->set_output($HTML);
    }
}