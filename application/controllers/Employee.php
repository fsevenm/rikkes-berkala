<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    public function index()
    {
        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');
        } 

        $data['employees'] = $this->employee_model->get_list();

        $this->load->view('employee', $data);
    }

    public function add()
    {
        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');

        } 

        $data['jabatans'] = $this->jabatan_model->get_list();

        $this->load->view('employee_add', $data);
    }

    public function edit($id = NULL)
    {
        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');

        } 

        if($id)
        {

            $data['employee'] = $this->employee_model->get(array('id' => $id));

            $data['jabatans'] = $this->jabatan_model->get_list();

            $this->load->view('employee_edit', $data);

        } else {

            redirect(base_url(). 'employee');

        }
    }

    // new rikkes

    public function single()
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){
            $checker = array(
                'employees.id' => $this->input->post('employee-id')
            );

            $res = $this->employee_model->get_detail($checker);
            
            if ($res)
            {
                echo json_encode($res);
            }   
            else
            {
                echo 'error';
            }
        }
    }

    public function search()
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){
            $checker = array(
                'nrp' => $this->input->post('src-key'),
                'nama' => $this->input->post('src-key')
            );

            if ($this->input->post('src-key'))
            {
                $res = $this->employee_model->get_like($checker);
    
                if ($res)
                {
                    echo json_encode($res);
                }
                else
                {
                    echo 'nodata';
                }
            } else{
                echo 'nodata';
            }

        }
    }

    public function editketerangan()
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){
        
            $checker = array(
                'id' => $this->input->post('id')
            );

            $data = array(
                'keterangan' => $this->input->post('keterangan')
            );
            
            $this->employee_model->update($data, $checker);

            echo '200';

        }
    }

    public function delete($id = NULL)
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){

            if ($id != NULL)
            {
                $checker = array(
                    'id' => $id
                );
    
                $this->employee_model->delete($checker);
    
                redirect(base_url('employee'));
            }

        }
    }

    // form action

    public function is_available($nrp, $id)
    {
        $checker = array(
            'nrp' => $nrp,
            'id !=' => $id
        );

        $data = $this->employee_model->get($checker);

        if ($data)
        {
            $this->form_validation->set_message('is_available', '{field} sudah digunakan');                            
            return false;
        }
        else{
            return true;
        }
    }

    public function p_edit($id = NULL)
    {

        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');
        } 

        if($id)
        {
            // validating input form
            $rules = array(
                array(
                    'field' => 'nrp',
                    'label' => 'NRP',
                    'rules' => 'required|max_length[25]|callback_is_available['.$id.']',
                    'errors' => array(
                        'required' => '{field} tidak boleh kosong',
                        'max_length' => '{field} maksimal 25 karakter',
                        'is_unique' => '{field} sudah digunakan'
                    )
                ),
                array(
                    'field' => 'nama',
                    'label' => 'Nama',
                    'rules' => 'required|max_length[45]',
                    'errors' => array(
                        'required' => '{field} tidak boleh kosong',
                        'max_length' => '{field} maksimal 64 karakter'
                    )
                ),
                array(
                    'field' => 'jabatan',
                    'label' => 'Jabatan',
                    'rules' => 'required',
                    'errors' => array(
                        'required' => '{field} tidak boleh kosong'
                    )
                )
            );

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == false){

                $notif = array(
                    'type' => 'warning',
                    'title' => 'Perhatian',
                    'msg' => validation_errors()
                );

                $this->session->set_flashdata($notif);

                $data['employee'] = $this->employee_model->get(array('id' => $id));

                $data['jabatans'] = $this->jabatan_model->get_list();

                $this->load->view('employee_edit', $data);
            }
            else {

                $data = array(
                    'nrp' => $this->input->post('nrp'),
                    'nama' => $this->input->post('nama'),
                    'jabatan_id' => $this->input->post('jabatan'),
                    'keterangan' => $this->input->post('keterangan')
                );

                $checker = array(
                    'id' => $id
                );

                $this->employee_model->update($data, $checker);

                $notif = array(
                    'type' => 'success',
                    'title' => 'Berhasil',
                    'msg' => 'Data berhasil diubah'
                );

                $this->session->set_flashdata($notif);

                redirect(base_url('employee/edit/' . $id));

            }

        } else {

            redirect(base_url('employee'));

        }

    }


    public function p_add(){

        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');
        } 

        // validating input form
        $rules = array(
            array(
                'field' => 'nrp',
                'label' => 'NRP',
                'rules' => 'required|max_length[25]|is_unique[employees.nrp]',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} maksimal 25 karakter',
                    'is_unique' => '{field} sudah digunakan'
                )
            ),
            array(
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required|max_length[45]',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} maksimal 64 karakter'
                )
            ),
            array(
                'field' => 'jabatan',
                'label' => 'Jabatan',
                'rules' => 'required',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong'
                )
            )
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false){

            $notif = array(
                'type' => 'warning',
                'title' => 'Perhatian',
                'msg' => validation_errors()
            );

            $this->session->set_flashdata($notif);

            $data['jabatans'] = $this->jabatan_model->get_list();

            $this->load->view('employee_add', $data);
        }
        else {

            $data = array(
                'nrp' => $this->input->post('nrp'),
                'nama' => $this->input->post('nama'),
                'jabatan_id' => $this->input->post('jabatan'),
                'keterangan' => $this->input->post('keterangan')
            );

            $this->employee_model->add($data);

            $notif = array(
                'type' => 'success',
                'title' => 'Berhasil',
                'msg' => 'Pegawai telah ditambahkan'
            );

            $this->session->set_flashdata($notif);

            redirect(base_url('employee/add'));

        }

    }
}


?>

