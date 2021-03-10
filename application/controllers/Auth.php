<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function login()
    {
        if ($this->session->userdata('status') !== 'login') {
            if ($this->input->post('username')) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                if ($this->M_auth->getUser($username)->num_rows() > 0) {
                    $data = $this->M_auth->getUser($username)->row();
                    if ($data->password == $password) {
                        $userdata = array(
                            'id_user' => $data->id_user,
                            'nama_user' => $data->nama_user,
                            'username' => $data->username,
                            'password' => $data->password,
                            'status' => 'login'
                        );
                        $this->session->set_userdata($userdata);
                        echo json_encode('sukses');
                    } else {
                        echo json_encode('passwordsalah');
                    }
                } else {
                    echo json_encode('tidakada');
                }
            } else {
                $this->load->view('login');
            }
        } else {
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    // public function prosesLogin()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'required');
    //     if ($this->form_validation->run()) {
    //         $username = $this->input->post('username');
    //         $password = $this->input->post('password');
    //         $this->load->model('M_master');
    //         if ($this->M_master->checkLogin($username, $password)) {
    //             $session_data = array(
    //                 'username' => $username
    //             );
    //             $this->session->set_userdata($session_data);
    //             redirect('login/sukses');
    //         } else {
    //             $this->session->set_flashdata('error', 'Username dan Password salah');
    //             redirect('login/index');
    //         }
    //     } else {
    //         $this->index();
    //     }
    // }

    // public function sukses()
    // {
    //     if ($this->session->userdata('username') != '') {
    //         redirect('dashboard/index');
    //     } else {
    //         redirect('login/index');
    //     }
    // }

    // public function prosesLogout()
    // {
    //     $this->session->unset_userdata('username');
    //     $this->session->sess_destroy();
    //     redirect('login/index');
    // }
}
