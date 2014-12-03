<?php

class View
{
	public $template;

	public function __constructor()
	{
		$this->template = new Template();
	}

    public function generate($content_view, $title = 'Rybachok', $template_view = 'template_view', $data = array())
    {
    	$class = $this->template->mess_class;
    	$text  = $this->template->text;
    	$icon  = $this->template->icon;
        include 'application/views/'.$template_view.'.php';
    }
}

/* End of file view.php */
/*  */