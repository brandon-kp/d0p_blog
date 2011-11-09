<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontend_model extends CI_Model
{
	public function list_blogs($num, $offset)
	{
		$this->db->order_by('date', 'desc'); 
		return $this->db->get('blogs', $num, $offset)->result_array();
	}
	
	public function get_settings()
	{
		return $this->db->get('settings', '1')->result_array();
	}
	
	public function update_settings($header, $subheader, $title, $tags, $description, $blogs_per_page)
	{
		$data = array(
		   'header'         => $header,
		   'subheader'      => $subheader,
		   'title'          => $title,
		   'tags'           => $tags,
		   'description'    => $description,
		   'blogs_per_page' => $blogs_per_page
		);

		//$this->db->where('id', $id);
		$this->db->update('settings', $data); 
	}
	
	public function get_page($slug)
	{
		return $this->db->get_where('pages',array('slug'=>$slug))->row_array();
	}
}