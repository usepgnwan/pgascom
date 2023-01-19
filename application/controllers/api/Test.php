<?php

defined('BASEPATH') or exit('No direct script access allowed');

use \Firebase\JWT\JWT;

require APPPATH . './libraries/REST_Controller.php';

class Test extends REST_Controller
{
	public function index_get()
	{
		$check = auth_api();

		// $this->response($check['data']->level, REST_Controller::HTTP_UNAUTHORIZED);
		// $this->response($check, REST_Controller::HTTP_UNAUTHORIZED);
		if ($check['status'] == FALSE || $check['data']->level != 'admin') {
			// $class = currentActiveClass($check['id_user'], $check['type']);
			$res['success'] = false;
			$res['message'] = "Invalid Access Token";
			$this->response($res, REST_Controller::HTTP_UNAUTHORIZED);
		} else {
			$x = $this->input->get('test');
			$res['message'] = "Berhasil " . $check['data']->level;
			$res['input'] = $x;
			$this->response($res, REST_Controller::HTTP_OK);
		}
	}
}
