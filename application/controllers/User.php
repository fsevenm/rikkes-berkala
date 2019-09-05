<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index()
    {
        if (!$this->session->has_userdata('bidisuser') && !$this->session->has_userdata('bidislogged_in')){

            redirect(base_url() . 'login');
        } else {

            if ($this->session->userdata('bidisrole') != -1){

                redirect(base_url() . 'dashboard');

            }

        }

        $data['users'] = $this->user_model->get_list();

        $this->load->view('user_overview', $data);
    }

    public function editprofil()
    {
        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');
        }

        $data['user'] = $this->user_model->get_single(array('username' => $this->session->userdata('rikkesuser')));

        $this->load->view('user_editprofil', $data);
    }

    public function editpassword()
    {
        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');
        }

        $this->load->view('user_editpassword');
    }

    // process

    public function p_editpassword()
    {

        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');
        }

        $rules = array(
            array(
                'field' => 'opassword',
                'label' => 'Password Lama',
                'rules' => 'required',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong',
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Password Baru',
                'rules' => 'required|min_length[3]|max_length[16]',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => 'Password minimal 3 karakter',
                    'max_length' => 'Password maksimal 16 karakter'
                )
            ),
            array(
                'field' => 'rpassword',
                'label' => 'Ulangi Password',
                'rules' => 'required|matches[password]',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong',
                    'matches' => 'Password tidak sesuai'
                )
            ),
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false){

            $notif = array(
                'type' => 'warning',
                'title' => 'Perhatian',
                'msg' => validation_errors()
            );

            $this->session->set_flashdata($notif);

            $this->load->view('user_editpassword');
        }
        else {

            $old_password = $this->user_model->get_single_field('password', array('username' => $this->session->userdata('rikkesuser')));


            if ($old_password == md5($this->input->post('opassword')))
            {

                $data = array(
                    'password' => md5($this->input->post('password'))
                );

                $this->user_model->update($data, array('username' => $this->session->userdata('rikkesuser')));

                $this->session->unset_userdata('rikkesuser', 'rikkesname', 'rikkeslogged_in');

                $notif = array(
                    'type' => 'success',
                    'title' => 'Berhasil',
                    'msg' => 'Password Anda telah diubah. Silahkan login kembali dengan password baru Anda'
                );
    
                $this->session->set_flashdata($notif);

                redirect(base_url('login'));

            } else {

                $notif = array(
                    'type' => 'warning',
                    'title' => 'Perhatian',
                    'msg' => 'Password Lama salah'
                );

                $this->session->set_flashdata($notif);

                $this->load->view('user_editpassword');

            }

        }

    }

    public function p_editprofil()
    {

        if (!$this->session->has_userdata('rikkesuser') && !$this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'login');
        }

        // validating input form
        $rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[3]|max_length[15]',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} minimal 3 karakter',
                    'max_length' => '{field} maksimal 15 karakter'
                )
            ),

            array(
                'field' => 'display-name',
                'label' => 'Nama',
                'rules' => 'required|max_length[35]',
                'errors' => array(
                    'required' => '{field} tidak boleh kosong',
                    'max_length' => '{field} maksimal 35 karakter'
                )
            ),
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false){

            $notif = array(
                'type' => 'warning',
                'title' => 'Warning',
                'msg' => validation_errors()
            );

            $this->session->set_flashdata($notif);


            $data['user'] = $this->user_model->get_single(array('username' => $this->session->userdata('rikkesuser')));

            $this->load->view('user_editprofil', $data);
        }
        else {

            $data = array(
                'display_name' => $this->input->post('display-name'),
                'username' => $this->input->post('username')
            );

            $checker = array(
                'id' => get_id_by_username($this->session->userdata('rikkesuser'))
            );

            $this->user_model->update($data, $checker);

            #change session details
            $sess_data = array(
                'rikkesname' => $this->input->post('display-name'),
                'rikkesuser' => $this->input->post('username')
            );

            $this->session->set_userdata($sess_data);

            redirect(base_url() . 'dashboard');


        }

    }

}

