<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        if ($this->session->has_userdata('rikkesuser') && $this->session->has_userdata('rikkeslogged_in')){

            redirect(base_url() . 'dashboard');
    
        } else {

            $this->load->view('login');
        }

    }
}