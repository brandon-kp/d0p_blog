<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __constructor()
	{
		parent::__constructor();
	}
	
	public function index()
	{
		is_logged_in();
		
		$calprefs = array (
               'start_day'    => 'monday',
               'month_type'   => 'long',
               'day_type'     => 'short',
               'template'     => $this->config->item('calendar_template'),
             );
		
		$data['username']   = $this->session->userdata('username');
		$this->load->model('Stats_model');
		$this->load->library('calendar', $calprefs);
		$userdata           = $this->Stats_model->user_info($data['username']);
		$userdata           = $userdata[0];
		$data['signin']     = $userdata->last_signin;
		$data['ipaddy']     = $userdata->current_ip;
		$data['post_count'] = $this->Stats_model->count_posts();
		$data['calendar']   = $this->calendar->generate();
		$data['tag_count']  = $this->Stats_model->count_tags();
		$data['page_count'] = $this->Stats_model->count_pages();
		$data['version']    = $this->check_version();
		
		$this->load->view('dashboard', $data);
	}
	
	public function userdata()
	{
		$userdata = $userdata[0];
		$user     = array();
		$user['signin'] = $userdata->last_signin;
		
		return $user;
	}
	
	public function login()
	{
		$this->load->helper('date');
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|min_length[3]|max_length[12]|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|xss_clean');
		
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password').$this->config->item('encryption_key'));
			$ip 	  = $this->session->userdata('ip_address');
			$this->load->model('Auth_model');
			$login = $this->Auth_model->login($username,$password, $ip);
			
			if($login)
			{
				$sess = array(
                   'username'  => $username,
                   'logged_in' => TRUE
                );
				$this->session->set_userdata($sess);
			}
			redirect('dashboard/index');
		}
		else
		{
			$this->load->view('login');
		}
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('dashboard/login');
	}
	
	public function add_account()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|xss_clean|min_length[3]|max_length[12]|alpha_dash');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|matches[passconf]|xss_clean');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|trim|xss_clean');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|xss_clean');
		
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$password = md5($this->input->post('password').$this->config->item('encryption_key'));
			$email    = $this->input->post('email');
			$this->load->model('Auth_model');
			$this->Auth_model->signup($username,$password,$email);
			
			redirect('dashboard/login');
		}
		
		$this->load->view('signup');
	}
	
	public function check_version()
	{
		$current_version = file_get_contents(base_url().'/d0p_blog.version');
		$new_version     = file_get_contents('http://d0p.us/d0p_blog.version');
		if($current_version < $new_version)
		{
			return "Your current version is ".$current_version.", but the newest release is ".$new_version.". Check the Github repo to get the newest version";
		}
		else
		{
			return "This version is up to date.";
		}
	}
}


/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */