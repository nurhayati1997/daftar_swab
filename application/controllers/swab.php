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
		$this->form_validation->set_rules('tujuan_swab', 'tujuan_swab', 'required|trim');
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('jenis_swab', 'jenis_swab', 'required|trim');
		$this->form_validation->set_rules('nik', 'nik', 'required|trim');
		$this->form_validation->set_rules('jk', 'jk', 'required|trim');
		$this->form_validation->set_rules('jalan', 'jalan', 'required|trim');
		$this->form_validation->set_rules('desa', 'desa', 'required|trim');
		$this->form_validation->set_rules('kec', 'kec', 'required|trim');
		$this->form_validation->set_rules('kab', 'kab', 'required|trim');
		// $this->form_validation->set_rules('timbul_gejala', 'timbul_gejala', 'required|trim');
		// $this->form_validation->set_rules('riwayat_demam', 'riwayat_demam', 'required|trim');
		// $this->form_validation->set_rules('riwayat_pilek', 'riwayat_pilek', 'required|trim');
		// $this->form_validation->set_rules('riwayat_sakit_tenggorokan', 'riwayat_sakit_tenggorokan', 'required|trim');
		// $this->form_validation->set_rules('riwayat_sakit_kepala', 'riwayat_sakit_kepala', 'required|trim');
		// $this->form_validation->set_rules('lemah', 'lemah', 'required|trim');
		// $this->form_validation->set_rules('nyeri_otot', 'nyeri_otot', 'required|trim');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'required|trim');
		// $this->form_validation->set_rules('mual', 'mual', 'required|trim');
		// $this->form_validation->set_rules('abdomen', 'abdomen', 'required|trim');
		// $this->form_validation->set_rules('diare', 'diare', 'required|trim');
		// $this->form_validation->set_rules('hamil', 'hamil', 'required|trim');
		// $this->form_validation->set_rules('diabetes', 'diabetes', 'required|trim');
		// $this->form_validation->set_rules('jantung', 'jantung', 'required|trim');
		// $this->form_validation->set_rules('hipertensi', 'hipertensi', 'required|trim');
		// $this->form_validation->set_rules('keganasan', 'keganasan', 'required|trim');
		// $this->form_validation->set_rules('gangguan_imunologi', 'gangguan_imunologi', 'required|trim');
		// $this->form_validation->set_rules('gagal_ginjal', 'gagal_ginjal', 'required|trim');
		// $this->form_validation->set_rules('gangguan_hati', 'gangguan_hati', 'required|trim');
		// $this->form_validation->set_rules('ppok', 'ppok', 'required|trim');
		// $this->form_validation->set_rules('kondisi_penyerta_lain', 'kondisi_penyerta_lain', 'required|trim');
		$this->form_validation->set_rules('vaksin1', 'vaksin1', 'required|trim');
		$this->form_validation->set_rules('vaksin2', 'vaksin2', 'required|trim');
		$this->form_validation->set_rules('booster', 'booster', 'required|trim');
		if ($this->form_validation->run() == false) {
			if (form_error("nama")) {
				$error = "Nama tidak boleh kosong.";
			} else if (form_error("jenis_swab")) {
				$error = form_error("Pilih Jenis Swab");
			} else if (form_error("nik")) {
				$error = form_error("nik tidak boleh kosong.");
			} else if (form_error("no_hp")) {
				$error = form_error("No HP tidak boleh kosong.");
			// } else if (form_error("tujuan_swab")) {
			// 	$error = form_error("Tujuan Swab tidak boleh kosong.");
			// } else if (form_error("jk")) {
			// 	$error = form_error("Jenis Kelamin tidak boleh kosong.");
			// } else if (form_error("jalan")) {
			// 	$error = form_error("Jalan tidak boleh kosong.");
			// } else if (form_error("desa")) {
			// 	$error = form_error("Desa tidak boleh kosong.");
			// } else if (form_error("kec")) {
			// 	$error = form_error("Kecamatan tidak boleh kosong.");
			// } else if (form_error("kab")) {
			// 	$error = form_error("Kabupaten tidak boleh kosong.");
			// } else if (form_error("timbul_gejala")) {
			// 	$error = form_error("Tgl Pertama kali Timbul gejala tidak boleh kosong.");
			// } else if (form_error("riwayat_demam")) {
			// 	$error = form_error("Riwayat Demam tidak boleh kosong.");
			// } else if (form_error("riwayat_batuk")) {
			// 	$error = form_error("Batuk tidak boleh kosong.");
			// } else if (form_error("riwayat_pilek")) {
			// 	$error = form_error("Pilek tidak boleh kosong.");
			// } else if (form_error("riwayat_sakit_tenggorokan")) {
			// 	$error = form_error("Sakit Tenggorokan tidak boleh kosong.");
			// } else if (form_error("riwayat_sakit_kepala")) {
			// 	$error = form_error("Sakit Kepala tidak boleh kosong.");
			// } else if (form_error("lemah")) {
			// 	$error = form_error("Lemah tidak boleh kosong.");
			// } else if (form_error("nyeri_otot")) {
			// 	$error = form_error("Nyeri Otot tidak boleh kosong.");
			// } else if (form_error("mual")) {
			// 	$error = form_error("Mual tidak boleh kosong.");
			// } else if (form_error("abdomen")) {
			// 	$error = form_error("Abdomen tidak boleh kosong.");
			// } else if (form_error("diare")) {
			// 	$error = form_error("Diare tidak boleh kosong.");
			// } else if (form_error("hamil")) {
			// 	$error = form_error("Hamil tidak boleh kosong.");
			// } else if (form_error("diabetes")) {
			// 	$error = form_error("Diabetes tidak boleh kosong.");
			// } else if (form_error("jantung")) {
			// 	$error = form_error("Jantung tidak boleh kosong.");
			// } else if (form_error("hipertensi")) {
			// 	$error = form_error("Hipertensi tidak boleh kosong.");
			// } else if (form_error("keganasan")) {
			// 	$error = form_error("Keganasan tidak boleh kosong.");
			// } else if (form_error("gangguan_imunologi")) {
			// 	$error = form_error("Gangguan_imunologi tidak boleh kosong.");
			// } else if (form_error("gagal_ginjal")) {
			// 	$error = form_error("Gagal ginjal tidak boleh kosong.");
			// } else if (form_error("gangguan_hati")) {
			// 	$error = form_error("Gangguan hati tidak boleh kosong.");
			// } else if (form_error("ppok")) {
			// 	$error = form_error("Ppok tidak boleh kosong.");
			// } else if (form_error("kondisi_penyerta_lain")) {
			// 	$error = form_error("Kondisi penyerta lain tidak boleh kosong.");
			// } else if (form_error("vaksin1")) {
			// 	$error = form_error("Vaksin 1 tidak boleh kosong.");
			} else if (form_error("vaksin1")) {
				$error = form_error("Vaksin 2 tidak boleh kosong.");
			} else if (form_error("booster")) {
				$error = form_error("Booster tidak boleh kosong.");
			} else {
				$error = form_error("nama");
			}
			echo json_encode($error);
		} else {
			$data = [
				"nama" => $this->input->post("nama", TRUE),
				"jenis_swab" => $this->input->post("jenis_swab", TRUE),
				"tujuan_swab" => $this->input->post("tujuan_swab", TRUE),
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
				"vaksin1"=>$this->input->post("vaksin1", TRUE),
				"vaksin2"=>$this->input->post("vaksin2", TRUE),
				"booster"=>$this->input->post("booster", TRUE),
				"status"=>"Belum dilayani"
			];
			$this->db_model->insert('swab_syamrabu', $data);
			echo json_encode($data);
		}
	}


}
