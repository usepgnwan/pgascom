<?php

defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

require APPPATH . './libraries/REST_Controller.php';

class Auth extends REST_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth', 'auth');
		$this->load->library('Authorization_Token');
	}

	public function login_post()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			$res['success'] = false;
			$res['message'] = 'Lengkapi Data Sebelum Login';
			$this->response($res, REST_Controller::HTTP_UNAUTHORIZED);
		} else {

			$input = $this->input->post(null, false);

			$email = $input['email'];
			$password = $input['password'];
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
						$token_data['id'] = $cekUser['id'];
						$token_data['nama'] = $cekUser['nama'];
						$token_data['email'] = $cekUser['email'];
						$token_data['level'] = $cekUser['level'];
						$token = $this->authorization_token->generateToken($token_data);
						$res['success'] = true;
						$res['access_token'] = $token;
						$this->response($res, REST_Controller::HTTP_OK);
					} else {
						$res['success'] = false;
						$res['message'] = 'Password Anda Salah';
						$this->response($res, REST_Controller::HTTP_UNAUTHORIZED);
					}
				} else {
					$res['success'] = false;
					$res['message'] = 'Username atau Password Salah!';
					$this->response($res, REST_Controller::HTTP_UNAUTHORIZED);
				}
			} else {
				$res['success'] = false;
				$res['message'] = 'Username atau Password Salah!';
				$this->response($res, REST_Controller::HTTP_UNAUTHORIZED);
			}
		}
	}
}
