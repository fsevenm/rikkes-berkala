<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login(){

        $rules = array(
            array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Username tidak boleh kosong',
                )
            ),
            array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|trim',
                'errors' => array(
                    'required' => 'Password tidak boleh kosong',
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

            $this->load->view('login');
        }

        else {

            $data = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password'))
            );

            $login_data = $this->authentication_model->validate_login($data);

            if (!$login_data){

                $notif = array(
                    'type' => 'danger',
                    'title' => 'Login gagal',
                    'msg' => 'Username atau password Anda salah'
                );

                $this->session->set_flashdata($notif);

                $this->load->view('login');

            } else {

                $login_sess = array(
                    'rikkesuser' => $login_data->username,
                    'rikkesname' => $login_data->display_name,
                    'rikkeslogged_in' => TRUE
                );

                $this->session->set_userdata($login_sess);

                redirect(base_url() . 'dashboard');

            }
        }
    }

    // end of function login


    // function logout

    public function logout(){
        $this->session->sess_destroy();

        redirect(base_url() . 'login');
    }
}
