<?php

class employee_model extends CI_MODEL
{
    function __construct()
    {
        parent::__construct();
        $this->table = 'employees';
    }

    public function get_list(){
        $this->db->select('employees.id AS id, nrp, nama, name, keterangan');
        $this->db->from($this->table);
        $this->db->join('jabatans', 'employees.jabatan_id=jabatans.id');
        $res = $this->db->get();
        return $res->result();
    }

    public function add($data){
        $this->db->insert($this->table, $data);

    }

    public function get($checker) {

        $result = $this->db->get_where($this->table, $checker);

        return $result->row();
    }

    public function get_like($checker)
    {
        $this->db->select('nrp, nama, id');
        $this->db->or_like($checker);
        $res = $this->db->get($this->table);
        return $res->result();
    }

    public function get_detail($checker)
    {
        $this->db->select('nrp, nama, name, keterangan');
        $this->db->from($this->table);
        $this->db->join('jabatans', 'employees.jabatan_id=jabatans.id');
        $this->db->where($checker);
        $res = $this->db->get();
        return $res->result();
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