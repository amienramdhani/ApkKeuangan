<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['transaksi'] = $this->mtransaksi->Selecttransaksi();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['bank'] = $this->db->get('bank')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['transaksi'] = $this->mtransaksi->Selecttransaksi();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['bank'] = $this->db->get('bank')->result_array();

        $this->form_validation->set_rules(
            'transaksi_tanggal',
            'Tanggal',
            'required'
        );
        $this->form_validation->set_rules(
            'transaksi_jenis',
            'Jenis Transaksi',
            'required'
        );

        $this->form_validation->set_rules(
            'transaksi_kategori',
            'Kategori Transaksi',
            'required'
        );
        $this->form_validation->set_rules(
            'transaksi_nominal',
            'Nominal',
            'required'
        );
        $this->form_validation->set_rules(
            'transaksi_keterangan',
            'Keterangan',
            'required'
        );
        $this->form_validation->set_rules('transaksi_bank', 'Bank', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('transaksi/index', $data);
            $this->load->view('templates/footer');
        } else {
            $nominal = $this->input->post('transaksi_nominal');
            $jenis = $this->input->post('transaksi_jenis');
            $bank = $this->input->post('transaksi_bank');
            $saldo_bank = $this->db
                ->get_where('bank', ['bank_id' => $bank])
                ->result_array();
            if ($jenis == 'Pemasukan') {
                $this->db->query(
                    "UPDATE `bank` set `bank_saldo` = `bank_saldo` + $nominal where `bank_id`= $bank"
                );
            } elseif ($jenis == 'Pengeluaran') {
                $this->db->query(
                    "UPDATE `bank` set `bank_saldo` = `bank_saldo` - $nominal where `bank_id`= $bank"
                );
            }
            $this->db->insert('transaksi', [
                'transaksi_tanggal' => $this->input->post('transaksi_tanggal'),
                'transaksi_jenis' => $jenis,
                'transaksi_kategori' => $this->input->post(
                    'transaksi_kategori'
                ),
                'transaksi_nominal' => $nominal,
                'transaksi_keterangan' => $this->input->post(
                    'transaksi_keterangan'
                ),
                'transaksi_bank' => $bank,
            ]);
            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Transaksi Added</div>'
            );
            redirect('Admin/transaksi');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Transaksi';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $id = $this->uri->rsegment(3);
        $data['transaksi'] = $this->db
            ->get_where('transaksi', ['transaksi_id' => $id])
            ->row_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['bank'] = $this->db->get('bank')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/edit', $data);
        $this->load->view('templates/footer');

        $transaksi = $this->db
            ->get_where('transaksi', ['transaksi_id' => $id])
            ->row_array();

        $nom_sek = $transaksi['transaksi_nominal'];
        $id_bank = $transaksi['transaksi_bank'];
        if ($transaksi['transaksi_jenis'] == 'Pemasukan') {
            $this->db->query(
                "UPDATE `bank` set `bank_saldo` = `bank_saldo` - $nom_sek where `bank_id`= $id_bank"
            );
        } elseif ($transaksi['transaksi_jenis'] == 'Pengeluaran') {
            $this->db->query(
                "UPDATE `bank` set `bank_saldo` = `bank_saldo` + $nom_sek where `bank_id`= $id_bank"
            );
        }
    }
    public function process_edit()
    {
        $id = $this->input->post('transaksi_id');
        $nominal = $this->input->post('transaksi_nominal');
        $jenis = $this->input->post('transaksi_jenis');
        $bank = $this->input->post('transaksi_bank');
        $saldo_bank = $this->db
            ->get_where('bank', ['bank_id' => $bank])
            ->result_array();
        if ($jenis == 'Pemasukan') {
            $this->db->query(
                "UPDATE `bank` set `bank_saldo` = `bank_saldo` + $nominal where `bank_id`= $bank"
            );
        } elseif ($jenis == 'Pengeluaran') {
            $this->db->query(
                "UPDATE `bank` set `bank_saldo` = `bank_saldo` - $nominal where `bank_id`= $bank"
            );
        }
        $data['transaksi_tanggal'] = $this->input->post('transaksi_tanggal');
        $data['transaksi_jenis'] = $jenis;
        $data['transaksi_kategori'] = $this->input->post('transaksi_kategori');
        $data['transaksi_nominal'] = $nominal;
        $data['transaksi_keterangan'] = $this->input->post(
            'transaksi_keterangan'
        );
        $data['transaksi_bank'] = $bank;
        $this->mtransaksi->edittransaksi($data, ['transaksi_id' => $id]);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Transaksi edited</div>'
        );
        redirect('admin/transaksi');
    }
    public function delete_transaksi($id)
    {
        $id = $this->uri->rsegment(3);
        $id_users = $this->uri->rsegment(4);

        $transaksi = $this->db
            ->get_where('transaksi', ['transaksi_id' => $id])
            ->row_array();

        $nom_sek = $transaksi['transaksi_nominal'];
        $id_bank = $transaksi['transaksi_bank'];
        if ($transaksi['transaksi_jenis'] == 'Pemasukan') {
            $this->db->query(
                "UPDATE `bank` set `bank_saldo` = `bank_saldo` - $nom_sek where `bank_id`= $id_bank"
            );
        } elseif ($transaksi['transaksi_jenis'] == 'Pengeluaran') {
            $this->db->query(
                "UPDATE `bank` set `bank_saldo` = `bank_saldo` + $nom_sek where `bank_id`= $id_bank"
            );
        }

        $this->mtransaksi->del_transaksi($id);

        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Transaksi Deleted</div>'
        );
        redirect('admin/transaksi');
    }
}
