<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Piutang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Piutang';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['piutang'] = $this->db->get('piutang')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('piutang/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = 'Piutang';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['piutang'] = $this->db->get('piutang')->result_array();

        $this->form_validation->set_rules(
            'piutang_tanggal',
            'Tanggal Piutang',
            'required'
        );
        $this->form_validation->set_rules(
            'piutang_nominal',
            'Nominal Piutang',
            'required'
        );
        $this->form_validation->set_rules(
            'piutang_keterangan',
            'Keterangan Piutang',
            'required'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('piutang/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('piutang', [
                'piutang_tanggal' => $this->input->post('piutang_tanggal'),
                'piutang_nominal' => $this->input->post('piutang_nominal'),
                'piutang_keterangan' => $this->input->post(
                    'piutang_keterangan'
                ),
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Piutang Added</div>'
            );
            redirect('Admin/piutang');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Piutang';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $id = $this->uri->rsegment(3);
        $data['piutang'] = $this->db
            ->get_where('piutang', ['piutang_id' => $id])
            ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('piutang/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {
        $id = $this->input->post('piutang_id');
        $data['piutang_tanggal'] = $this->input->post('piutang_tanggal');
        $data['piutang_nominal'] = $this->input->post('piutang_nominal');
        $data['piutang_keterangan'] = $this->input->post('piutang_keterangan');

        $this->load->model('Mpiutang', 'piutang');
        $this->piutang->editpiutang($data, ['piutang_id' => $id]);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Piutang edited</div>'
        );
        redirect('admin/piutang');
    }

    public function delete_piutang($id)
    {
        $id = $this->uri->rsegment(3);
        $id_users = $this->uri->rsegment(4);
        $this->load->model('Mpiutang', 'piutang');
        $this->piutang->del_piutang($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Piutang Deleted</div>'
        );
        redirect('admin/piutang');
    }
}
