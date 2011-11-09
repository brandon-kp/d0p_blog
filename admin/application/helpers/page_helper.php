<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('page_array'))
{
	function page_array()
	{
		$ci=& get_instance();
		$ci->load->model('Frontend_model');
		$ci->Frontend_model->get_pages();
	}
}

/* End of file blog_helper.php */
/* Location: ./application/helpers/blog_helper.php */