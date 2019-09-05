<?php

class jabatan_model extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'jabatans';
    }

    public function get_list(){
        $result = $this->db->get($this->table);
        return $result->result();
    }

    public function insert($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();

    }

    public function get($checker) {

        $result = $this->db->get_where($this->table, $checker);

        return $result->row();
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