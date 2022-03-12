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
			"jenis_swab" => $this->input->post("jenis_swab", TRUE),
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
			"kondisi_penyerta_lain"=>$this->input->post("kondisi_penyerta_lain", TRUE),
			"pneumonia"=>$this->input->post("pneumonia", TRUE),
			"ards"=>$this->input->post("ards", TRUE),
			"diagnosis_lain"=>$this->input->post("diagnosis_lain", TRUE),
			"etiologi"=>$this->input->post("etiologi", TRUE),
			"diagnosis_pernafasan_lain"=>$this->input->post("diagnosis_pernafasan_lain", TRUE),
			"rawat_rs"=>$this->input->post("rawat_rs", TRUE),
			"rs_terakhir"=>$this->input->post("rs_terakhir", TRUE),
			"tgl_masuk_rs"=>$this->input->post("tgl_masuk_rs", TRUE),
			"rawat_icu"=>$this->input->post("rawat_icu", TRUE),
			"tindakan_intubasi"=>$this->input->post("tindakan_intubasi", TRUE),
			"penggunaan_emco"=>$this->input->post("penggunaan_emco", TRUE),
			"rs_sebelumnya"=>$this->input->post("rs_sebelumnya", TRUE),
			"status_pasien_terakhir"=>$this->input->post("status_pasien_terakhir", TRUE),
			"tgl_meninggal"=>$this->input->post("tgl_meninggal", TRUE),
			"riwayat_luar_negeri"=>$this->input->post("riwayat_luar_negeri", TRUE),
			"negara_1"=>$this->input->post("negara_1", TRUE),
			"kota_1"=>$this->input->post("kota_1", TRUE),
			"tgl_negara_1"=>$this->input->post("tgl_negara_1", TRUE),
			"tgl_tiba_negara_1"=>$this->input->post("tgl_tiba_negara_1", TRUE),
			"negara_2"=>$this->input->post("negara_2", TRUE),
			"kota_2"=>$this->input->post("kota_2", TRUE),
			"tgl_negara_2"=>$this->input->post("tgl_negara_2", TRUE),
			"tgl_tiba_negara_2"=>$this->input->post("tgl_tiba_negara_2", TRUE),
			"riwayat_transmisi_lokal"=>$this->input->post("riwayat_transmisi_lokal", TRUE),
			"provinsi_transmisi_1"=>$this->input->post("provinsi_transmisi_1", TRUE),
			"kota_transmisi_1"=>$this->input->post("kota_transmisi_1", TRUE),
			"tgl_transmisi_1"=>$this->input->post("tgl_transmisi_1", TRUE),
			"tgl_tiba_transmisi_1"=>$this->input->post("tgl_tiba_transmisi_1", TRUE),
			"provinsi_transmisi_2"=>$this->input->post("provinsi_transmisi_2", TRUE),
			"kota_transmisi_2"=>$this->input->post("kota_transmisi_2", TRUE),
			"tgl_transmisi_2"=>$this->input->post("tgl_transmisi_2", TRUE),
			"tgl_tiba_transmisi_2"=>$this->input->post("tgl_tiba_transmisi_2", TRUE),
			"riwayat_ketransmisi_lokal"=>$this->input->post("riwayat_ketransmisi_lokal", TRUE),
			"provinsi_ketransmisi"=>$this->input->post("provinsi_ketransmisi", TRUE),
			"kota_ketransmisi"=>$this->input->post("kota_ketransmisi", TRUE),
			"riwayat_kontak_suspek"=>$this->input->post("riwayat_kontak_suspek", TRUE),
			"nama_suspek_1"=>$this->input->post("nama_suspek_1", TRUE),
			"alamat_suspek_1"=>$this->input->post("alamat_suspek_1", TRUE),
			"hubungan_suspek_1"=>$this->input->post("hubungan_suspek_1", TRUE),
			"tgl_kontak_suspek_1"=>$this->input->post("tgl_kontak_suspek_1", TRUE),
			"tgl_terakhir_kontak_suspek_1"=>$this->input->post("tgl_terakhir_kontak_suspek_1", TRUE),
			"riwayat_kontak_konfirm"=>$this->input->post("riwayat_kontak_konfirm", TRUE),
			"nama_konfirm_1"=>$this->input->post("nama_konfirm_1", TRUE),
			"alamat_konfirm_1"=>$this->input->post("alamat_konfirm_1", TRUE),
			"hubungan_konfirm_1"=>$this->input->post("hubungan_konfirm_1", TRUE),
			"tgl_kontak_konfirm_1"=>$this->input->post("tgl_kontak_konfirm_1", TRUE),
			"tgl_terakhir_kontak_konfirm_1"=>$this->input->post("tgl_terakhir_kontak_konfirm_1", TRUE),
			"ispa"=>$this->input->post("ispa", TRUE),
			"hewan_peliharaan"=>$this->input->post("hewan_peliharaan", TRUE),
			"jenis_hewan_peliharaan"=>$this->input->post("jenis_hewan_peliharaan", TRUE),
			"petugas_kesehatan"=>$this->input->post("petugas_kesehatan", TRUE),
			"apd"=>$this->input->post("apd", TRUE),
			"aerosol"=>$this->input->post("aerosol", TRUE),
			"sebutkan_aerosol"=>$this->input->post("sebutkan_aerosol", TRUE),
			"nama_kasus_1"=>$this->input->post("nama_kasus_1", TRUE),
			"umur_kasus_1"=>$this->input->post("umur_kasus_1", TRUE),
			"jk_kasus_1"=>$this->input->post("jk_kasus_1", TRUE),
			"hubungan_kasus_1"=>$this->input->post("hubungan_kasus_1", TRUE),
			"alamat_kasus_1"=>$this->input->post("alamat_kasus_1", TRUE),
			"hp_kasus_1"=>$this->input->post("hp_kasus_1", TRUE),
			"aktifitas_kasus_1"=>$this->input->post("aktifitas_kasus_1", TRUE),
			"nama_kasus_2"=>$this->input->post("nama_kasus_2", TRUE),
			"umur_kasus_2"=>$this->input->post("umur_kasus_2", TRUE),
			"jk_kasus_2"=>$this->input->post("jk_kasus_2", TRUE),
			"hubungan_kasus_2"=>$this->input->post("hubungan_kasus_2", TRUE),
			"alamat_kasus_2"=>$this->input->post("alamat_kasus_2", TRUE),
			"hp_kasus_2"=>$this->input->post("hp_kasus_2", TRUE),
			"aktifitas_kasus_2"=>$this->input->post("aktifitas_kasus_2", TRUE),
			"nama_kasus_3"=>$this->input->post("nama_kasus_3", TRUE),
			"umur_kasus_3"=>$this->input->post("umur_kasus_3", TRUE),
			"jk_kasus_3"=>$this->input->post("jk_kasus_3", TRUE),
			"hubungan_kasus_3"=>$this->input->post("hubungan_kasus_3", TRUE),
			"alamat_kasus_3"=>$this->input->post("alamat_kasus_3", TRUE),
			"hp_kasus_3"=>$this->input->post("hp_kasus_3", TRUE),
			"aktifitas_kasus_3"=>$this->input->post("aktifitas_kasus_3", TRUE),
			"nama_kasus_4"=>$this->input->post("nama_kasus_4", TRUE),
			"umur_kasus_4"=>$this->input->post("umur_kasus_4", TRUE),
			"jk_kasus_4"=>$this->input->post("jk_kasus_4", TRUE),
			"hubungan_kasus_4"=>$this->input->post("hubungan_kasus_4", TRUE),
			"alamat_kasus_4"=>$this->input->post("alamat_kasus_4", TRUE),
			"hp_kasus_4"=>$this->input->post("hp_kasus_4", TRUE),
			"aktifitas_kasus_4"=>$this->input->post("aktifitas_kasus_4", TRUE),
			"status"=>"Belum dilayani"
		];
		$this->db_model->insert('swab_syamrabu', $data);
		echo json_encode($data);
	}


}
