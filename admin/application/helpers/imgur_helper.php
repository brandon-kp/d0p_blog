<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('imgur_upload'))
{
	function imgur_upload($filename, $api_key, $method='json', $title='', $caption='')
	{
	    $handle = fopen($filename, "r");
	    $data = file_get_contents($filename);
	
	    $pvars   = array(
		    'image'   => base64_encode($data), 
		    'key'     => $api_key,
		    'title'   => $title,
		    'caption' => $caption,
	    );
	    $timeout = 30;
	    $curl    = curl_init();
	
	    if($method=='json')
	    {
	    	curl_setopt($curl, CURLOPT_URL, 'http://api.imgur.com/2/upload.json');	
	    }
	    elseif($method=='xml')
	    {
	    	curl_setopt($curl, CURLOPT_URL, 'http://api.imgur.com/2/upload.xml');
	    }
	    curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
	
	    $json = curl_exec($curl);
	
	    curl_close ($curl);
	    
	    return $json;
	}
}

if ( ! function_exists('imgur_update_stats'))
{
	function imgur_update_stats($hash='B50ma')
	{
		$json = json_decode(file_get_contents('http://api.imgur.com/2/image/'.$hash.'.json'),true);
		$json = $json['image']['image'];
		
		return $json;
	}
}

if ( ! function_exists('imgur_delete'))
{
	function imgur_delete($hash='')
	{
		$json = json_decode(file_get_contents('http://api.imgur.com/2/delete/'.$hash.'.json'),true);
		
		return $json;
	}
}

/* End of file imgur_helper.php */
/* Location: ./application/helpers/imgur_helper.php */