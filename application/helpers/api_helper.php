<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('auth_api')) {
	function auth_api()
	{
		$CI = &get_instance();
		$CI->load->library('Authorization_Token');

		// $headers = $CI->input->request_headers()['Authorization'];
		// $headers = $CI->input->request_headers()['authorization'];
		$headers = $CI->input->get_request_header('authorization', TRUE);
		$check = $CI->authorization_token->validateToken($headers);

		return $check;
	}
}
