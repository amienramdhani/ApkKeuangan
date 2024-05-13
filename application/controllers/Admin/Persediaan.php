<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Persediaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Persediaan BBM';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['persediaan_bbm'] = $this->db
            ->get('persediaan_bbm')
            ->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persediaan/index', $data);
        $this->load->view('templates/footer');
    }
    public function Add()
    {
        $data['title'] = 'Persediaan BBM';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $data['persediaan_bbm'] = $this->db
            ->get('persediaan_bbm')
            ->result_array();

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('shift', 'Shift', 'required');
        $this->form_validation->set_rules(
            'distick_awal',
            'Distick',
            'required'
        );
        $this->form_validation->set_rules(
            'stock_awal',
            'Stok Awal',
            'required'
        );
        $this->form_validation->set_rules(
            'no_mobil_tanki',
            'Nomor Mobil Tanki',
            'required'
        );
        $this->form_validation->set_rules(
            'noPNBPSO',
            'Nomor PNBPSO',
            'required'
        );
        $this->form_validation->set_rules(
            'distick_volume_sebelum_penerimaan',
            'Distick',
            'required'
        );
        $this->form_validation->set_rules(
            'volume_sebelum_penerimaan',
            'Volume Sebelum Penerimaan',
            'required'
        );
        $this->form_validation->set_rules(
            'volume_pengiriman_pnbp',
            'Volume Pengiriman PNBP',
            'required'
        );
        $this->form_validation->set_rules(
            'distick_volume_pengiriman',
            'Distick',
            'required'
        );
        $this->form_validation->set_rules(
            'volume_pengiriman_aktual',
            'Volume Pengiriman Aktual',
            'required'
        );
        $this->form_validation->set_rules(
            'pengeluaran_dispenser',
            'Pengeluaran Dispenser',
            'required'
        );
        $this->form_validation->set_rules(
            'distick_stock_akhir',
            'Distick',
            'required'
        );
        $this->form_validation->set_rules(
            'stock_akhir_aktual',
            'Stok Akhir Aktual',
            'required'
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('persediaan/index', $data);
            $this->load->view('templates/footer');
        } else {
            $stock_awal = $this->input->post('stock_awal');
            $volume_pengiriman_pnbp = $this->input->post(
                'volume_pengiriman_pnbp'
            );
            $volume_pengiriman_aktual = $this->input->post(
                'volume_pengiriman_aktual'
            );
            $pengeluaran_dispenser = $this->input->post(
                'pengeluaran_dispenser'
            );
            $jml_selisih_volume =
                $volume_pengiriman_pnbp - $volume_pengiriman_aktual;
            $jml_stok_akhir =
                $stock_awal +
                $volume_pengiriman_aktual -
                $pengeluaran_dispenser;
            $stock_akhir_aktual = $this->input->post('stock_akhir_aktual');
            $jml_selisih_total = $stock_akhir_aktual - $jml_stok_akhir;

            $this->db->insert('persediaan_bbm', [
                'tanggal' => $this->input->post('tanggal'),
                'shift' => $this->input->post('shift'),
                'distick_awal' => $this->input->post('distick_awal'),
                'stock_awal' => $stock_awal,
                'no_mobil_tanki' => $this->input->post('no_mobil_tanki'),
                'noPNBPSO' => $this->input->post('noPNBPSO'),
                'distick_volume_sebelum_penerimaan' => $this->input->post(
                    'distick_volume_sebelum_penerimaan'
                ),
                'volume_sebelum_penerimaan' => $this->input->post(
                    'volume_sebelum_penerimaan'
                ),
                'volume_pengiriman_pnbp' => $volume_pengiriman_pnbp,
                'distick_volume_pengiriman' => $this->input->post(
                    'distick_volume_pengiriman'
                ),
                'volume_pengiriman_aktual' => $volume_pengiriman_aktual,
                'selisih_volume' => $jml_selisih_volume,
                'pengeluaran_dispenser' => $pengeluaran_dispenser,
                'stock_akhir' => $jml_stok_akhir,
                'distick_stock_akhir' => $this->input->post(
                    'distick_stock_akhir'
                ),
                'stock_akhir_aktual' => $stock_akhir_aktual,
                'selisih_total_volume' => $jml_selisih_total,
            ]);

            $this->session->set_flashdata(
                'message',
                '<div class = "alert alert-success" role="alert">New Persediaan BBM Added</div>'
            );
            redirect('Admin/persediaan');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Persediaan BBM';
        $data['user'] = $this->db
            ->get_where('user', ['email' => $this->session->userdata('email')])
            ->row_array();

        $id = $this->uri->rsegment(3);
        $data['persediaan'] = $this->db
            ->get_where('persediaan_bbm', ['persediaan_id' => $id])
            ->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('persediaan/edit', $data);
        $this->load->view('templates/footer');
    }
    public function process_edit()
    {
        $id = $this->input->post('persediaan_id');
        $data['tanggal'] = $this->input->post('tanggal');
        $data['shift'] = $this->input->post('shift');
        $data['distick_awal'] = $this->input->post('distick_awal');
        $data['stock_awal'] = $this->input->post('stock_awal');
        $data['no_mobil_tanki'] = $this->input->post('no_mobil_tanki');
        $data['noPNBPSO'] = $this->input->post('noPNBPSO');
        $data['distick_volume_sebelum_penerimaan'] = $this->input->post(
            'distick_volume_sebelum_penerimaan'
        );
        $data['volume_sebelum_penerimaan'] = $this->input->post(
            'volume_sebelum_penerimaan'
        );
        $data['volume_pengiriman_pnbp'] = $this->input->post(
            'volume_pengiriman_pnbp'
        );
        $data['distick_volume_pengiriman'] = $this->input->post(
            'distick_volume_pengiriman'
        );
        $data['volume_pengiriman_aktual'] = $this->input->post(
            'volume_pengiriman_aktual'
        );
        $data['selisih_volume'] = $this->input->post('selisih_volume');
        $data['pengeluaran_dispenser'] = $this->input->post(
            'pengeluaran_dispenser'
        );
        $data['stock_akhir'] = $this->input->post('stock_akhir');
        $data['distick_stock_akhir'] = $this->input->post(
            'distick_stock_akhir'
        );
        $data['stock_akhir_aktual'] = $this->input->post('stock_akhir_aktual');
        $data['selisih_total_volume'] = $this->input->post(
            'selisih_total_volume'
        );

        $this->load->model('Mpersediaan', 'persediaan');
        $this->persediaan->editpersediaan($data, ['persediaan_id' => $id]);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-success" role="alert">Persediaan edited</div>'
        );
        redirect('admin/persediaan');
    }

    public function delete_persediaan($id)
    {
        $id = $this->uri->rsegment(3);
        $id_users = $this->uri->rsegment(4);
        $this->load->model('Mpersediaan', 'persediaan');
        $this->persediaan->del_persediaan($id);
        $this->session->set_flashdata(
            'message',
            '<div class = "alert alert-danger" role="alert">Persediaan BBM Deleted</div>'
        );
        redirect('admin/persediaan');
    }
}
