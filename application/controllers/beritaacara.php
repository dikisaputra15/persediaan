<?php
defined('BASEPATH') or exit('No direct script access allowed');

class beritaacara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Model_minta');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Berita Acara";
        $data['ba'] = $this->Model_minta->getAllba();
        $this->template->load('templates/dashboard', 'minta/beritaacara', $data);
    }

     public function tabelacc()
    {
        $data['title'] = "Permohonan ACC";
        $data['pacc'] = $this->Model_minta->getpacc();
        $this->template->load('templates/dashboard', 'minta/tabelacc', $data);
    }

    

}
