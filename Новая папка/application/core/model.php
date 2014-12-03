<?php

class Model
{
	public function __constructor()
	{
		if(file_exists('config.php'))
		{
			include 'config.php';

			mysql_connect(HOST, USER, PASS);
			mysql_select_db(DB);
		}
		else
		{
			echo "File 'config.php' if not exist!";
		}
	}

    public function get_data()
    {

    }
}

/* End of file model.php */
/*  */