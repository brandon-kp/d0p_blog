<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frontend_model', 'blog');
		$this->settings = $this->blog->get_settings();
	}
	
	public function index()
	{
		$this->page();
	}
	
	public function page()
	{
		$this->load->library('pagination');
		$this->load->helper('date');
		$config['base_url']   = site_url().'/main/page/';
		$config['total_rows'] = $this->db->count_all('blogs');
		$per_page             = $this->settings['blogs_per_page'];
		$config['per_page']   = $per_page;
		$data['list_blogs']   = $this->blog->list_blogs($config['per_page'], $this->uri->segment('3'));
		$data['settings']     = $this->settings;
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
		//Didn't know about url_title at the time of this.
		//I'll remove it when I'm sure I'm not using it anywhere else
		return url_title($str); 
	}
	
	public function p()
	{
		$data             = $this->blog->get_page($this->uri->segment(3));
		$data['settings'] = $this->settings;
		$this->load->view('blog/page', $data);
	}
	
	public function pages()
	{
		$this->load->helper('page');
		print_r(list_links());
		//print_r(get_single_page('Youre-listening-to-skeptoid'));
	}
}