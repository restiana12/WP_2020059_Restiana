<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
        if($this->session->user_id == null) redirect('/');

		$data['konten'] = "layout/index";
		$data['judul'] = "Buku";
		$this->load->view('layout/master', $data);
	}
}