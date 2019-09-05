<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function index()
	{
        $data['jabatans'] = $this->jabatan_model->get_list();
		$this->load->view('jabatan', $data);
    }
    
    public function add()
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){

            $data = array(
                'name' => $this->input->post('name')
            );

            echo $this->jabatan_model->insert($data);
            
        }
    }

    public function edit()
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){

            $data = array(
                'name' => $this->input->post('name')
            );

            $checker = array(
                'id' => $this->input->post('id')
            );

            $this->jabatan_model->update($data, $checker);

            echo '200';
            
        }
    }

    public function delete()
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){

            $checker = array(
                'id' => $this->input->post('id')
            );

            $this->jabatan_model->delete($checker);

            echo '200';
            
        }
    }
}
