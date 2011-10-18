<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managesettings extends CI_Controller {

	public function __constructor()
	{
		is_logged_in();
		parent::__constructor();
	}

	public function index()
	{
		$this->load->model('Frontend_model','fe');
		$setting     = $this->fe->get_settings();
		$data        = $setting['0'];
		$this->load->view('managesettings', $data);
	}
}

/* End of file managesettings.php */
/* Location: ./application/controllers/managesettings.php */