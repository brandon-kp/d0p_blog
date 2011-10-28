<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managesettings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	public function index()
	{
		$this->blogsettings();
	}
	
	public function blogsettings()
	{
		$this->load->model('Frontend_model','fe');
		$setting     = $this->fe->get_settings();
		$data        = $setting['0'];
		$this->load->view('managesettings', $data);
	}
}

/* End of file managesettings.php */
/* Location: ./application/controllers/managesettings.php */