<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_Model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataPegawai()
		{
			$query = $this->db->query("Select * from pegawai");
			return $query -> result_array();

		}

		public function getJabatanByPegawai($idPegawai)
		{
			$query = $this->db->query("select * from pegawai,jabatan_pegawai where pegawai.id=jabatan_pegawai.fk_pegawai and pegawai.id='$idPegawai'");
			return $query->result_array();
		}
		public function getAnakByPegawai($idPegawai)
		{
			$query = $this->db->query("select pegawai.nama,anak.nama as nm_anak,anak.tanggalLahir from pegawai,anak where pegawai.id=anak.fk_pegawai and pegawai.id='$idPegawai'");
			return $query->result_array();
		}
		public function insertPegawai()
		{
			$object = array(
				'nama' => $this->input->post('nama'), 
				'nip' => $this->input->post('nip'),
				'tanggalLahir' => $this->input->post('tanggalLahir'),
				'alamat' => $this->input->post('alamat'),);
				
			$this->db->insert('pegawai', $object);
 	
		}
		public function getPegawai($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('pegawai',1);
			return $query->result();

		}

		public function updateById($id)
		{
			$data = array('nama' => $this->input->post('nama'),'nip' => $this->input->post('nip'),'tanggalLahir' => $this->input->post('tanggalLahir'),'alamat' => $this->input->post('alamat') );
			$this->db->where('id', $id);
			$this->db->update('pegawai', $data);
		}

		public function deleteById($id)
		{
			$this -> db -> where('id', $id);
  			$this -> db -> delete('pegawai');
		}

}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>