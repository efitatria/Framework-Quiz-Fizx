<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function index()
	{
		
		$this->load->model('Pegawai_Model');
		$data['pegawai_view']=$this->Pegawai_Model->getDataPegawai();
		$this->load->view('pegawai',$data);
	
	}
	public function create()
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('Pegawai_Model');
		//di method create ada helper(url,form) dan library(form_validation)
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('tambah_pegawai_view');
		}else{
			$this->Pegawai_Model->insertPegawai();
			$this->load->view('tamba_pegawai_sukses');
		}
	}

		public function update($id)
	{
		//load library
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nip', 'Nip', 'trim|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		//sebelum update data harus ambil data lama yang akan di update
		$this->load->model('pegawai_model');
		$data['pegawai']=$this->pegawai_model->getPegawai($id);
		//skeleton code
		if($this->form_validation->run()==FALSE){

		//setelah load data dikirim ke view
			$this->load->view('edit_pegawai_view',$data);

		}else{
			$this->pegawai_model->updateById($id);
			$this->load->view('edit_pegawai_sukses');

		}
	}

	public function delete($id)
	{

		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('pegawai_model');
		$this->pegawai_model->deleteById($id);
		if($this->form_validation->run()==FALSE){
			redirect('pegawai');
		}
		
	}
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */

 ?>