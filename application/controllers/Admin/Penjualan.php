<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Penjualanan BBM';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['penjualan'] = $this->db->get('penjualan_bbm')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penjualan/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = 'Penjualan BBM';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['persediaan'] = $this->db->get('persediaan_bbm')->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('shift', 'Shift', 'required');
        $this->form_validation->set_rules(
            'totalisator_awal',
            'Totalisator Awal',
            'required'
        );
        $this->form_validation->set_rules(
            'totalisator_akhir',
            'Totalisator Akhir',
            'required'
        );
        $this->form_validation->set_rules('pump_test', 'Pump Test', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('penjualan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $totalisator_awal = $this->input->post('totalisator_awal');
            $totalisator_akhir = $this->input->post('totalisator_akhir');
            $pump_test = $this->input->post('pump_test');
            $harga = $this->input->post('harga');
            $jml_volume_awal = $totalisator_akhir - $totalisator_awal;
            $jml_net_volume = $jml_volume_awal - $pump_test;
            $jml_volume_akhir = $jml_volume_awal * $harga;

            $this->db->insert('penjualan_bbm', [
                'tanggal' => $this->input->post('tanggal'),
                'shift' => $this->input->post('shift'),
                'totalisator_awal' => $totalisator_awal,
                'totalisator_akhir' => $totalisator_akhir,
                'volume' => $jml_volume_awal,
                'pump_test' => $pump_test,
                'net_volume' => $jml_net_volume,
                'harga' => $this->input->post('harga'),
                'volume_akhir' => $jml_volume_akhir,
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Penjualan BBM Added</div>'
            );
            redirect('Admin/penjualan');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Penjualan BBM';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $id = $this->uri->rsegment(3);
        $data['penjualan'] = $this->db
            ->get_where('penjualan_bbm', ['penjualan_id' => $id])
            ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('penjualan/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {
        $id = $this->input->post('penjualan_id');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['shift'] = $this->input->post('shift');
        $data['totalisator_awal'] = $this->input->post('totalisator_awal');
        $data['totalisator_akhir'] = $this->input->post('totalisator_akhir');
        $data['volume'] = $this->input->post('volume');
        $data['pump_test'] = $this->input->post('pump_test');
        $data['net_volume'] = $this->input->post('net_volume');
        $data['harga'] = $this->input->post('harga');
        $data['volume_akhir'] = $this->input->post('volume_akhir');

        $this->load->model('Mpenjualan', 'penjualan');
        $this->penjualan->editpenjualan($data, ['penjualan_id' => $id]);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Penjualan edited</div>'
        );
        redirect('admin/penjualan');
    }

    public function delete_penjualan($id)
    {
        $id = $this->uri->rsegment(3);
        $id_users = $this->uri->rsegment(4);
        $this->load->model('Mpenjualan', 'penjualan');
        $this->penjualan->del_penjualan($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Penjualan BBM Deleted</div>'
        );
        redirect('admin/penjualan');
    }
}
