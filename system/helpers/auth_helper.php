<?php
$logged_in = $this->session->userdata('logged_in');
if($logged_in !== TRUE)
{
	redirect('dashboard/login');
	exit;
}