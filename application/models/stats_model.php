<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stats_model extends CI_Model
{
	public function count_posts()
	{
		return $posts = count($this->db->get('blogs')->result_array());
	}
	
	public function count_pages()
	{
		return $pages = count($this->db->get('pages')->result_array());
	}
	
	public function count_tags()
	{
		$array = $this->db->get('blogs')->result_array();
		$tagcount = array();
		foreach($array as $arr)
		{
			$arr = explode(',', $arr['tags']);
			foreach($arr as $tags)
			{
				array_push($tagcount, $tags);
			}
		}
		return count($tagcount);
	}
	
	public function user_info($username)
	{
		$query = $this->db->get_where('auth', array('username' => $username), '1');
		return $query->result();
	}
}
