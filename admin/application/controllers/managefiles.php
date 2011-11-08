<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managefiles extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Files_model','files');
		$this->load->helper('imgur_helper');
	}
	
	public function index()
	{
		$this->page();
	}
	
	public function _stats()
	{	
		if($this->session->userdata('stats_updated') !== 'TRUE')
		{
			foreach($this->files->get_all($this->db->count_all('files'), '0') as $files)
			{
				$stats  = imgur_update_stats($files['hash']);
				$update = $this->files->update($stats['views'], $stats['bandwidth'], $files['hash']);
				
				if($update)
				{
					$sess = array('stats_updated' => TRUE,);
				}
				else
				{
					$sess = array('stats_updated' => FALSE,);	
				}
			}
		}
		
		$this->session->set_userdata($sess);
	}
	
	public function page()
	{
		$this->load->helper('date');
		$this->load->library('pagination');
		$this->_stats();
		
		$config['base_url']   = site_url().'/managefiles/page/';
		$config['total_rows'] = $this->db->count_all('files');
		$config['per_page']   = '15';
		$data['files']        = $this->files->get_all($config['per_page'], $this->uri->segment(3));
		
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
	
		$this->load->view('managefiles', $data);
	}
	
	public function upload()
	{
		$config['upload_path']   = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$data['errors']          = '';
		
		$this->load->library('upload', $config);
		$this->load->helper('form');
		$this->form_validation->set_rules('caption', 'Caption', 'max_length[140]');
		
		if ($this->form_validation->run() == TRUE)
		{
			if (!$this->upload->do_upload('file'))
			{
				$data['errors'] = $this->upload->display_errors();
				print_r($data['errors']);
			}
			else
			{
				$upload_info = array('upload_data' => $this->upload->data());
				$file        = base_url().$config['upload_path'].$upload_info['upload_data']['file_name'];
				
				$json = imgur_upload(
							$file, 
							'4d81f67729bb978c5a4539dc3645e154', 
							'json',
							$this->input->post('title'),
							$this->input->post('caption')
						);
						
				unlink($config['upload_path'].$upload_info['upload_data']['file_name']);
				
				$img_db    = json_decode($json,true);
				$img_db    = $img_db['upload'];
				$img_img   = $img_db['image'];
				$img_links = $img_db['links'];
				
				$this->files->create($img_img['name'], $img_img['title'], $img_img['caption'], $img_img['hash'], $img_img['deletehash'], $img_img['datetime'], $img_img['type'], $img_img['animated'], $img_img['width'], $img_img['height'], $img_img['size'], $img_img['views'], $img_img['bandwidth'], $img_links['original'], $img_links['imgur_page'], $img_links['delete_page'], $img_links['small_square'], $img_links['large_thumbnail']);
			}
		}
		$this->load->view('upload',$data);
	}
	
	public function delete()
	{	
		$hash = $this->uri->segment(3);
		
		imgur_delete($hash);
		$this->files->delete($hash);
		redirect('managefiles/');
	}

}