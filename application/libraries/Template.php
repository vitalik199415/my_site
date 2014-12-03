<?php if (!defined('BASEPATH')) exit('Нет доступа к скрипту');

class Template {

    public $page_arr = array();

    function __construct()
    {
    }

    public function add($view, $data = array())
    {
        $this->page_arr[] = array($view, $data);
    }

    public function render()
    {
        $CI = &get_instance();
        $HTML = '';

        foreach($this->page_arr as $temp)
        {
            $HTML .= $CI->load->view($temp[0], $temp[1], TRUE);
        }

        $CI->output->set_output($HTML);
    }

    public function add_navigate($text, $link = '')
    {

    }
}