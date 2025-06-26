<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        verify_session('customer'); // pastikan user login sebagai customer

        $this->load->model(array(
            'distribusi_model' => 'distribusi',
            'order_model' => 'order',
            'customer_model' => 'customer'
        ));
        
        $this->load->helper('url');
        $this->load->library('pagination');
    }

    // Tampilkan semua distribusi milik customer ini
    public function index()
    {
        $data['title'] = 'Riwayat Distribusi';

        $user_id = $this->session->userdata('id');

        // Konfigurasi pagination
        $config['base_url'] = base_url('customer/distribusi/index');
        $config['total_rows'] = $this->distribusi->count_all_by_user($user_id);
        $config['per_page'] = 10;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['distribusi_list'] = $this->distribusi->get_all_by_user($user_id, $config['per_page'], $page);
        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('header', $data);
        $this->load->view('distribusi/index', $data); // <-- view-nya kamu buat nanti
        $this->load->view('footer');
    }

    // Lihat detail distribusi
    public function view($id)
    {
        $user_id = userdata()->id;

        $distribusi = $this->distribusi->get_by_id_and_user($id, $user_id);
        if (!$distribusi) {
            show_404();
        }

        $order = $this->order->order_data($distribusi->order_id);
        $items = $this->order->order_items($distribusi->order_id);

        $data['title'] = 'Detail Distribusi';
        $data['distribusi'] = $distribusi;
        $data['order'] = $order;
        $data['items'] = $items;

        $this->load->view('header', $data);
        $this->load->view('distribusi/view', $data); // <-- view-nya kamu buat nanti
        $this->load->view('footer');
    }
}
