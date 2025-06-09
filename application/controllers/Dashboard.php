<?php
defined('BASEPATH')OR exit('No direct script acsess allowed');

class Dashboard extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->model('Produk_model');
        $this->load->model('SalesOrder_model'); // Asumsikan model ini ada untuk data penjualan
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('number'); // Untuk number_format

        // Cek jika pengguna sudah login
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index(){
        $data['title'] = 'Dashboard';

        // Data untuk Info Boxes
        // Asumsikan method ini ada di model masing-masing atau tambahkan logikanya di sini
        // $data['total_pelanggan'] = $this->Pelanggan_model->count_all_pelanggan();
        // $data['total_produk'] = $this->Produk_model->count_all_produk();
        // $data['total_pendapatan'] = $this->SalesOrder_model->get_total_pendapatan();
        
        // Contoh jika method count belum ada di model:
        $data['total_pelanggan'] = count($this->Pelanggan_model->get_all_pelanggan());
        $all_produk = $this->Produk_model->get_all_produk();
        $data['total_produk'] = count($all_produk);
        $data['total_pendapatan'] = $this->SalesOrder_model->get_total_pendapatan(); // Anda perlu membuat method ini di SalesOrder_model
                                                                                // Contoh: SELECT SUM(total_harga) as total FROM sales_orders

        // Data untuk tabel produk ("nama produk, harga produk, subtotal")
        // "subtotal" di sini diinterpretasikan sebagai nilai stok (harga * stok)
        $data['produk_list'] = $all_produk;

        // Data untuk produk terjual
        $data['sold_products_summary'] = $this->SalesOrder_model->get_summary_sold_products();

        $this->load->view('Tamplates/header', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('Tamplates/footer');
    }
}