<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	public function list_blogs($num, $offset)
	{
		$this->db->order_by('date', 'desc'); 
		return $this->db->get('blogs', $num, $offset)->result_array();
	}
}