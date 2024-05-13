<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = 'Kategori';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['kategori'] = $this->db->get('kategori')->result_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kategori/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('kategori', [
                'kategori' => $this->input->post('kategori'),
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Kategori Added</div>'
            );
            redirect('Admin/kategori');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Kategori';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $id = $this->uri->rsegment(3);
        $data['kategori'] = $this->db
            ->get_where('kategori', ['kategori_id' => $id])
            ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kategori/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {
        $id = $this->input->post('kategori_id');
        $data['kategori'] = $this->input->post('kategori');

        $this->load->model('Mkategori', 'kategori');
        $this->kategori->editkategori($data, ['kategori_id' => $id]);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Kategori edited</div>'
        );
        redirect('admin/kategori');
    }

    public function delete_kategori($id)
    {
        $id = $this->uri->rsegment(3);
        $id_users = $this->uri->rsegment(4);
        $this->load->model('Mkategori', 'kategori');
        $this->kategori->del_kategori($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Kategori Deleted</div>'
        );
        redirect('admin/kategori');
    }
}
