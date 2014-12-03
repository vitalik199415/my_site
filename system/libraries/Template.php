<?php 

class CI_Template
{
	public $mess_class;
	public $text;
	public $icon;
    private $template = array();

    /**
     * @param $path
     * @param array $data
     */
    public function add($path, $data = array())
	{
        $this->template[] = array($path, $data);
	}

    /**
     *
     */
    public function render()
    {
        $CI = &get_instance();
        $HTML = '';

        foreach($this->template as $temp)
        {
            $HTML .= $CI->load->view($temp[0], $temp[1], TRUE);
        }

        $CI->output->_display($HTML);
    }
}

/* End of file template.php */
/*  */