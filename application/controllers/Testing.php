<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {
    public function index()
    {
        echo 'the data is ' . $this->session->userdata('rikkesuser');
    }
}