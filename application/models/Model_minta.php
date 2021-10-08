<?php

class Model_minta extends CI_Model
{
   
    public function getAllminta()
   {
          
      $query = "SELECT tmp_barang.*, barang.id_barang,barang.nama_barang FROM tmp_barang JOIN barang on tmp_barang.id_barang=barang.id_barang";
      return $this->db->query($query)->result_array();
   }

   public function getAllpermohonan()
   {
          
      $query = "SELECT * from minta_barang";
      return $this->db->query($query)->result_array();
   }

    public function getAllaprove()
   {
          
      $query = "SELECT aprove_permohonan.*, minta_barang.* FROM aprove_permohonan JOIN minta_barang on aprove_permohonan.id_minta_barang=minta_barang.id_minta_barang";
      return $this->db->query($query)->result_array();
   }

    public function getAllbarang()
   {
          
      $query = "SELECT * from barang";
      return $this->db->query($query)->result_array();
   }

   public function getbarang()
   {
          
      $query = "SELECT * from barang";
      return $this->db->query($query)->result_array();
   }

 	public function insert_kategori($data, $table)
   {
      $this->db->insert($table, $data);
   }

   public function delete_kategori($id)
   {
      $this->db->delete('tb_kategori', ['id_kategori' => $id]);
   }

    public function getmohonbyid($id)
   {
      $query = "SELECT detail_minta_barang.*, minta_barang.*, barang.* FROM detail_minta_barang JOIN minta_barang on detail_minta_barang.id_minta_barang=minta_barang.id_minta_barang join barang on detail_minta_barang.id_barang=barang.id_barang where detail_minta_barang.id_minta_barang='$id'";
      return $this->db->query($query)->result_array();
   }

    public function getbykabid($id)
   {
      return $this->db->get_where('minta_barang', ['id_minta_barang' => $id])->row_array();
   }

   public function getlistbarang($id)
   {
      $query = "SELECT detail_minta_barang.*, minta_barang.*, barang.* FROM detail_minta_barang JOIN minta_barang on detail_minta_barang.id_minta_barang=minta_barang.id_minta_barang join barang on detail_minta_barang.id_barang=barang.id_barang where detail_minta_barang.id_minta_barang='$id'";
      return $this->db->query($query)->result_array();
   }

	public function updatekategori()
   {
      $kategori = $this->input->post('kategori');

      $data = [
      	'kategori' => $kategori
      ];

      $this->db->update('tb_kategori', $data, ['id_kategori' => $this->input->post('id_kategori')]);
   }

   public function getallba()
   {
          
      $query = "SELECT * from minta_barang where status='acc' or status='barang diterima'";
      return $this->db->query($query)->result_array();
   }

   public function getpdfba($id)
   {
          
      $query = "SELECT detail_minta_barang.*, minta_barang.*, barang.* FROM detail_minta_barang JOIN minta_barang on detail_minta_barang.id_minta_barang=minta_barang.id_minta_barang join barang on detail_minta_barang.id_barang=barang.id_barang where detail_minta_barang.id_minta_barang='$id'";
      return $this->db->query($query)->result_array();
   }

   public function insertba($data, $table)
   {
      $this->db->insert($table, $data);
   }

   public function gettampilba($id)
   {
          
      $query = "SELECT minta_barang.*, upload_ba.* FROM minta_barang JOIN upload_ba on minta_barang.id_minta_barang=upload_ba.id_minta_barang where minta_barang.id_minta_barang='$id'";
      return $this->db->query($query)->result_array();
   }

    public function jmlacc()
   {
               $this->db->where('status', 'acc');
        $query = $this->db->get('minta_barang');
          if($query->num_rows()>0)
          {
            return $query->num_rows();
          }
          else
          {
            return 0;
          }

   }

   public function getpacc()
   {
       $query = "SELECT * from minta_barang where status='acc'";
      return $this->db->query($query)->result_array();

   }

}

?>