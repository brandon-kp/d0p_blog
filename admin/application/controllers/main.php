<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __constructor()
	{
		parent::__constructor();
	}
	
	public function index()
	{
		redirect('/main/page/0/'); //I just don't see the point in writing page 0.
	}
	
	public function page()
	{
		$this->load->model('Frontend_model', 'blog');
		$this->load->library('pagination');
		$this->load->helper('date');
		$config['base_url']   = site_url().'/main/page/';
		$config['total_rows'] = $this->db->count_all('blogs');;
		$config['per_page']   = 5;
		$data['list_blogs']   = $this->blog->list_blogs($config['per_page'], $this->uri->segment('3'));
		$this->pagination->initialize($config);
		
		$data['pagination'] = $this->pagination->create_links();
	
		$this->load->view('blog/blog', $data);
	}
	
	public function _format_tags($tags)
	{
		$tags = explode(',',$tags);
		
		foreach($tags as $key => $value) {
			if($value == "")
			{
				unset($tags[$key]);
			}
		} 
		return $tags;
	}
	
	public function _url_safe($str)
	{
		$str = preg_replace("/[^a-zA-Z0-9]/", "-", $str);
		$str = str_replace('--','-',$str);
		return $str; 
	}
}