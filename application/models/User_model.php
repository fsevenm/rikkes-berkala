<?php

class user_model extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    public function get_list(){
        $result = $this->db->query('SELECT users.id AS id, full_name, email, username, roles.name AS role FROM users INNER JOIN roles ON users.role_id=roles.id WHERE NOT roles.id = -1');
        return $result->result();
    }

    public function add($data){

        $this->db->insert($this->table, $data);

    }

    public function get_single($checker){

        $result = $this->db->get_where($this->table, $checker);

        return $result->row();

    }

    public function get_single_field($field, $checker){

        $this->db->select($field);
        $result = $this->db->get_where($this->table, $checker)->row();

        return $result->$field;

    }

    public function update($data, $checker)
    {

        $this->db->update($this->table, $data, $checker);

    }

    public function delete($checker)
    {

        $this->db->delete($this->table, $checker);

    }
}