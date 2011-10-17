<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageblog extends CI_Controller
{
	public function __constructor()
	{
		parent::__constructor();
		$this->is_logged_in();
	}
	
	public function is_logged_in()
	{
		if($this->session->userdata('logged_in') !== TRUE)
		{
			redirect('dashboard/login');
			exit;
		}
	}
	
	public function index()
	{
		$this->listblogs();
	}
	
	public function post()
	{
		$this->is_logged_in();
		
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->helper('date');
			
			$this->load->model('Manageblogs_model', 'manageblogs');
			
			$title     = $this->input->post('title');
			$date      = now();
			$tags      = $this->input->post('tags');
			$text      = $this->input->post('text');
			$url_title = url_safe($title);
			
			$post  = $this->manageblogs->create($title, $date, $tags, $text, $url_title);
		}
		
		$this->load->view('create');
	}
	
	public function listblogs()
	{
		$this->load->helper('text');
		$this->load->model('Manageblogs_model');
		$data['list_blogs'] = $this->Manageblogs_model->read();
		$this->load->view('manageblogs', $data);
	}
	
	public function edit()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');
		$this->load->model('Manageblogs_model');
		$id = $this->uri->segment(3);
		$data['id'] = $id;
		
		if ($this->form_validation->run() == TRUE)
		{	
			$title = $this->input->post('title');
			$tags  = $this->input->post('tags');
			$text  = $this->input->post('text');
			
			$this->Manageblogs_model->update($title, $tags, $text, $id);
			redirect('manageblog/edit/'.$id);
		}
		else
		{
			$data['blog'] = $this->Manageblogs_model->get_blog($id);
			$data['blog'] = $data['blog'][0];
			$this->load->view('edit_post', $data);
		}
	}
	
	public function delete()
	{
		$id = $this->uri->segment(3);
		$this->load->model('Manageblogs_model');
		$this->Manageblogs_model->delete($id);
		redirect('manageblog/listblogs');
	}
	
	public function import()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->load->view('import');
		
		if ($this->form_validation->run() == TRUE)
		{
			$this->load->model('Manageblogs_model');
			
			$json  = $this->_tumblr($this->input->post('username'));
			
			foreach($json as $post)
			{
				$tag_string = '';
				foreach($post['tags'] as $tags)
				{
					//for each post, we'll loop through the tag array, and append it to a string
					//upon displaying tags, we explode it by ','
					//and upon insertion into the database, we'll get rid of spaces before and after commas
					$tag_string .= $tags.',';
				}
				$tag_string = str_replace(', ',',', $tag_string);
				$tag_String = str_replace(' ,',',', $tag_string);
				
				if(empty($post['title'])) $post['title'] = ' ';
				if(empty($post['body']))  $post['body'] = ' ';
				
				$this->Manageblogs_model->create($post['title'], $post['timestamp'], $tag_string, $post['body']);
			}
		}
	}
	
	public function _tumblr($username)
	{
		$json = json_decode(file_get_contents('http://api.tumblr.com/v2/blog/'.$username.'/posts/text?api_key=k01BoFmWamLbvqahFNNhhtYlGucUpbMOyTYpEraBLsXVNMBd2T'), true);
		$json = $json['response']['posts'];
		
		return $json;
	}
	
	public function _url_safe($str)
	{
		$str = preg_replace("/[^a-zA-Z0-9]/", "-", $str);
		$str = str_replace('--','-',$str);
		return $str; 
	}
}
