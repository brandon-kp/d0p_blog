<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Managepages extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Managepages_model','fe');
		$this->load->helper('text');
	}
	
	public function index()
	{
		$data['list_pages'] = $this->fe->list_pages('100','0');
		$this->load->view('managepages', $data);
	}
	
	public function addpage()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->load->view('add_page');
		
		if($this->form_validation->run() == TRUE)
		{
			$this->fe->addpage($this->input->post('title'),$this->input->post('content'), url_title($this->input->post('title')));
			redirect('managepages/');
		}
	}
	
	public function edit()
	{
		$data['page'] = $this->fe->get_page($this->uri->segment(3));
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->load->view('edit_page',$data);
		
		if($this->form_validation->run() == TRUE)
		{
			$this->fe->update_page($this->input->post('title'),$this->input->post('content'),$this->uri->segment(3));
			redirect('managepages/');
		}
	}
	
	public function delete()
	{
		$this->fe->delete_page($this->uri->segment(3));
		redirect('managepages/');
	}
}
