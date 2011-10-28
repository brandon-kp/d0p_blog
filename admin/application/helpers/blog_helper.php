<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('url_safe'))
{
	function url_safe($str)
	{
		$str = preg_replace("/[^a-zA-Z0-9]/", "-", $str);
		$str = str_replace('--','-',$str);
		return $str; 
	}
}

if ( ! function_exists('is_logged_in'))
{
	function is_logged_in()
	{	
		$ci=& get_instance();
		$ci->load->library('user_agent');
		$logged_in = $ci->session->userdata('logged_in');
		if($logged_in !== TRUE)
		{
			$ci->session->set_userdata(array('ref'=>$ci->agent->referrer()));
			redirect('dashboard/login');
			exit;
		}
	}
}

/* End of file blog_helper.php */
/* Location: ./application/helpers/blog_helper.php */