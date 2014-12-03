<?php

class Mlogin extends Model
{
    public function login()
    {
        if(isset($_POST['login']) && isset($_POST['password']))
        {
            $login = $_POST['login'];
            $password = md5($_POST['password']);

            $query = 'SELECT `name`, `secondname`, `login`, `password` FROM `customers` WHERE `login`='.$login;
            $result = mysql_query($query);

            if(mysql_num_rows($result) > 0)
            {
            	$arr = mysql_fetch_array($result);


            	if($password == $arr['password'])
            	{
            		$_SESSION['user']['login'] = $login;
            		$_SESSION['user']['name'] = $arr['name'].' '.$arr['secondname'];
            		header('Location: /');
            	}
			}
			else
			{
				
			}
        }
    }
}

/* End of file mlogin.php */
/*  */