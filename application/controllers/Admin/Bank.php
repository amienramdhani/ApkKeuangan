<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bank extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Bank';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['bank'] = $this->db->get('bank')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bank/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = 'Bank';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['bank'] = $this->db->get('bank')->result_array();

        $this->form_validation->set_rules('bank_nama', 'Nama Bank', 'required');
        $this->form_validation->set_rules(
            'bank_nomor',
            'Nomor Bank',
            'required'
        );
        $this->form_validation->set_rules(
            'bank_pemilik',
            'Pemilik Bank',
            'required'
        );
        $this->form_validation->set_rules(
            'bank_saldo',
            'Saldo Bank',
            'required'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('bank/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('bank', [
                'bank_nama' => $this->input->post('bank_nama'),
                'bank_nomor' => $this->input->post('bank_nomor'),
                'bank_pemilik' => $this->input->post('bank_pemilik'),
                'bank_saldo' => $this->input->post('bank_saldo'),
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Bank Added</div>'
            );
            redirect('Admin/bank');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Bank';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $id = $this->uri->rsegment(3);
        $data['bank'] = $this->db
            ->get_where('bank', ['bank_id' => $id])
            ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('bank/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {
        $id = $this->input->post('bank_id');
        $data['bank_nama'] = $this->input->post('bank_nama');
        $data['bank_nomor'] = $this->input->post('bank_nomor');
        $data['bank_pemilik'] = $this->input->post('bank_pemilik');
        $data['bank_saldo'] = $this->input->post('bank_saldo');

        $this->load->model('Mbank', 'bank');
        $this->bank->editbank($data, ['bank_id' => $id]);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Bank edited</div>'
        );
        redirect('admin/bank');
    }

    public function delete_bank($id)
    {
        $id = $this->uri->rsegment(3);
        $id_users = $this->uri->rsegment(4);
        $this->load->model('Mbank', 'bank');
        $this->bank->del_bank($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Bank Deleted</div>'
        );
        redirect('admin/bank');
    }
}
