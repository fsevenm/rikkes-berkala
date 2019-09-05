<?php

class authentication_model extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
    }

    public function validate_login($data){
        $result = $this->db->get_where('users', $data);
        return $result->row();
    }
}