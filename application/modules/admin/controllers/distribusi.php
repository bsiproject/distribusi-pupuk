<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Distribusi_model');
        $this->load->library('form_validation'); // Pastikan library ini dimuat
        $this->load->helper('url'); // Pastikan helper ini dimuat untuk site_url()

        // Tambahkan logic autentikasi/otorisasi di sini jika Anda memilikinya
        // if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
        //     redirect('auth/login', 'refresh');
        // }
    }

    public function index() {
        $data['title'] = 'Kelola Distribusi';
        // Mengubah pemuatan view agar sesuai dengan struktur template Argon Anda
        // Asumsi 'header' dan 'footer' adalah bagian dari template admin Anda
        $this->load->view('header', $data); // Mungkin 'admin/layouts/header' atau sejenisnya
        $this->load->view('distribusi/distribusi', $data); // Ini adalah view HTML yang Anda berikan
        $this->load->view('footer');
        $data['orders'] = $this->Distribusi_model->get_all_orders(); // Mungkin 'admin/layouts/footer' atau sejenisnya
    }

    // --- METHOD BARU UNTUK DATATABLES AJAX ---
    public function get_ajax_data() {
        // Method ini akan dipanggil oleh DataTables
        $list = $this->Distribusi_model->get_datatables();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $distribusi) {
            $no++;
            $row = array();
            $row['id'] = $distribusi->id; // Penting untuk edit/hapus
            $row['ekspedisi'] = $distribusi->ekspedisi; // Kolom baru, pastikan ada di DB
            $row['tracking_id'] = $distribusi->tracking_id; // Kolom baru, pastikan ada di DB
            $row['status'] = $distribusi->status;
            $row['tanggal_distribusi'] = $distribusi->tanggal_distribusi; // Gunakan nama kolom DB yang benar
            // Kolom lain jika ada, misal $row['user_id'] = $distribusi->user_id;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Distribusi_model->count_all(),
            "recordsFiltered" => $this->Distribusi_model->count_filtered(),
            "data" => $data,
        );

        // Output JSON ke DataTables
        $this->output
             ->set_content_type('application/json')
             ->set_output(json_encode($output));
    }

    // --- METHOD UNTUK OPERASI CRUD VIA AJAX ---

    public function add() {
        $response = ['status' => 'error', 'message' => 'Gagal menambahkan data.'];

        $this->form_validation->set_rules('ekspedisi', 'Nama Ekspedisi', 'required');
        $this->form_validation->set_rules('tracking_id', 'Tracking ID', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response['message'] = validation_errors();
        } else {
            $data = [
                'ekspedisi' => $this->input->post('ekspedisi'),
                'tracking_id' => $this->input->post('tracking_id'),
                'status' => $this->input->post('status'),
                'tanggal_distribusi' => date('Y-m-d H:i:s'), // Sesuaikan nama kolom DB
                // Tambahkan kolom lain yang relevan jika diperlukan, misal user_id, order_number
                'user_id' => 1, // Contoh default, sesuaikan dengan logic user login Anda
                'order_number' => 'ORD-' . time(), // Contoh default, sesuaikan dengan logic Anda
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->Distribusi_model->add_distribusi($data)) {
                $response = ['status' => 'success', 'message' => 'Data distribusi berhasil ditambahkan.'];
            } else {
                $response['message'] = 'Terjadi kesalahan saat menyimpan data ke database.';
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function edit() {
        $response = ['status' => 'error', 'message' => 'Gagal memperbarui data.'];

        $this->form_validation->set_rules('id', 'ID Distribusi', 'required|numeric');
        $this->form_validation->set_rules('ekspedisi', 'Nama Ekspedisi', 'required');
        $this->form_validation->set_rules('tracking_id', 'Tracking ID', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response['message'] = validation_errors();
        } else {
            $id = $this->input->post('id');
            $data = [
                'ekspedisi' => $this->input->post('ekspedisi'),
                'tracking_id' => $this->input->post('tracking_id'),
                'status' => $this->input->post('status'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            if ($this->Distribusi_model->update_distribusi($id, $data)) {
                $response = ['status' => 'success', 'message' => 'Data distribusi berhasil diperbarui.'];
            } else {
                $response['message'] = 'Terjadi kesalahan saat memperbarui data di database.';
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function delete() {
        $response = ['status' => 'error', 'message' => 'Gagal menghapus data.'];

        $this->form_validation->set_rules('id', 'ID Distribusi', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            $response['message'] = validation_errors();
        } else {
            $id = $this->input->post('id');

            if ($this->Distribusi_model->delete_distribusi($id)) {
                $response = ['status' => 'success', 'message' => 'Data distribusi berhasil dihapus.'];
            } else {
                $response['message'] = 'Terjadi kesalahan saat menghapus data dari database.';
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    // Hapus atau abaikan method lama ini karena tidak dipakai lagi dengan DataTables AJAX
    // public function simpan() { ... }
    // public function edit($id) { ... }
    // public function update($id) { ... }
    // public function hapus($id) { ... }
}