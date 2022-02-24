<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('db_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if ($this->session->userdata("id_user")) {
			redirect("swab");
		}

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			"required" => "Email tidak boleh kosong.",
			"valid_email" => "Email tidak valid."
		]);
		$this->form_validation->set_rules('pass', 'Password', 'required|trim');
		if ($this->form_validation->run() == false) {
			//$data['fotoCaptcha'] = $this->buatCaptcha();
			$this->load->view('admin_v'); //, $data);
		} else {
			$this->_login();
		}
	}


	private function _login()
	{
		$email = $this->input->post("email");
		$pass = $this->enkripsi($this->input->post("pass"));
		$user = $this->db_model->get_where("hrd_user", ["email" => $email])->row_array();

		//if ($this->cekCaptcha()) {
		if ($user) {
			if (password_verify($pass, $this->spin($user['password']))) {
				$data = [
					'id_user' => $user['id_user'],
					'email' => $user['email'],
					'nama' => $user['nama'],
					'rule' => $user['rule']
				];
				$this->session->set_userdata($data);

				redirect('swab');
			} else {
				//$data['fotoCaptcha'] = $this->buatCaptcha();
				$data["error"] = ["pass", "Password tidak cocok."];
				$this->load->view('admin_v', $data);
			}
		} else {
			// $data['fotoCaptcha'] = $this->buatCaptcha();
			$data["error"] = ["email", "Email tidak terdaftar."];
			$this->load->view('admin_v', $data);
		}
		// } else {
		// 	$data['fotoCaptcha'] = $this->buatCaptcha();
		// 	$data["error"] = ["cap", "Captcha Salah."];
		// 	$this->load->view('login_v', $data);
		// }
	}

	public function ubahPassword()
	{
		$this->form_validation->set_rules('passLama', 'Password Lama', 'required|trim', ["required" => "Isi password lama anda."]);
		$this->form_validation->set_rules('passBaru', 'Password Baru', 'required|trim|min_length[5]|matches[konfirPass]', [
			"required" => "Password Baru tidak boleh kosong.", "matches" => "Password tidak cocok dengan konfirmasi.",
			"min_length" => "Pasword minimal 5 karakter."
		]);
		$this->form_validation->set_rules('konfirPass', 'Konfirmasi Password', 'required|trim|matches[passBaru]', [
			"matches" => "Password tidak cocok dengan konfirmasi.",
			"required" => "Konfirmasi password anda."
		]);

		if ($this->form_validation->run()) {
			$email = $this->session->userdata("email");
			$passLama = $this->enkripsi($this->input->post("passLama"));

			$user = $this->db_model->get_where("hrd_user", ["email" => $email])->row_array();

			if (password_verify($passLama, $this->spin($user['password']))) {
				$data = ["password" => $this->spin(password_hash($this->enkripsi($this->input->post("passBaru")), PASSWORD_DEFAULT))];
				$this->db_model->update("hrd_user", $data, ["email" => $email]);

				echo json_encode("");
			} else {
				echo json_encode("Password lama anda salah.");
			}
		} else {
			if (form_error("passLama")) {
				$error = form_error("passLama");
			} else if (form_error("passBaru")) {
				$error = form_error("passBaru");
			} else {
				$error = form_error("konfirPass");
			}
			echo json_encode($error);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('rule');
		redirect('admin');
	}

	function enkripsi($data)
	{
		$kode =  array("", "~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "s-", "d+", "9=", "=|", ")}", "{", "-[", "[]", ";", ":", "?", ">", ".", "<k", "67", "05=", "2e", "8q", "9a", "2=", "3", "8", "9", "0", "A", "3", "s", "s", "E", "F", "G", "l", "o", "J", "K", "L", "M", "a", "sf", "Pa", "w$", "ar", "Sj", "sa", "sf", "V", "W", "s", "Y", "Z", "~", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "-", "+", "=", "|", "}", "{", "[", "]", ";", ":", "?", ">", ".", "<", "3", "5", "2", "8", "-", "as", "3", "8", "9", "0", "A", "3", "d", "<k", "67", "05=", "2e", "a", "gd",  "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "Fa", "df", "a", "sf", "Jh", "Ks", "L", "M", "05=", "2e", "8q", "9a", "Mj", "gOf", "qw", "w", "ht", ".S", "a", "p[", "dg", "W0", "Xia", "asY", "dZ", "M", "a", "sf", "Pa", "w$", "ar", "Sj", "sa", "sf", "V");

		$terjemah = array("a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");

		$data = str_split($data);
		$hasil = '';
		for ($i = 0; $i < count($data); $i++) {
			$index = array_search($data[$i], $terjemah);
			$index = $index + (count($data) * $i);
			while ($index >= count($kode)) {
				$index -= count($kode);
			}
			if ($index == 0) {
				$index = count($data) + $i;
			}

			$hasil .= $kode[$index];
		}
		return $hasil;
	}

	function spin($data)
	{
		$data = str_split($data);
		$hasil = '';
		$index = 0;
		$penampung = '';
		for ($i = 0; $i < count($data); $i++) {
			$index += $i;
			for ($j = $index; $j < ($index + $i + 1); $j++) {
				if ($j >= count($data)) break;
				$penampung = $data[$j] . $penampung;
			}
			$hasil .= $penampung;
			$penampung = "";
			if ($i >= count($data)) break;
		}
		return $hasil;
	}
}
