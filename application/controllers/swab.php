<?php
defined('BASEPATH') or exit('No direct script access allowed');

class swab extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// if (!$this->session->userdata("id_user")) {
		// 	redirect("login");
		// }
		$this->load->model('db_model');
		$this->load->helper('url');
	}

	public function index()
	{
		// $this->load->view('dashboard_v');
		//$this->load->view('umum_v', $data);

		// $data["total_today"] = $this->db_model->get("v_today")->num_rows();
		// $this->template->load('template', 'operator_gcu_v', $data);
		$this->load->view('swab_v');
	}	
	

	public function tambah_data()
	{
		$data = [
			"nama" => $this->input->post("nama", TRUE),
			"nik" => $this->input->post("nik", TRUE),
			"nama_ortu" => $this->input->post("nama_ortu", TRUE),
			"ttl" => $this->input->post("ttl", TRUE),
			"umur" => $this->input->post("umur", TRUE),
			"jk"=>$this->input->post("jk", TRUE),
			"pekerjaan"=>$this->input->post("pekerjaan", TRUE),
			"jalan"=>$this->input->post("jalan", TRUE),
			"rt"=>$this->input->post("rt", TRUE),
			"desa"=>$this->input->post("desa", TRUE),
			"kec"=>$this->input->post("kec", TRUE),
			"kab"=>$this->input->post("kab", TRUE),
			"no_hp"=>$this->input->post("no_hp", TRUE),
			"timbul_gejala"=>$this->input->post("timbul_gejala", TRUE),
			"riwayat_demam"=>$this->input->post("riwayat_demam", TRUE),
			"derajat_demam"=>$this->input->post("derajat_demam", TRUE),
			"riwayat_batuk"=>$this->input->post("riwayat_batuk", TRUE),
			"riwayat_pilek"=>$this->input->post("riwayat_pilek", TRUE),
			"riwayat_sakit_tenggorokan"=>$this->input->post("riwayat_sakit_tenggorokan", TRUE),
			"riwayat_sakit_kepala"=>$this->input->post("riwayat_sakit_kepala", TRUE),
			"lemah"=>$this->input->post("lemah", TRUE),
			"nyeri_otot"=>$this->input->post("nyeri_otot", TRUE),
			"mual"=>$this->input->post("mual", TRUE),
			"abdomen"=>$this->input->post("abdomen", TRUE),
			"diare"=>$this->input->post("diare", TRUE),
			"hamil"=>$this->input->post("hamil", TRUE),
			"diabetes"=>$this->input->post("diabetes", TRUE),
			"jantung"=>$this->input->post("jantung", TRUE),
			"hipertensi"=>$this->input->post("hipertensi", TRUE),
			"keganasan"=>$this->input->post("keganasan", TRUE),
			"gangguan_imunologi"=>$this->input->post("gangguan_imunologi", TRUE),
			"gagal_ginjal"=>$this->input->post("gagal_ginjal", TRUE),
			"gangguan_hati"=>$this->input->post("gangguan_hati", TRUE),
			"ppok"=>$this->input->post("ppok", TRUE),
			"kondisi_penyerta_lain"=>$this->input->post("kondisi_penyerta_lain", TRUE)
		];
		$this->db_model->insert('swab_syamrabu', $data);
		echo json_encode($data);
	}


}
