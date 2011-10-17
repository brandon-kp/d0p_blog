<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model
{
	public function login($username, $password, $ip)
	{
		$query = $this->db->get_where('auth', array('password'=>$password,'username'=>$username));
		
		$data = array(
            'last_signin' => standard_date('DATE_RFC1123', time()),
			'current_ip' => $ip,
            );

		$this->db->where('username', $username);
		$this->db->update('auth', $data);
		
		return $query;
	}
	
	public function signup($username,$password,$email)
	{
		$this->db->insert('auth',array('username'=>$username, 'password'=>$password, 'email'=>$email,));
	}
}