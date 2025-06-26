<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Tambahkan helper fungsi seperti ini kalau kamu pakai di child controller
    protected function customer_logged_in()
    {
        if (!$this->session->userdata('id')) {
           redirect('auth/login'); // atau sesuai dengan route login customer kamu

        }
    }
}
