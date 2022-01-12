<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
	}
	public function login()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('mudik');
		}
		return $this->load->view('template/login');
	}

	public function storeLogin()
	{
		$input = $this->input->post(null, false);

		$email = $input['email'];
		$password = $input['password'];

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_msg', 'Lengkapi Data Sebelum Login');
			redirect('auth/login', 'refresh');
		} else {

			$cekUser = $this->auth->checkUser($email);
			// var_dump($cekUser);
			// die;
			if ($cekUser) {
				$user['email'] = $email;
				$user['password'] = $password;
				$login = $this->auth->checkPassword($user);
				if ($cekUser) {
					$user['email'] = $email;
					$user['password'] = $password;
					$login = $this->auth->checkPassword($user);
					if ($login) {
						$session = array(
							'id' => $cekUser['id'],
							'nama' => $cekUser['nama'],
							'nip' => $cekUser['nip'],
							'alamat' => $cekUser['alamat'],
							'foto' => $cekUser['foto'],
							'email' => $cekUser['email'],
							'level' => $cekUser['level'],
							'logged_in' => TRUE,
						);
						$this->session->set_userdata($session);
						// redirect('program_tahfidz/hafalan');
						// var_dump($this->session->all_userdata());
						// die;
						if ($this->session->level == 'admin') {
							redirect('dashboard', 'refresh');
						} else if ($this->session->level == 'user') {
							redirect('mudik', 'refresh');
						}
					} else {
						$this->session->set_flashdata('error_msg', 'Username atau Password Salah!');
						redirect('auth/login', 'refresh');
					}
				} else {
					$this->session->set_flashdata('error_msg', 'Username atau Password Salah!');
					redirect('auth/login', 'refresh');
				}
			} else {
				$this->session->set_flashdata('error_msg', 'Username atau Password Salah!');
				redirect('auth/login', 'refresh');
			}
		}
	}
	public function registrasi()
	{
		if ($this->session->userdata('logged_in')) {
			redirect('mudik');
		}
		return $this->load->view('template/register');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
	public function storeRegistrasi()
	{
		$input = $this->input->post(null, false);
		$this->form_validation->set_rules('nip', 'Nip', 'required');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[tb_user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('repeat_password', 'Repeatpassword', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error_msg', 'Harap Lengkapi Data / Akun Sudah Tersedia');
			redirect('auth/registrasi', 'refresh');
		} else {
			if ($input['password'] != $input['repeat_password']) {
				$this->session->set_flashdata('error_msg', 'Password Tidak Sama');
				redirect('auth/registrasi', 'refresh');
			} else {
				$data['nip'] = $input['nip'];
				$data['nama'] = $input['nama'];
				$data['alamat'] = $input['alamat'];
				$data['email'] = $input['email'];
				$data['password'] = sha1($input['password']);
				$data['level'] = 'user';
				$this->auth->registarsi($data);
				$this->session->set_flashdata('success_msg', 'Sukses Membuat Akun, SilahKan Melakukan Login');
				redirect('auth/login', 'refresh');
			}
		}
	}
}
