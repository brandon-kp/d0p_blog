<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files_model extends CI_Model
{
	public function create($name, $title, $caption, $hash, $deletehash, $datetime, $type, $animated, $width, $height, $size, $views, $bandwidth, $original, $imgur_page, $delete_page, $small_square, $large_thumbnail)
	{
		$data = array(
				'name' => $name,
				'title'  => $title,
				'caption'  => $caption,
				'hash' => $hash,
				'deletehash' => $deletehash,
				'datetime' => $datetime,
				'type' => $type,
				'animated' => $animated,
				'width' => $width,
				'height' => $height,
				'size' => $size,
				'views' => $views,
				'bandwidth' => $bandwidth,
				
				'original' => $original,
				'imgur_page' => $imgur_page,
				'delete_page' => $delete_page,
				'small_square' => $small_square,
				'large_thumbnail' => $large_thumbnail,
		);
		
		$this->db->insert('files', $data); 
	}
	
	public function get_all($limit, $offset)
	{
		return $this->db->get('files', $limit, $offset)->result_array();
	}
	
	public function update($views, $bandwidth, $hash)
	{
		$this->db->update('files', array('views'=>$views,'bandwidth'=>$bandwidth), array('hash'=>$hash)); 
	}
	
	public function delete($hash)
	{
		$this->db->delete('files', array('deletehash' => $hash)); 
	}
}