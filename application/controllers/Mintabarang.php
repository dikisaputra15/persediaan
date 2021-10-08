<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mintabarang extends CI_Controller
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
        $data['title'] = "Minta barang";
        $data['minta'] = $this->Model_minta->getAllminta();
        $data['barang'] = $this->Model_minta->getAllbarang();
        $this->template->load('templates/dashboard', 'minta/minta', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('supplier_id', 'Supplier', 'required');
        $this->form_validation->set_rules('barang_id', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_masuk', 'Jumlah Masuk', 'required|trim|numeric|greater_than[0]');
    }

    public function add()
    {
        $data['title'] = "Form Minta Barang";
        $this->template->load('templates/dashboard', 'minta/add', $data);
    }

     public function addproses()
    {

            
            $id_barang = $this->input->post('id_barang');
            $qty = $this->input->post('qty');
            $stok = $this->input->post('stok');

            if($qty > $stok){
               echo '<script language="javascript">
              alert ("stok tidak mencukupi");
              window.location.href = "' . base_url() . 'Mintabarang";
              </script>';
            }else{

              $data = [
                 'id_barang' => $id_barang,
                 'qty' => $qty
              ];

              $this->db->insert('tmp_barang', $data);

              set_pesan('data berhasil disimpan');
                redirect('Mintabarang');
              
          }

    }

    public function delete($id)
    {
        $this->db->delete('tmp_barang', ['id_tmp' => $id]);
        redirect('Mintabarang');
    }

    public function view($id)
    {
        $data['title'] = "View Permohonan";
        $data['vmohon'] = $this->Model_minta->getmohonbyid($id);
        $this->template->load('templates/dashboard', 'minta/vmohon', $data);
    }

    public function tabelminta()
    {
        $data['title'] = "Tabel Minta Barang";
        $data['permohonan'] = $this->Model_minta->getAllpermohonan();
        $this->template->load('templates/dashboard', 'minta/permohonan', $data);
    }

    public function aprove()
    {
        $data['title'] = "Aprove Barang";
        $data['listaprove'] = $this->Model_minta->getAllaprove();
        $this->template->load('templates/dashboard', 'minta/aprove', $data);
        
    }

    public function kabid($id)
    {
        $data['title'] = "kabid";
        $data['kabid'] = $this->Model_minta->getbykabid($id);
        $data['listbarang'] = $this->Model_minta->getlistbarang($id);
        $this->template->load('templates/dashboard', 'minta/kabid', $data);
        
    }

     public function kabu($id)
    {
        $data['title'] = "kabu";
        $data['kabid'] = $this->Model_minta->getbykabid($id);
        $data['listbarang'] = $this->Model_minta->getlistbarang($id);
        $this->template->load('templates/dashboard', 'minta/kabu', $data);
        
    }

    public function pptk($id)
    {
        $data['title'] = "PPTK";
        $data['kabid'] = $this->Model_minta->getbykabid($id);
        $data['listbarang'] = $this->Model_minta->getlistbarang($id);
        $this->template->load('templates/dashboard', 'minta/pptk', $data);
        
    }

    public function setujukabid()
    {

            $id = $this->uri->segment(4);
            $tgl_now = date('Y-m-d');

            $data = [
               'id_minta_barang' => $id,
               'tgl_aprove' => $tgl_now
            ];

            $this->db->insert('aprove_permohonan', $data);

            $data2 = array(
                    'status' => "acc kabid disposisi kabu"
            );

            $this->db->where('id_minta_barang', $id);
            $this->db->update('minta_barang', $data2);


            set_pesan('data berhasil disimpan');
              redirect('Mintabarang/aprove');

        
    }

    public function tolakkabid()
    {

            $id = $this->uri->segment(3);
            $tgl_now = date('Y-m-d');

            $data = [
               'id_minta_barang' => $id,
               'tgl_aprove' => $tgl_now
            ];

            $this->db->insert('aprove_permohonan', $data);

            $data2 = array(
                    'status' => "tolak"
            );

            $this->db->where('id_minta_barang', $id);
            $this->db->update('minta_barang', $data2);


            set_pesan('data berhasil disimpan');
              redirect('Mintabarang/aprove');

        
    }

     public function setujukabu()
    {

            $id = $this->uri->segment(3);

            $data2 = array(
                    'status' => "disposisi pptk"
            );

            $this->db->where('id_minta_barang', $id);
            $this->db->update('minta_barang', $data2);


            set_pesan('data berhasil disimpan');
              redirect('Mintabarang/aprove');

        
    }

    public function setujupptk()
    {

            $id = $this->uri->segment(3);

            $data2 = array(
                    'status' => "acc"
            );

            $this->db->where('id_minta_barang', $id);
            $this->db->update('minta_barang', $data2);


            set_pesan('data berhasil disimpan');
              redirect('Mintabarang/aprove');

        
    }



    public function proses_permohonan()
    {
        $kepada = $this->input->post('kepada');   
        $dari = $this->input->post('dari');   
        $sifat = $this->input->post('sifat');   
        $prihal = $this->input->post('prihal');   
        $pembuat = $this->input->post('pembuat');   
        $tgl_permintaan = $this->input->post('tgl_permintaan'); 
 
        $id = $this->session->userdata('login_session')['user']; 

         $data = [
               'tgl_minta' => $tgl_permintaan,
               'id_user' => $id,
               'pemohon' => $pembuat,
               'kepada' => $kepada,
               'dari' => $dari,
               'sifat' => $sifat,
               'prihal' => $prihal,
               'status' => 'belum acc'
            ]; 

            $masuk = $this->db->insert('minta_barang', $data);
            $id = $this->db->insert_id();
            if($masuk){
                $query = $this->db->get('tmp_barang');

                foreach ($query->result() as $row)
                {
                    $idbarang = $row->id_barang;
                    $qtyt = $row->qty;

                    $data2 = [
                       'id_minta_barang' => $id,
                       'id_barang' => $idbarang,
                       'qty' => $qtyt
                    ]; 

                    $this->db->insert('detail_minta_barang', $data2);

                }

                $this->db->truncate('tmp_barang'); 
            }
            set_pesan('data berhasil disimpan');
              redirect('Mintabarang/tabelminta');
    }

    public function hapuspermohonan($id)
   {
     $this->db->delete('minta_barang', ['id_minta_barang' => $id]);
       set_pesan('data berhasil dihapus');
      redirect('Mintabarang/tabelminta');
   }

public function lihat($id)
   {
        $data['title'] = "lihat";
        $data['kabid'] = $this->Model_minta->getbykabid($id);
        $data['listbarang'] = $this->Model_minta->getlistbarang($id);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('minta/pdf_lihat', $data);
   }

   public function c_ba($id)
   {
        $data['title'] = "lihat";
        $data['ba'] = $this->Model_minta->getpdfba($id);
        // $data['listbarang'] = $this->Model_minta->getlistbarang($id);
        $this->load->library('pdf');
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->filename = "laporan.pdf";
        $this->pdf->load_view('minta/pdf_ba', $data);
   }

    public function upload_ba($id)
    {
        $data['title'] = "Upload BA";
        $data['tampilba'] = $this->Model_minta->gettampilba($id);
        $this->template->load('templates/dashboard', 'minta/upload_ba', $data);
        
    }

    public function prosesba($id)
    {
    
       $file = $_FILES['file']['name'];

       if ($file) {
             $config['allowed_types'] = 'jpg|jpeg|png|JPEG|pdf|PDF';
             $config['upload_path'] = './uploads/';
             $config['remove_spaces'] = FALSE;

             $this->load->library('upload', $config);

             if ($this->upload->do_upload('file')) {
             } else {
                echo $this->upload->display_errors();
             }
        }
       
       $data = [
             'id_minta_barang' => $id,
             'file' => $file
           ];

      $this->Model_minta->insertba($data, 'upload_ba');
      set_pesan('data berhasil disimpan');
       redirect('Mintabarang/upload_ba/' .$id);

    }

    public function update_status($id)
    {


            $data = [
               'status' => 'barang diterima'
            ];


            $this->db->where('id_minta_barang', $id);
            $this->db->update('minta_barang', $data);


            set_pesan('data berhasil diupdate');
              redirect('beritaacara/tabelacc');

        
    }

}
