<?php

class Mcategory extends CI_Model {

    const CAT = 'categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_categories()
    {
        $data = $this->db->select('`category_id`, `name`')
                         ->from('`'.self::CAT.'`')
                         ->get()->result_array();

        return $data;
    }

}
