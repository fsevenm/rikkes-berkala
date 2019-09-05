<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function get_id_by_username($username)
{
    $CI =& get_instance();
    $CI->load->database();

    $CI->db->select('id');
    $res = $CI->db->get_where('users', array('username' => $username))->row();
    if ($res)
    {
        return $res->id;
    }
    else 
    {
        return null;
    }
}

// view helper

function view_sidebar()
{
    echo
    '
    <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href=" '.base_url().' "><i class="fa fa-home fa-fw"></i> Beranda</a>
                    </li>

                    <li>
                        <a href="'.base_url('employee').'"><i class="fa fa-user fa-fw"></i> Daftar pegawai</a>
                    </li>

                    <li>
                        <a href="'.base_url('employee/add').'"><i class="fa fa-plus fa-fw"></i> Tambah pegawai</a>
                    </li>

                    <li>
                        <a href="'.base_url('jabatan').'"><i class="fa fa-star fa-fw"></i> Jabatan</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        
    ';

}

function view_footer_content()
{
    echo 
    ' 
    <p class="pull-right">&copy; '.date("Y").' Rikkes Berkala - Biddokes | Dikembangkan oleh <a href="http://ayubaswad.com">F7M</a></p>
    ';
}

?>