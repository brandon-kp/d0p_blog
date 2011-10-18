<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manageblogs_model extends CI_Model
{
	public function create($title, $date, $tags, $text, $url_title)
	{
		$data = array(
		   'title'     => $title,
		   'date'      => $date,
		   'tags'      => $tags,
		   'text'      => $text,
		   'url_title' => $url_title,
		);
		
		$this->db->insert('blogs', $data); 
	}
	
	public function read()
	{
		$this->db->order_by('date', 'desc'); 
		return $this->db->get('blogs')->result_array();
	}
	
	public function update($title, $tags, $text, $id)
	{
		$data = array(
		   'title' => $title,
		   'tags'  => $tags,
		   'text'  => $text,
		);

		$this->db->where('id', $id);
		$this->db->update('blogs', $data); 
	}
	
	public function get_blog($id)
	{
		return $this->db->get_where('blogs', array('id' => $id))->result_array();
	}
	
	public function delete($id)
	{
		$this->db->delete('blogs', array('id' => $id)); 
	}
}
