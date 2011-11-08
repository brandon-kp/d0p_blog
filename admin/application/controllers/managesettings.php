<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managesettings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Frontend_model','fe');
	}

	public function index()
	{
		$this->blogsettings();
	}
	
	public function blogsettings()
	{
		$this->form_validation->set_rules('blogs_per_page', '"Blogs per page"', 'numeric');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->fe->update_settings(
				$this->input->post('header'), 
				$this->input->post('subheader'), 
				$this->input->post('title'), 
				$this->input->post('tags'), 
				$this->input->post('description'), 
				$this->input->post('blogs_per_page')
			);
		}
		
		$data = $this->fe->get_settings();
		
		$this->load->view('managesettings', $data[0]);
	}
	
	public function columnsettings()
	{
	
	}
}

/* End of file managesettings.php */
/* Location: ./application/controllers/managesettings.php */