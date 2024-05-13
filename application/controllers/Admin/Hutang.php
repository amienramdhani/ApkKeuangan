<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hutang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Hutang';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['hutang'] = $this->db->get('hutang')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hutang/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = 'Bank';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['hutang'] = $this->db->get('hutang')->result_array();

        $this->form_validation->set_rules(
            'hutang_tanggal',
            'Tanggal Hutang',
            'required'
        );
        $this->form_validation->set_rules(
            'hutang_nominal',
            'Nominal Hutang',
            'required'
        );
        $this->form_validation->set_rules(
            'hutang_keterangan',
            'Keterangan Hutang',
            'required'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('hutang/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('hutang', [
                'hutang_tanggal' => $this->input->post('hutang_tanggal'),
                'hutang_nominal' => $this->input->post('hutang_nominal'),
                'hutang_keterangan' => $this->input->post('hutang_keterangan'),
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Hutang Added</div>'
            );
            redirect('Admin/hutang');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Hutang';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $id = $this->uri->rsegment(3);
        $data['hutang'] = $this->db
            ->get_where('hutang', ['hutang_id' => $id])
            ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('hutang/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {
        $id = $this->input->post('hutang_id');
        $data['hutang_tanggal'] = $this->input->post('hutang_tanggal');
        $data['hutang_nominal'] = $this->input->post('hutang_nominal');
        $data['hutang_keterangan'] = $this->input->post('hutang_keterangan');

        $this->load->model('Mhutang', 'hutang');
        $this->hutang->edithutang($data, ['hutang_id' => $id]);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Hutang edited</div>'
        );
        redirect('admin/hutang');
    }

    public function delete_hutang($id)
    {
        $id = $this->uri->rsegment(3);
        $id_users = $this->uri->rsegment(4);
        $this->load->model('Mhutang', 'hutang');
        $this->hutang->del_hutang($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Hutang Deleted</div>'
        );
        redirect('admin/hutang');
    }
}
