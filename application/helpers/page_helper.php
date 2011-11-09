<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('page_array'))
{
	function page_array()
	{
		$ci=& get_instance();
		$ci->load->model('Frontend_model');
		return $ci->Frontend_model->get_pages();
	}
}

if ( ! function_exists('get_single_page'))
{
	function get_single_page($slug)
	{
		$ci=& get_instance();
		$ci->load->model('Frontend_model');
		return $ci->Frontend_model->get_page($slug);
	}
}

if ( ! function_exists('list_links'))
{
	function list_links()
	{
		$ci=& get_instance();
		$ci->load->model('Frontend_model');
		$array = $ci->Frontend_model->get_pages();
		
		$links = array();
		
		foreach($array as $array)
		{
			array_push($links,'/main/p/'.$array['slug']);
		}
		
		return $links;
	}
}

/* End of file blog_helper.php */
/* Location: ./application/helpers/blog_helper.php */