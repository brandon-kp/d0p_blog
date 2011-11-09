<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Managepages_model extends CI_Model 
{
	public function addpage($title, $content, $slug)
	{
		$this->db->insert('pages',array('title'=>$title, 'content'=>$content, 'slug'=>$slug));
	}
	
	public function list_pages($num, $offset)
	{
		$this->db->order_by('title', 'asc'); 
		return $this->db->get('pages', $num, $offset)->result_array();
	}
	
	public function get_page($id)
	{
		return $this->db->get_where('pages',array('id'=>$id))->row_array();
	}
	
	public function update_page($title,$content,$id)
	{
		$data = array(
		   'title' => $title,
		   'content'  => $content,
		);

		$this->db->where('id', $id);
		$this->db->update('pages', $data); 
	}
	
	public function delete_age($id)
	{
		$this->db->delete('pages', array('id' => $id));
	}
}