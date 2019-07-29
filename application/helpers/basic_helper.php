<?php

function backend_info() {
	$CI =& get_instance();
	$data = array(
		'site_url' => site_url(),
		'base_url' => base_url(),

		'assets_path' => base_url().'assets/',
		'css_path' => base_url().'assets/css/',
		'fonts_path' => base_url().'assets/fonts/',
		'img_path' => base_url().'assets/img/',
		'js_path' => base_url().'assets/js/',
		'plugins_path' => base_url().'assets/js/plugins/',
		'upload_path' => base_url().'assets/upload/',

		'user_nik' => $CI->session->userdata('user_nik'),
		'user_avatar' => '',
		'user_name' => $CI->session->userdata('user_name'),
		'user_jabatan' => $CI->session->userdata('user_jabatan'),
	);
	return $data;
}
