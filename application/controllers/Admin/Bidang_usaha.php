<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang_usaha extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = "Bidang Usaha";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bidang_usaha']      = $this->db->get('bidang_usaha')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bidang_usaha/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = "Bidang Usaha";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['bidang_usaha']      = $this->db->get('bidang_usaha')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bidang_usaha/index', $data);
            $this->load->view('templates/footer');
        } else {

            $this->db->insert(
                'bidang_usaha',
                [
                    'nama' => $this->input->post('nama')
                ]
            );

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Bidang Usahas Added</div>'
            );
            redirect('Admin/bidang_usaha');
        }
    }


    public function edit()
    {
        $data['title'] = "Edit Bidang usaha";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id                           = $this->uri->rsegment(3);
        $data['bidang_usaha']    = $this->db->get_where('bidang_usaha', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bidang_usaha/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {

        $id                          = $this->input->post('id');
        $data['nama']               = $this->input->post('nama');
        $this->load->model('Mbidang_usaha', 'bidang');
        $this->bidang->editbidang($data, array('id' => $id));
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Bidang Usaha edited</div>'
        );
        redirect('admin/bidang_usaha');
    }

    public function delete_bidang($id)
    {
        $id                     = $this->uri->rsegment(3);
        $id_users               = $this->uri->rsegment(4);
        $this->load->model('Mbidang_usaha', 'bidang');
        $this->bidang->del_bidang($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Bidang Usaha Deleted</div>'
        );
        redirect('admin/bidang_usaha');
    }
}
