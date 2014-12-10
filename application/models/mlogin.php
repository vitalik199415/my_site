<?php

class Mlogin extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function check($login, $password)
    {
        $user = $this->db->select('*')
                         ->from('`customers`')
                         ->where('`login`', $login)
                         ->get()->row_array();
        
        if(count($user) > 0)
        {
            $pass = md5($password);
            
            if($user['password'] == $pass)
            {
                $data = array(
                    'user' => array(
                        'id'    => $user['customers_id'],
                        'login' => $user['login'],
                        'name'  => $user['name'].' '.$user['secondname']   
                    )
                );
            }
        }
        
        return $data;
    }

}
