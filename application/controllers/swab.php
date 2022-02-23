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
			"pekerjaan"=>$this->input->post("pekerjaan", TRUE)
		];
		$this->db_model->insert('swab_syamrabu', $data);
		echo json_encode($data);
	}


}
